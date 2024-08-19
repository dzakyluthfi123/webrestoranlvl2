<?php
include 'header.php';
?>


<section id="about">
    <h1>About Us</h1>
    <div class="about-content">
        <img src="assets/makanan.jpg" alt="Our Restaurant">
        <div class="text-content">
            <p>Restoran XYZ has been serving the community with delicious food for over 20 years. We pride ourselves on quality and freshness.</p>
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
            <span>Rp.90.000</span>
        </div>
        <div class="menu-item">
            <img src="assets/spaghetti.jpg" alt="Spaghetti Carbonara">
            <h3>Spaghetti Carbonara</h3>
            <p>Classic Italian pasta with creamy sauce and pancetta</p>
            <span>Rp. 40.000</span>
        </div>
        <div class="menu-item">
            <img src="assets/beef.avif" alt="Grilled Salmon">
            <h3>Beef Steak</h3>
            <p>New and fresh beef is ready to satisfy your hunger</p>
            <span>Rp. 35.000</span>
        </div>
        <div class="menu-item">
            <img src="assets/salmon2.jpg" alt="Grilled Salmon">
            <h3>Grilled Salmon</h3>
            <p>Freshly grilled salmon served with a side of vegetables</p>
            <span>Rp. 40.000</span>
        </div>
        <div class="menu-item">
            <img src="salmon.jpg" alt="Grilled Salmon">
            <h3>Grilled Salmon</h3>
            <p>Freshly grilled salmon served with a side of vegetables</p>
            <span>$18.99</span>
        </div>
        <div class="menu-item">
            <img src="salmon.jpg" alt="Grilled Salmon">
            <h3>Grilled Salmon</h3>
            <p>Freshly grilled salmon served with a side of vegetables</p>
            <span>$18.99</span>
        </div>
        <!-- Tambahkan lebih banyak item menu di sini -->
    </div>
</section>

<!-- <h2>Contact Us</h2> -->

<section id="contact">
    <!-- <h2><b>Contact Us</b></h2> -->
    <form action="koneksi.php" method="POST">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Submit</button>
    </form>

</section>


<?php
include 'footer.php';
?>