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


function clearForm(form, event) {
    // Mencegah form untuk benar-benar terkirim (untuk keperluan demo)
    event.preventDefault();

    // Mengosongkan form
    form.reset();

    // Menampilkan notifikasi di bawah form
    var notificationDiv = document.getElementById('formNotification');
    notificationDiv.innerHTML = '<p style="color: white; font-size: 50%;">Form has been submitted successfully!</p>';
}




 // Simpan data pesanan di sini
 let cart = [];

 function addToCart(itemName, itemPrice, button) {
     // Ambil elemen input jumlah
     let quantityInput = button.previousElementSibling;
     let quantity = parseInt(quantityInput.value);

     // Periksa apakah item sudah ada di keranjang
     let itemIndex = cart.findIndex(item => item.name === itemName);
     if (itemIndex > -1) {
         // Item sudah ada, perbarui kuantitas
         cart[itemIndex].quantity += quantity;
     } else {
         // Item belum ada, tambahkan ke keranjang
         cart.push({ name: itemName, price: itemPrice, quantity: quantity });
     }

     // Perbarui tampilan keranjang
     updateCart();
 }

 function updateCart() {
     let cartBody = document.getElementById('cart-body');
     cartBody.innerHTML = '';

     cart.forEach((item, index) => {
         let row = document.createElement('tr');
         row.innerHTML = `
             <td>${item.name}</td>
             <td><input type="number" value="${item.quantity}" min="1" class="quantity-input" onchange="updateQuantity(${index}, this)"></td>
             <td>Rp. ${item.price.toLocaleString()}</td>
             <td>Rp. ${(item.price * item.quantity).toLocaleString()}</td>
             <td>
                 <button class="edit-btn" onclick="editItem(${index})">Edit</button>
                 <button class="remove-btn" onclick="removeItem(${index})">Remove</button>
             </td>
         `;
         cartBody.appendChild(row);
     });
 }

 function updateQuantity(index, input) {
     let newQuantity = parseInt(input.value);
     if (newQuantity > 0) {
         cart[index].quantity = newQuantity;
         updateCart();
     }
 }

 function editItem(index) {
     // Fungsi ini bisa digunakan untuk mengedit item lebih lanjut jika diperlukan
     alert('Edit functionality is not implemented.');
 }

 function removeItem(index) {
     cart.splice(index, 1);
     updateCart();
 }





 function addToCart(itemName, itemPrice) {
    let quantityInput = event.target.previousElementSibling;
    let quantity = parseInt(quantityInput.value);
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let itemIndex = cart.findIndex(item => item.name === itemName);

    if (itemIndex > -1) {
        cart[itemIndex].quantity += quantity;
    } else {
        cart.push({ name: itemName, price: itemPrice, quantity: quantity });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
}





document.getElementById('checkout-btn').onclick = function() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    fetch('save_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(cart)
    })
    .then(response => response.text())
    .then(result => {
        alert('Data saved successfully!');
        localStorage.removeItem('cart'); // Hapus keranjang setelah checkout
        updateCart(); // Perbarui keranjang
    })
    .catch(error => {
        console.error('Error:', error);
    });
};



// notifkontak //

function submitForm(event) {
    event.preventDefault(); // Mencegah pengiriman form default

    // Simulasi pengiriman form dan respons sukses
    const form = event.target;
    const formData = new FormData(form);

    fetch(form.action, {
            method: form.method,
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Tampilkan pesan sukses
            const notification = document.getElementById('formNotification');
            notification.textContent = 'Your message has been sent successfully!';
            notification.style.color = 'green';

            // Kosongkan form
            form.reset();

            // Hilangkan notifikasi setelah 3 detik
            setTimeout(() => {
                notification.textContent = '';
            }, 3000);
        })
        .catch(error => {
            // Tampilkan pesan kesalahan jika terjadi
            const notification = document.getElementById('formNotification');
            notification.textContent = 'There was an error sending your message. Please try again.';
            notification.style.color = 'red';
        });
}


// about

document.addEventListener("DOMContentLoaded", function() {
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                // Tambahkan kelas 'animate' untuk memulai transisi
                entry.target.classList.add("animate");

                // Hapus kelas 'animate' setelah transisi selesai
                setTimeout(() => {
                    entry.target.classList.remove("animate");
                }, 1500); // Pastikan waktu ini sama dengan durasi transisi
            }
        });
    }, { threshold: 0.1 }); // Mengatur 10% dari elemen terlihat sebelum animasi dimulai

    // Mengamati elemen dengan kelas slide-in-up
    document.querySelectorAll('.slide-in-up').forEach(function(element) {
        observer.observe(element);
    });
});




document.addEventListener("DOMContentLoaded", function() {
    let observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add("appear");
                observer.unobserve(entry.target); // Berhenti mengamati setelah animasi dipicu
            }
        });
    }, { threshold: 0.1 }); // Mengatur 10% dari elemen terlihat sebelum animasi dimulai

    // Mengamati setiap elemen dengan kelas .menu-item
    document.querySelectorAll('.menu-container').forEach(function(element) {
        observer.observe(element);
    });
});


// login

// Data pengguna yang valid (contoh)
// const validUser = {
//     username: "admin",
//     password: "123"
// };

// document.getElementById('loginForm').addEventListener('submit', function(e) {
//     e.preventDefault();

//     // Ambil nilai dari form
//     const username = document.getElementById('username').value;
//     const password = document.getElementById('password').value;

//     // Validasi login
//     if (username === validUser.username && password === validUser.password) {
//         // Jika login berhasil, alihkan ke halaman utama
//         window.location.href = 'index.php'; // Ubah ini sesuai dengan halaman tujuan setelah login
//     } else {
//         // Jika login gagal, tampilkan pesan error
//         document.getElementById('error-message').innerText = 'Invalid username or password';
//     }
// });
document.getElementById('loginForm').addEventListener('submit', function(e) {
    const username = document.getElementById('123').value;
    const password = document.getElementById('123').value;

    // Tambahkan validasi klien jika diperlukan
    if (!username || !password) {
        document.getElementById('error-message').innerText = 'Please enter both username and password';
        e.preventDefault(); // Menghentikan pengiriman form jika validasi gagal
    }
});


document.getElementById('checkout-form').addEventListener('submit', function (e) {
    e.preventDefault();
    
    if (cart.length > 0) {
        // Set cart data ke hidden input
        document.getElementById('cart-data').value = JSON.stringify(cart);
        
        // Submit form
        this.submit();
    } else {
        alert('Keranjang belanja Anda kosong.');
    }
});


