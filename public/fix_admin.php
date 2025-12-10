<?php
// Generate hash baru
$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "<h2>FIXING ADMIN PASSWORD</h2>";
echo "Password: <strong>" . $password . "</strong><br>";
echo "New Hash: <code>" . $hash . "</code><br><br>";

// Connect to database
$host = 'localhost';
$db = 'tokoes_db';
$user = 'root';
$pass = ''; // Ganti jika MySQL Anda pakai password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✅ Database connected!<br><br>";
    
    // Cek apakah admin ada
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(['admin@tokoes.com']);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($admin) {
        // Update password
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->execute([$hash, 'admin@tokoes.com']);
        echo "✅ Password updated!<br><br>";
    } else {
        // Insert admin baru
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, phone, role, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->execute(['Administrator', 'admin@tokoes.com', $hash, '081234567890', 'admin']);
        echo "✅ Admin created!<br><br>";
    }
    
    // Verifikasi
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(['admin@tokoes.com']);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo "<h3>Verification:</h3>";
    echo "Email: " . $admin['email'] . "<br>";
    echo "Role: " . $admin['role'] . "<br><br>";
    
    // Test password
    if (password_verify($password, $admin['password'])) {
        echo "<h2 style='color:green;'>✅✅✅ SUCCESS! ✅✅✅</h2>";
        echo "<p>Sekarang Anda bisa login dengan:</p>";
        echo "<ul>";
        echo "<li><strong>Email:</strong> admin@tokoes.com</li>";
        echo "<li><strong>Password:</strong> admin123</li>";
        echo "</ul>";
        echo "<br><a href='/login' style='background:blue;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;'>LOGIN SEKARANG</a>";
    } else {
        echo "<h2 style='color:red;'>❌ Still error!</h2>";
    }
    
} catch(PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>