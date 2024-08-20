<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        /* CSS untuk keranjang belanja */
        #cart {
            padding: 20px;
            background-color: #f8f9fa;
        }

        #cart h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        #cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        #cart-table th,
        #cart-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #cart-table th {
            background-color: #28a745;
            color: white;
        }

        .edit-btn,
        .remove-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }

        .remove-btn {
            background-color: #dc3545;
        }

        .remove-btn:hover {
            background-color: #c82333;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 1.2em;
        }

        .back-btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        /* CSS untuk notifikasi */
        .notification {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f8f9fa;
            font-size: 16px;
            color: #28a745;
        }

        .error {
            color: #dc3545;
        }
    </style>
</head>

<body>

    <section id="cart">
        <h2>Your Cart</h2>
        <table id="cart-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cart-body">
                <!-- Pesanan akan ditambahkan di sini -->
            </tbody>
        </table>
        <div class="total" id="cart-total">Total: Rp. 0</div>

        <br>
        <form id="checkout-form" action="save_cart.php" method="POST">
            <input type="hidden" name="cart" id="cart-data">
            <button type="submit" class="checkout-btn">Checkout</button>
        </form>


        <a href="index.php" class="back-btn">Back to Menu</a>


        <h1>Our Menu</h1>

        <!-- Form pemesanan dan item menu Anda di sini -->

        <!-- Tempat untuk notifikasi -->
        <?php if (isset($_GET['notif'])): ?>
            <div class="notification <?php echo strpos($_GET['notif'], 'Error') !== false ? 'error' : ''; ?>">
                <?php echo htmlspecialchars($_GET['notif']); ?>
            </div>
        <?php endif; ?>

    </section>

    <script>
        function updateCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartBody = document.getElementById('cart-body');
            let cartTotal = 0;
            cartBody.innerHTML = '';

            cart.forEach((item, index) => {
                let itemTotal = item.price * item.quantity;
                cartTotal += itemTotal;

                let row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.name}</td>
                    <td><input type="number" value="${item.quantity}" min="1" class="quantity-input" onchange="updateQuantity(${index}, this)"></td>
                    <td>Rp. ${item.price.toLocaleString()}</td>
                    <td>Rp. ${itemTotal.toLocaleString()}</td>
                    <td>
                        <button class="edit-btn" onclick="editItem(${index})">Edit</button>
                        <button class="remove-btn" onclick="removeItem(${index})">Remove</button>
                    </td>
                `;
                cartBody.appendChild(row);
            });

            document.getElementById('cart-total').textContent = `Total: Rp. ${cartTotal.toLocaleString()}`;
        }

        function updateQuantity(index, input) {
            let newQuantity = parseInt(input.value);
            if (newQuantity > 0) {
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                cart[index].quantity = newQuantity;
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCart();
            }
        }

        function editItem(index) {
            alert('Edit functionality is not implemented.');
        }

        function removeItem(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        }

        // Update cart when page loads
        updateCart();





        document.getElementById('checkout-form').onsubmit = function() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            document.getElementById('cart-data').value = JSON.stringify(cart);
        };
    </script>

</body>

</html>