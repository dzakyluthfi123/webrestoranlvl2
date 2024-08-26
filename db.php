<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "keranjangmenu";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menerima data cart dari form
if (isset($_POST['cart'])) {
    $cart_data = json_decode($_POST['cart'], true);

    // // Debugging: Tampilkan data yang diterima
    // echo "<pre>";
    // var_dump($cart_data);
    // echo "</pre>";

    // Memasukkan data ke database
    foreach ($cart_data as $item) {
        $name = $conn->real_escape_string($item['name']);
        $quantity = (int)$item['quantity'];
        $price = (float)$item['price'];
        // Total tidak perlu dihitung dan dikirim karena dihitung otomatis oleh database

        // Membuat query SQL untuk insert data
        $sql = "INSERT INTO cart (name, quantity, price) 
                VALUES ('$name', $quantity, $price)";

        // Menjalankan query dan cek apakah berhasil
        if ($conn->query($sql) === TRUE) {
            echo "Item berhasil disimpan: $name<br>";
        } else {
            echo "Error: " . $conn->error . "<br>";
        }
    }
} else {
    echo "Tidak ada data yang dikirim.";
}

// Menutup koneksi
$conn->close();
