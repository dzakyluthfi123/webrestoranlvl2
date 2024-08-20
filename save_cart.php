<?php
include 'db.php'; // Menghubungkan ke database MySQL

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cart = json_decode($_POST['cart'], true); // Mengambil data cart dari POST
    $notif = '';

    if ($cart) {
        foreach ($cart as $item) {
            $name = $conn->real_escape_string($item['name']);
            $price = $item['price'];
            $quantity = $item['quantity'];

            // Menyimpan data ke tabel 'cart'
            $sql = "INSERT INTO cart (name, price, quantity) VALUES ('$name', '$price', '$quantity')";

            if (!$conn->query($sql)) {
                $notif = "Error: " . $conn->error;
                break;
            }
        }
        if (!$notif) {
            $notif = "Order has been placed successfully!";
        }
    } else {
        $notif = "No data received.";
    }

    // Redirect kembali ke index2.php dengan pesan notifikasi
    header("Location: index2.php?notif=" . urlencode($notif));
    exit();
}
