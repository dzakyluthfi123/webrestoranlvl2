<?php
// Konfigurasi database
$servername = "localhost"; // Biasanya localhost
$username = "root"; // Ganti dengan username database kamu
$password = ""; // Ganti dengan password database kamu
$dbname = "kontak12"; // Nama database yang telah dibuat

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Siapkan dan jalankan query SQL
$sql = "INSERT INTO kontak14 (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
