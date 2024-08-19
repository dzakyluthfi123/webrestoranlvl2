document.addEventListener("DOMContentLoaded", function() {
    // Preloader effect
    setTimeout(function() {
        document.querySelector('.loader').style.display = 'none';
        document.querySelector('.content').style.display = 'block';
    }, 2000);

    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
document.addEventListener("DOMContentLoaded", function() {
    const header = document.querySelector('header');
    const images = [
        'assets/makanan.jpg',
        'assets/makanan2.jpg',
        'assets/makanan3.jpg',
    ]; // Daftar gambar untuk slider

    let currentImageIndex = 0;

    function changeBackgroundImage() {
        header.style.backgroundImage = `url(${images[currentImageIndex]})`;
        currentImageIndex = (currentImageIndex + 1) % images.length;
    }

    // Ubah gambar setiap 5 detik
    setInterval(changeBackgroundImage, 5000);

    // Jalankan sekali saat halaman pertama kali dimuat
    changeBackgroundImage();
});
