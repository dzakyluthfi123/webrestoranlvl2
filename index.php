<?php
include 'header.php';
?>

<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.html');
    exit();
}
?>




<section id="about">
    <h1>About Us</h1>
    <div class="about-content">
        <img src="assets/makanan.jpg" alt="Our Restaurant" class="slide-in-up">
        <div class="text-content slide-in-up">
            <p>Restoran Ku has been serving the community with delicious food for over 20 years. We pride ourselves on quality and freshness.</p>
        </div>
    </div>
</section>







<section id="menu">
    <h1>Our Menu</h1>
    <div class="menu-container">
        <div class="menu-item">
            <img src="assets/pizza.jpg" alt="Pizza Margherita">
            <h3>Pizza Margherita</h3>
            <p>Topped with fresh tomatoes, mozzarella, and basil</p>
            <span><b>Rp.90.000</b></span>
            <div class="quantity-container">
                <input type="number" class="quantity-input" min="0" value="0">
                <button class="add-to-cart-btn" onclick="addToCart('Pizza Margherita', 90000)">Tambah</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="assets/spaghetti.jpg" alt="Spaghetti Carbonara">
            <h3>Spaghetti Carbonara</h3>
            <p>Classic Italian pasta with creamy sauce and pancetta</p>
            <span><b>Rp. 40.000</b></span>
            <div class="quantity-container">
                <input type="number" class="quantity-input" min="0" value="0">
                <button class="add-to-cart-btn" onclick="addToCart('Spaghetti Carbonara', 40000)">Tambah</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="assets/beef.avif" alt="Grilled Salmon">
            <h3>Beef Steak</h3>
            <p>New and fresh beef is ready to satisfy your hunger</p>
            <span><b>Rp. 35.000</b></span>
            <div class="quantity-container">
                <input type="number" class="quantity-input" min="0" value="0">
                <button class="add-to-cart-btn" onclick="addToCart('Beef Steak', 35000)">Tambah</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="assets/salmon2.jpg" alt="Grilled Salmon">
            <h3>Grilled Salmon</h3>
            <p>Freshly grilled salmon served with a side of vegetables</p>
            <span><b>Rp. 40.000</b></span>
            <div class="quantity-container">
                <input type="number" class="quantity-input" min="0" value="0">
                <button class="add-to-cart-btn" onclick="addToCart('Grilled Salmon', 40000)">Tambah</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="assets/burger1.jpg" alt="Grilled Salmon">
            <h3>King Burger</h3>
            <p>Burger King is perfect for satisfying hunger and for snacking</p>
            <span><b>Rp. 25.000</b></span>
            <div class="quantity-container">
                <input type="number" class="quantity-input" min="0" value="0">
                <button class="add-to-cart-btn" onclick="addToCart('King Burger', 25000)">Tambah</button>
            </div>
        </div>
        <div class="menu-item">
            <img src="assets/ikanbakar.jpg" alt="Grilled Salmon">
            <h3>Grilled Fish</h3>
            <p>Grilled fish is perfect for eating at night and eaten together</p>
            <span><b>Rp. 110.000</b></span>
            <div class="quantity-container">
                <input type="number" class="quantity-input" min="0" value="0">
                <button class="add-to-cart-btn" onclick="addToCart('Grilled Fish', 110000)">Tambah</button>
            </div>

        </div>
        <!-- Tambahkan lebih banyak item menu di sini -->
    </div>
    <section id="cart-link">
        <a href="index2.php"><button>VIEW MENU</button></a>
    </section>
</section>









<!-- <h2>Contact Us</h2> -->

<section id="contact">
    <!-- <h2><b>Contact Us</b></h2> -->
    <div class="border">
        <form action="koneksi.php" method="POST" onsubmit="submitForm(event)">
            <div class="tulisan">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit">Submit</button>
        </form>

        <!-- Tempat untuk notifikasi -->
        <div id="formNotification" style="margin-top: 20px;"></div>
    </div>
</section>




<?php
include 'footer.php';
?>