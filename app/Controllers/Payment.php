<?php

namespace App\Controllers;

use Midtrans\Config;
use Midtrans\CoreApi;

class Payment extends BaseController
{
    public function __construct()
    {
        // Load config Midtrans
        Config::$serverKey     = getenv('MIDTRANS_SERVER_KEY');
        Config::$isProduction  = getenv('MIDTRANS_IS_PRODUCTION') === 'true';
        Config::$isSanitized   = true;
        Config::$is3ds         = true;
    }

    // ==========================
    // 1. GENERATE QRIS
    // ==========================
    public function qris()
    {
        // Ambil amount dari POST atau GET
        $amount = $this->request->getPost('amount') ?? $this->request->getGet('amount');

        if (!$amount || $amount <= 0) {
            return "Amount is required!";
        }

        // Generate Order ID unik
        $orderId = 'INV-' . date("YmdHis") . '-' . rand(1000, 9999);

        // Data transaksi
        $params = [
            'payment_type' => 'qris',
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int)$amount
            ]
        ];

        // Kirim request ke Midtrans
        try {
            $charge = CoreApi::charge($params);
        } catch (\Exception $e) {
            return 'Midtrans Error: ' . $e->getMessage();
        }

        // Ambil URL QR
        $qrUrl = $charge->actions[0]->url ?? null;

        return view('qris_view', [
            'qr'       => $qrUrl,
            'order_id' => $orderId,
            'amount'   => $amount
        ]);
    }

    // ==========================
    // 2. CALLBACK MIDTRANS
    // ==========================
    public function callback()
    {
        $json = file_get_contents("php://input");
        $result = json_decode($json);

        // Validasi signature
        $signature = hash(
            "sha512",
            $result->order_id .
            $result->status_code .
            $result->gross_amount .
            getenv('MIDTRANS_SERVER_KEY')
        );

        if ($signature !== $result->signature_key) {
            return "Invalid signature!";
        }

        $transaction = $result->transaction_status;
        $orderId     = $result->order_id;

        // Update database kamu di sini
        // (Contoh: $this->orderModel->updateStatus($orderId, $transaction))

        if ($transaction === 'settlement') return "Payment success";
        if ($transaction === 'pending')    return "Payment pending";
        if ($transaction === 'expire')     return "Payment expired";

        return "Payment processed";
    }
}
