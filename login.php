<?php
session_start();

// Data pengguna yang valid (contoh)
$validUser = [
    'username' => 'admin',
    'password' => '12345'
];

// Ambil nilai dari form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi login
if ($username === $validUser['username'] && $password === $validUser['password']) {
    // Jika login berhasil, simpan informasi pengguna dalam sesi
    $_SESSION['loggedin'] = true;
    header('Location: index.php'); // Arahkan ke halaman utama
    exit();
} else {
    // Jika login gagal, kembali ke halaman login dengan pesan error
    header('Location: index.html?error=1'); // Tambahkan parameter error jika diperlukan
    exit();
}
