<!DOCTYPE html>
<html>
<head>
    <title>QRIS</title>
</head>
<body>

    <h2>Scan QR untuk bayar</h2>
    <p>Order ID: <?= $order_id ?></p>
    <p>Jumlah: Rp <?= number_format($amount,0,',','.') ?></p>

    <?php if ($qr): ?>
        <img src="<?= $qr ?>" width="280">
    <?php else: ?>
        <p>QR IS NOT AVAILABLE</p>
    <?php endif; ?>
    
</body>
</html>
