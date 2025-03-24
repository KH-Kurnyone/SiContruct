<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=nama_database", "username", "password");

// Pastikan request menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Hash password sebelum disimpan
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Simpan ke database
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $email, $hashedPassword])) {
        header("Location: users_index.php"); // Redirect ke halaman daftar pengguna
        exit();
    } else {
        $_SESSION['error'] = "Gagal menyimpan data.";
        header("Location: register.php"); // Redirect kembali ke form pendaftaran jika gagal
        exit();
    }
}
