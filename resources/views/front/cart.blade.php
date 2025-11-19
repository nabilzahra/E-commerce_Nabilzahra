<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bag - Makeup Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(180deg, #FFB6C1 0%, #FFC0CB 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 35px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 12px;
            color: #FF69B4;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .cart-icon-header {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
        }

        .cart-icon-header i {
            font-size: 1.8rem;
            color: #FF69B4;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #FF1493;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .page-title {
            color: white;
            font-size: 2rem;
            font-weight: 700;
        }

        .page-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
            margin-top: 5px;
        }

        .cart-items-container {
            background: white;
            border-radius: 25px;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .cart-item {
            display: flex;
            gap: 20px;
            padding: 25px;
            margin-bottom: 20px;
            background: #FFF5F7;
            border-radius: 20px;
            transition: all 0.3s ease;
            position: relative;
        }

        .cart-item:last-child {
            margin-bottom: 0;
        }

        .cart-item:hover {
            background: #FFE4E9;
            transform: translateX(5px);
        }

        .item-image {
            width: 140px;
            height: 140px;
            background: white;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-details {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .item-info h3 {
            color: #333;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .item-price {
            color: #FF69B4;
            font-size: 1.4rem;
            font-weight: 700;
            margin-top: 5px;
        }

        .item-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 15px;
            background: white;
            padding: 8px 15px;
            border-radius: 25px;
            border: 2px solid #FFB6C1;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .quantity-btn {
            background: #FF69B4;
            color: white;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: #FF1493;
            transform: scale(1.1);
        }

        .quantity-value {
            font-weight: 600;
            color: #333;
            min-width: 30px;
            text-align: center;
            font-size: 1.1rem;
        }

        .remove-btn {
            background: none;
            border: none;
            color: #FF1493;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 8px 15px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .remove-btn:hover {
            color: #C71585;
            transform: scale(1.05);
        }

        .cart-summary {
            background: white;
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .summary-label {
            color: #666;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-icon {
            width: 18px;
            height: 18px;
            background: #FF69B4;
            color: white;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            cursor: help;
        }

        .summary-value {
            color: #FF1493;
            font-weight: 600;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            padding-top: 25px;
            margin-top: 25px;
            border-top: 2px solid #FFE4E9;
        }

        .total-label {
            color: #333;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .total-value {
            color: #FF1493;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .checkout-btn {
            width: 100%;
            background: linear-gradient(135deg, #FF69B4 0%, #FF1493 100%);
            color: white;
            border: none;
            padding: 18px;
            border-radius: 25px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.4);
        }

        .checkout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 105, 180, 0.5);
        }

        .empty-cart {
            text-align: center;
            padding: 80px 40px;
        }

        .empty-cart i {
            font-size: 5rem;
            color: #FFB6C1;
            margin-bottom: 30px;
        }

        .empty-cart h3 {
            color: #666;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .empty-cart p {
            color: #999;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .browse-btn {
            background: linear-gradient(135deg, #FF69B4 0%, #FF1493 100%);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .browse-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.4);
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .cart-items-container,
            .cart-summary {
                padding: 25px 20px;
            }

            .cart-item {
                flex-direction: column;
                text-align: center;
            }

            .item-image {
                width: 100%;
                height: 200px;
                margin: 0 auto;
            }

            .item-actions {
                flex-direction: column;
                gap: 15px;
            }

            .quantity-control {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{ url('/front/home') }}" class="back-button">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div class="cart-icon-header">
                <i class="fas fa-shopping-bag"></i>
                <span class="cart-badge" id="cartCount">4</span>
            </div>
            <div>
                <h1 class="page-title">My Bag</h1>
                <p class="page-subtitle">Total: 4 Items</p>
            </div>
        </div>

        <!-- Cart Items -->
        <div class="cart-items-container" id="cartItemsContainer">
            <!-- Cart Item 1 -->
            <div class="cart-item" data-id="1">
                <div class="item-image">
                    <img src="{{ asset('assets/Images/produk.jpg') }}" alt="Lipstick">
                </div>
                <div class="item-details">
                    <div class="item-info">
                        <h3>SOMETHING Checkmatte Transferproof Lipstick Dengan Berbagai Warna Cantik</h3>
                        <div class="item-price">Rp. 80.000</div>
                    </div>
                    <div class="item-actions">
                        <div class="quantity-control">
                            <button class="quantity-btn" onclick="updateQuantity(1, -1)">-</button>
                            <span class="quantity-value" id="qty-1">1</span>
                            <button class="quantity-btn" onclick="updateQuantity(1, 1)">+</button>
                        </div>
                        <button class="remove-btn" onclick="removeItem(1)">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cart Item 2 -->
            <div class="cart-item" data-id="2">
                <div class="item-image">
                    <img src="{{ asset('assets/Images/produk1.jpg') }}" alt="Cushion">
                </div>
                <div class="item-details">
                    <div class="item-info">
                        <h3>Glad2glow 2-in-1 Perfect Fair Cushion Powder</h3>
                        <div class="item-price">Rp. 146.000</div>
                    </div>
                    <div class="item-actions">
                        <div class="quantity-control">
                            <button class="quantity-btn" onclick="updateQuantity(2, -1)">-</button>
                            <span class="quantity-value" id="qty-2">2</span>
                            <button class="quantity-btn" onclick="updateQuantity(2, 1)">+</button>
                        </div>
                        <button class="remove-btn" onclick="removeItem(2)">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cart Item 3 -->
            <div class="cart-item" data-id="3">
                <div class="item-image">
                    <img src="{{ asset('assets/Images/produk2.webp') }}" alt="Mascara">
                </div>
                <div class="item-details">
                    <div class="item-info">
                        <h3>Mascara Maybelline Sky High Waterproof</h3>
                        <div class="item-price">Rp. 109.000</div>
                    </div>
                    <div class="item-actions">
                        <div class="quantity-control">
                            <button class="quantity-btn" onclick="updateQuantity(3, -1)">-</button>
                            <span class="quantity-value" id="qty-3">1</span>
                            <button class="quantity-btn" onclick="updateQuantity(3, 1)">+</button>
                        </div>
                        <button class="remove-btn" onclick="removeItem(3)">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

            <!-- Cart Summary -->
            <div class="cart-summary">
                <div class="summary-row">
                    <span class="summary-label">
                        Subtotal
                        <span class="info-icon">i</span>
                    </span>
                    <span class="summary-value" id="subtotal">80.000</span>
                </div>
                
                <div class="summary-row">
                    <span class="summary-label">
                        Estimated Delivery & Handling
                    </span>
                    <span class="summary-value">2.000</span>
                </div>

                <div class="summary-total">
                    <span class="total-label">Total</span>
                    <span class="total-value" id="total">Rp. 82.000</span>
                </div>

                <button class="checkout-btn" onclick="window.location.href='{{ url('/checkout/1') }}?from_cart=true'">
                    Checkout
                </button>
            </div>
        </div>
    </div>

    <script>
        const prices = {
            1: 80000,
            2: 146000,
            3: 109000
        };

        let quantities = {
            1: 1,
            2: 2,
            3: 1
        };

        function updateQuantity(id, change) {
            const currentQty = quantities[id];
            const newQty = currentQty + change;
            
            if (newQty >= 1 && newQty <= 99) {
                quantities[id] = newQty;
                document.getElementById('qty-' + id).textContent = newQty;
                updateTotal();
                updateCartCount();
            }
        }

        function removeItem(id) {
            if (confirm('Hapus item dari keranjang?')) {
                const item = document.querySelector(`.cart-item[data-id="${id}"]`);
                item.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    item.remove();
                    delete quantities[id];
                    updateTotal();
                    updateCartCount();
                    
                    if (Object.keys(quantities).length === 0) {
                        showEmptyCart();
                    }
                }, 300);
            }
        }

        function updateTotal() {
            let subtotal = 0;
            for (let id in quantities) {
                subtotal += prices[id] * quantities[id];
            }
            
            const delivery = 2000;
            const total = subtotal + delivery;
            
            document.getElementById('subtotal').textContent = subtotal.toLocaleString('id-ID');
            document.getElementById('total').textContent = 'Rp. ' + total.toLocaleString('id-ID');
        }

        function updateCartCount() {
            let totalItems = 0;
            for (let id in quantities) {
                totalItems += quantities[id];
            }
            document.getElementById('cartCount').textContent = totalItems;
            document.querySelector('.page-subtitle').textContent = `Total: ${totalItems} Items`;
            
            // Save to localStorage
            saveCartToLocalStorage();
        }

        function saveCartToLocalStorage() {
            const cartItems = [];
            for (let id in quantities) {
                if (quantities[id] > 0) {
                    cartItems.push({
                        id: parseInt(id),
                        quantity: quantities[id]
                    });
                }
            }
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
        }

        function showEmptyCart() {
            const container = document.getElementById('cartItemsContainer');
            container.innerHTML = `
                <div class="empty-cart">
                    <i class="fas fa-shopping-bag"></i>
                    <h3>Keranjang Belanja Kosong</h3>
                    <p>Yuk mulai belanja produk makeup favorit kamu!</p>
                    <button class="browse-btn" onclick="window.location.href='{{ url('/front/home') }}'">
                        <i class="fas fa-shopping-bag"></i> Belanja Sekarang
                    </button>
                </div>
            `;
            
            document.querySelector('.cart-summary').style.display = 'none';
            localStorage.setItem('cartItems', JSON.stringify([]));
        }

        // Initialize total on page load
        updateTotal();
        updateCartCount();
        
        // Initialize localStorage on first load
        if (!localStorage.getItem('cartItems')) {
            saveCartToLocalStorage();
        }
    </script>

    <style>
        @keyframes slideOut {
            to {
                transform: translateX(-100%);
                opacity: 0;
            }
        }
    </style>
</body>
</html>
