<?php
// Test password hash
$password = 'admin123';
$hash = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

echo "Testing password...<br>";
echo "Password: " . $password . "<br>";
echo "Hash: " . $hash . "<br><br>";

if (password_verify($password, $hash)) {
    echo "✅ PASSWORD BENAR!<br>";
    echo "Masalah bukan di password.<br>";
} else {
    echo "❌ PASSWORD SALAH!<br>";
}

// Connect ke database
require_once '../app/Config/Database.php';
$db = \Config\Database::connect();

// Cek user admin
$query = $db->query("SELECT * FROM users WHERE email = 'admin@tokoes.com'");
$user = $query->getRow();

if ($user) {
    echo "<br>Admin ditemukan:<br>";
    echo "Email: " . $user->email . "<br>";
    echo "Role: " . $user->role . "<br>";
    echo "Password hash di DB: " . substr($user->password, 0, 50) . "...<br><br>";
    
    if (password_verify($password, $user->password)) {
        echo "✅✅✅ LOGIN SEHARUSNYA BISA! ✅✅✅<br>";
    } else {
        echo "❌ Password di database salah!<br>";
        echo "Jalankan SQL ini di MySQL:<br>";
        echo "<pre>UPDATE users SET password = '$hash' WHERE email = 'admin@tokoes.com';</pre>";
    }
} else {
    echo "<br>❌ Admin tidak ditemukan!<br>";
    echo "Jalankan SQL ini di MySQL:<br>";
    echo "<pre>";
    echo "INSERT INTO users (name, email, password, phone, role, created_at, updated_at) \n";
    echo "VALUES ('Administrator', 'admin@tokoes.com', '$hash', '081234567890', 'admin', NOW(), NOW());";
    echo "</pre>";
}
?>