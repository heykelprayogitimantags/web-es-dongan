<?php
$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Password: " . $password . "<br>";
echo "Hash baru: " . $hash . "<br><br>";

// Test langsung
if (password_verify($password, $hash)) {
    echo "✅ HASH INI BENAR!<br><br>";
    echo "Copy hash ini dan jalankan SQL di bawah:<br>";
    echo "<textarea style='width:100%; height:150px;'>";
    echo "UPDATE users SET password = '$hash' WHERE email = 'admin@tokoes.com';";
    echo "</textarea>";
} else {
    echo "❌ Ada masalah!";
}
?>