<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Makeup Store</title>
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
            background: linear-gradient(135deg, #FFB6C1 0%, #FFC0CB 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #E89ABE;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 30px;
            background: white;
            padding: 15px 30px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: #FFF0F5;
            gap: 15px;
        }

        .checkout-header {
            background: white;
            padding: 40px;
            border-radius: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .checkout-title {
            color: #E89ABE;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .address-section {
            background: #FFF8FA;
            padding: 25px;
            border-radius: 20px;
            position: relative;
        }

        .edit-address-btn {
            position: absolute;
            top: 25px;
            right: 25px;
            background: white;
            border: 2px solid #E89ABE;
            color: #E89ABE;
            padding: 8px 20px;
            border-radius: 15px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .edit-address-btn:hover {
            background: #E89ABE;
            color: white;
        }

        .address-input {
            width: 100%;
            border: 2px solid #E89ABE;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            margin-bottom: 8px;
            background: white;
        }

        .address-input:focus {
            outline: none;
            border-color: #FF69B4;
        }

        .address-display {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .edit-mode .address-display {
            display: none;
        }

        .edit-mode .address-input {
            display: block;
        }

        .address-input {
            display: none;
        }

        .save-address-btn {
            background: #E89ABE;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 15px;
            font-size: 0.9rem;
            cursor: pointer;
            margin-top: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .save-address-btn:hover {
            background: #FF69B4;
        }

        .address-title {
            font-size: 1.1rem;
            color: #999;
            margin-bottom: 10px;
        }

        .address-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        .address-detail {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
        }

        .store-name {
            color: #E89ABE;
            font-weight: 600;
            font-size: 1.5rem;
            margin: 30px 0 20px;
        }

        .product-item {
            background: white;
            padding: 35px;
            border-radius: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .product-image {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E1 100%);
            border-radius: 20px;
            overflow: hidden;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image img {
            width: 90%;
            height: 90%;
            object-fit: contain;
        }

        .product-details {
            flex: 1;
        }

        .product-name {
            font-weight: 600;
            color: #333;
            font-size: 1.2rem;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .product-price {
            color: #E89ABE;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 20px;
            background: #FFF0F5;
            padding: 8px 15px;
            border-radius: 25px;
            width: fit-content;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: white;
            color: #E89ABE;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: #E89ABE;
            color: white;
        }

        .quantity-display {
            font-weight: 600;
            color: #333;
            min-width: 40px;
            text-align: center;
            font-size: 1.3rem;
        }

        .order-summary {
            background: white;
            padding: 35px;
            border-radius: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
            font-size: 1.1rem;
        }

        .summary-label {
            color: #666;
        }

        .summary-value {
            color: #333;
            font-weight: 500;
        }

        .shipping-method {
            background: #FFF8FA;
            padding: 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .shipping-method:hover {
            background: #FFF0F5;
        }

        .shipping-method.active {
            border-color: #E89ABE;
            background: #FFF0F5;
        }

        .radio-custom {
            width: 22px;
            height: 22px;
            accent-color: #E89ABE;
        }

        .shipping-info {
            flex: 1;
        }

        .shipping-name {
            font-weight: 600;
            color: #333;
            font-size: 1.1rem;
        }

        .shipping-time {
            color: #999;
            font-size: 0.95rem;
        }

        .shipping-price {
            color: #E89ABE;
            font-weight: 600;
            font-size: 1.3rem;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
            border-top: 2px solid #FFF0F5;
            margin-top: 15px;
        }

        .total-label {
            font-weight: 700;
            color: #333;
            font-size: 1.4rem;
        }

        .total-value {
            font-weight: 700;
            color: #E89ABE;
            font-size: 1.6rem;
        }

        .btn-order {
            width: 100%;
            background: linear-gradient(135deg, #FF69B4 0%, #FF1493 100%);
            color: white;
            border: none;
            padding: 22px;
            border-radius: 25px;
            font-size: 1.3rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(255, 105, 180, 0.3);
        }

        .btn-order:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 105, 180, 0.4);
        }

        .message-input {
            border: 2px solid #eee;
            padding: 12px 15px;
            border-radius: 12px;
            width: 100%;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            margin-top: 10px;
        }

        .message-input:focus {
            outline: none;
            border-color: #E89ABE;
        }

        .payment-methods {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: 600;
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .container {
                max-width: 100%;
            }

            .product-item {
                flex-direction: column;
                text-align: center;
            }

            .product-image {
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ url('/front/home') }}" class="back-button">
            <i class="fas fa-chevron-left"></i>
            Checkout
        </a>

        @php
            // Check if coming from cart (multiple items) or single product
            $isFromCart = request()->has('from_cart');
            $productId = $id ?? 1;
            
            $products = [
                1 => [
                    'name' => 'SOMETHING Checkmatte Transferproof Lipstick Dengan Berbagai Warna Cantik',
                    'price' => 80000,
                    'image' => 'produk.jpg',
                ],
                2 => [
                    'name' => 'Glad2glow 2-in-1 Perfect Fair Cushion Powder',
                    'price' => 146000,
                    'image' => 'produk1.jpg',
                ],
                3 => [
                    'name' => 'Mascara Maybelline Sky High Waterproof',
                    'price' => 109000,
                    'image' => 'produk2.webp',
                ],
                4 => [
                    'name' => 'Wardah Colorfit Cream Blush Dengan 3 Pilihan Warna',
                    'price' => 78000,
                    'image' => 'produk3.jpg',
                ],
                5 => [
                    'name' => 'Moori Beauty - PINKFLASH Pink Dessert Eyeshadow Palette',
                    'price' => 62000,
                    'image' => 'produk4.jpeg',
                ],
                6 => [
                    'name' => 'IMPLORA EYEBROW PENCIL Tekstur Lembut Ringan Dilengkapi dengan Sikat & Rautan Ken Herbal',
                    'price' => 47000,
                    'image' => 'produk5.webp',
                ],
                7 => [
                    'name' => 'MAKE OVER Intense Matte Lip Cream 6.5 g',
                    'price' => 79000,
                    'image' => 'produk6.jpeg',
                ],
                8 => [
                    'name' => 'PINKFLASH Waterproof Easy Eyeliner Pen | Eye Liner Hitam & Coklat | Pink Flash Smoodgeproof',
                    'price' => 29000,
                    'image' => 'produk7.jpg',
                ],
            ];

            // For single product checkout
            $product = $products[$productId] ?? $products[1];
            
            // This will be overridden by JavaScript if coming from cart
            $subtotal = $product['price'];
            $total = $subtotal;
        @endphp

        <div class="checkout-header">
            <div class="checkout-title">Alamat Pengiriman Kamu</div>
            <div class="address-section" id="addressSection">
                <button class="edit-address-btn" id="editBtn" onclick="toggleEditAddress()">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <button class="save-address-btn" id="saveBtn" onclick="saveAddress()" style="display: none;">
                    <i class="fas fa-check"></i> Simpan
                </button>
                
                <div class="address-title">
                    📍 <span class="address-display" id="recipientNameDisplay">Nabilzahra</span>
                    <input type="text" class="address-input" id="recipientNameInput" value="Nabilzahra" placeholder="Nama Penerima">
                </div>
                
                <div class="address-name">
                    <span class="address-display" id="phoneDisplay">08123456789</span>
                    <input type="text" class="address-input" id="phoneInput" value="08123456789" placeholder="No. Telepon">
                </div>
                
                <div class="address-name">
                    <span class="address-display" id="addressDetailDisplay">Jl. Anggrek Raya No 125 Semarang, Jawa Tengah</span>
                    <input type="text" class="address-input" id="addressDetailInput" value="Jl. Anggrek Raya No 125 Semarang, Jawa Tengah" placeholder="Alamat Lengkap">
                </div>
                
                <div class="address-detail">
                    <span class="address-display" id="addressExtraDisplay">Perumahan Indah</span>
                    <input type="text" class="address-input" id="addressExtraInput" value="Perumahan Indah" placeholder="Detail Tambahan (Opsional)">
                </div>
                
                <div style="display: flex; gap: 15px; margin-top: 10px;">
                    <div style="flex: 1;">
                        <span class="address-display" id="cityDisplay">Semarang</span>
                        <input type="text" class="address-input" id="cityInput" value="Semarang" placeholder="Kota">
                    </div>
                    <div style="flex: 1;">
                        <span class="address-display" id="postalDisplay">50275</span>
                        <input type="text" class="address-input" id="postalInput" value="50275" placeholder="Kode Pos">
                    </div>
                </div>
            </div>
        </div>

        <div class="store-name">Makeup Store</div>

        <div class="product-item" id="productContainer">
            <!-- Products will be loaded here by JavaScript -->
        </div>

        <div class="order-summary">
            <div class="summary-row">
                <span class="summary-label">Pesan untuk Penjual :</span>
            </div>
            <input type="text" placeholder="Tinggalkan Pesan" class="message-input" id="seller-message">

            <div class="summary-row" style="margin-top: 20px;">
                <span class="summary-label">Pengiriman</span>
                <span class="summary-value">JNT Express</span>
            </div>

            <div class="summary-row">
                <span class="summary-label">Total <span id="total-items">1</span> Produk</span>
                <span class="summary-value" id="subtotal-product">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>

            <div class="section-title" style="margin-top: 25px;">Metode Pembayaran :</div>

            <div class="payment-methods">
                <div class="shipping-method active" onclick="selectPayment(this, 'cod')">
                    <input type="radio" name="payment" class="radio-custom" checked>
                    <div class="shipping-info">
                        <div class="shipping-name">COD - Cek Dulu</div>
                        <div class="shipping-time">Bayar di tempat saat barang diterima</div>
                    </div>
                    <div class="shipping-price">💰</div>
                </div>

                <div class="shipping-method" onclick="selectPayment(this, 'transfer')">
                    <input type="radio" name="payment" class="radio-custom">
                    <div class="shipping-info">
                        <div class="shipping-name">Transfer Bank</div>
                        <div class="shipping-time">BCA, Mandiri, BNI, BRI</div>
                    </div>
                    <div class="shipping-price">🏦</div>
                </div>

                <div class="shipping-method" onclick="selectPayment(this, 'ewallet')">
                    <input type="radio" name="payment" class="radio-custom">
                    <div class="shipping-info">
                        <div class="shipping-name">E-Wallet</div>
                        <div class="shipping-time">GoPay, OVO, DANA, ShopeePay</div>
                    </div>
                    <div class="shipping-price">📱</div>
                </div>

                <div class="shipping-method" onclick="selectPayment(this, 'qris')">
                    <input type="radio" name="payment" class="radio-custom">
                    <div class="shipping-info">
                        <div class="shipping-name">QRIS</div>
                        <div class="shipping-time">Scan QR untuk bayar instan</div>
                    </div>
                    <div class="shipping-price">📲</div>
                </div>
            </div>

            <div class="section-title">Rincian Pembayaran:</div>

            <div class="summary-row">
                <span class="summary-label">Subtotal Produk</span>
                <span class="summary-value" id="subtotal-display">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>

            <div class="total-row">
                <span class="total-label">Total Pembayaran</span>
                <span class="total-value" id="total-display">Rp.{{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
        </div>

        <button class="btn-order" onclick="placeOrder()">Pesan Sekarang</button>
    </div>

    <script>
        let quantity = 1;
        const basePrice = {{ $product['price'] }};

        function increaseQuantity() {
            quantity++;
            updateDisplay();
        }

        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
                updateDisplay();
            }
        }

        function updateDisplay() {
            document.getElementById('quantity').textContent = quantity;
            
            // Calculate new prices
            const subtotal = basePrice * quantity;
            const total = subtotal;

            // Update all price displays
            document.getElementById('subtotal-product').textContent = 'Rp' + subtotal.toLocaleString('id-ID');
            document.getElementById('subtotal-display').textContent = 'Rp' + subtotal.toLocaleString('id-ID');
            document.getElementById('total-display').textContent = 'Rp.' + total.toLocaleString('id-ID');
        }

        function selectPayment(element, type) {
            // Remove active class from all payment methods
            document.querySelectorAll('.shipping-method').forEach(method => {
                method.classList.remove('active');
            });
            
            // Add active class to selected method
            element.classList.add('active');
            
            // Check the radio button
            element.querySelector('input[type="radio"]').checked = true;
        }

        // Product data from PHP
        const productsData = {
            1: { name: '{{ $products[1]["name"] }}', price: {{ $products[1]["price"] }}, image: '{{ $products[1]["image"] }}' },
            2: { name: '{{ $products[2]["name"] }}', price: {{ $products[2]["price"] }}, image: '{{ $products[2]["image"] }}' },
            3: { name: '{{ $products[3]["name"] }}', price: {{ $products[3]["price"] }}, image: '{{ $products[3]["image"] }}' }
        };

        // Load products on page load
        window.addEventListener('DOMContentLoaded', function() {
            loadCheckoutProducts();
        });

        function loadCheckoutProducts() {
            const container = document.getElementById('productContainer');
            const urlParams = new URLSearchParams(window.location.search);
            const fromCart = urlParams.get('from_cart');
            
            let cartItems = [];
            let totalItems = 0;
            let subtotalPrice = 0;
            
            if (fromCart === 'true') {
                // Load from cart
                cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                if (cartItems.length === 0) {
                    // Default cart items if localStorage is empty
                    cartItems = [
                        { id: 1, quantity: 1 },
                        { id: 2, quantity: 2 },
                        { id: 3, quantity: 1 }
                    ];
                }
            } else {
                // Single product checkout
                const productId = {{ $productId }};
                cartItems = [{ id: productId, quantity: 1 }];
            }
            
            // Build HTML for all products
            let html = '';
            cartItems.forEach(item => {
                const product = productsData[item.id];
                if (product) {
                    const itemTotal = product.price * item.quantity;
                    subtotalPrice += itemTotal;
                    totalItems += item.quantity;
                    
                    html += `
                        <div style="display: flex; gap: 20px; padding: 20px; background: #FFF8FA; border-radius: 15px; margin-bottom: 15px;">
                            <div style="width: 100px; height: 100px; background: white; border-radius: 10px; overflow: hidden; flex-shrink: 0;">
                                <img src="{{ asset('assets/Images/') }}/${product.image}" alt="${product.name}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="flex: 1;">
                                <div style="color: #333; font-weight: 600; margin-bottom: 8px; font-size: 1rem;">${product.name}</div>
                                <div style="color: #FF69B4; font-size: 1.2rem; font-weight: 700;">Rp. ${product.price.toLocaleString('id-ID')}</div>
                                <div style="color: #666; margin-top: 5px;">Quantity: ${item.quantity}</div>
                            </div>
                        </div>
                    `;
                }
            });
            
            container.innerHTML = html;
            
            // Update totals
            document.getElementById('total-items').textContent = totalItems;
            document.getElementById('subtotal-product').textContent = 'Rp' + subtotalPrice.toLocaleString('id-ID');
            
            const total = subtotalPrice;
            document.getElementById('subtotal-display').textContent = 'Rp' + subtotalPrice.toLocaleString('id-ID');
            document.getElementById('total-display').textContent = 'Rp' + total.toLocaleString('id-ID');
        }

        function toggleEditAddress() {
            const section = document.getElementById('addressSection');
            const editBtn = document.getElementById('editBtn');
            const saveBtn = document.getElementById('saveBtn');
            
            section.classList.add('edit-mode');
            editBtn.style.display = 'none';
            saveBtn.style.display = 'inline-block';
        }

        function saveAddress() {
            const section = document.getElementById('addressSection');
            const editBtn = document.getElementById('editBtn');
            const saveBtn = document.getElementById('saveBtn');
            
            // Update display values from inputs
            document.getElementById('recipientNameDisplay').textContent = document.getElementById('recipientNameInput').value;
            document.getElementById('phoneDisplay').textContent = document.getElementById('phoneInput').value;
            document.getElementById('addressDetailDisplay').textContent = document.getElementById('addressDetailInput').value;
            document.getElementById('addressExtraDisplay').textContent = document.getElementById('addressExtraInput').value;
            document.getElementById('cityDisplay').textContent = document.getElementById('cityInput').value;
            document.getElementById('postalDisplay').textContent = document.getElementById('postalInput').value;
            
            // Toggle edit mode off
            section.classList.remove('edit-mode');
            editBtn.style.display = 'inline-block';
            saveBtn.style.display = 'none';
        }

        function placeOrder() {
            // Validate customer is logged in
            @guest
                alert('Silakan login terlebih dahulu untuk melakukan pemesanan');
                window.location.href = '{{ route("login") }}';
                return;
            @endguest

            // Show loading state
            const btn = event.target;
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            
            // Get customer data from form
            const customerName = document.getElementById('recipientNameInput').value;
            const addressDetail = document.getElementById('addressDetailInput').value;
            const addressExtra = document.getElementById('addressExtraInput').value;
            const customerPhone = document.getElementById('phoneInput')?.value || '08123456789';
            const city = document.getElementById('cityInput')?.value || 'Jakarta';
            const postalCode = document.getElementById('postalInput')?.value || '12345';
            
            // Get selected payment method
            const selectedPayment = document.querySelector('input[name="payment"]:checked');
            const paymentMethod = selectedPayment ? selectedPayment.parentElement.querySelector('.shipping-name').textContent : 'COD';
            
            // Get cart items
            const urlParams = new URLSearchParams(window.location.search);
            const fromCart = urlParams.get('from_cart');
            
            let cartItems = [];
            if (fromCart === 'true') {
                cartItems = JSON.parse(localStorage.getItem('cartItems')) || [
                    { id: 1, quantity: 1 },
                    { id: 2, quantity: 2 },
                    { id: 3, quantity: 1 }
                ];
            } else {
                const productId = {{ $productId }};
                cartItems = [{ id: productId, quantity: 1 }];
            }
            
            // Build order items
            let orderItems = [];
            let subtotal = 0;
            
            cartItems.forEach(item => {
                const product = productsData[item.id];
                if (product) {
                    const itemSubtotal = product.price * item.quantity;
                    orderItems.push({
                        product_id: item.id,
                        product_name: product.name,
                        product_price: product.price,
                        quantity: item.quantity,
                        subtotal: itemSubtotal
                    });
                    subtotal += itemSubtotal;
                }
            });
            
            // Prepare order data
            const orderData = {
                customer_name: customerName,
                customer_email: '{{ Auth::check() ? Auth::user()->email : "" }}',
                customer_phone: customerPhone,
                customer_address: addressDetail + ', ' + addressExtra,
                city: city,
                postal_code: postalCode,
                items: orderItems,
                subtotal: subtotal,
                total: subtotal,
                notes: paymentMethod
            };
            
            // Send order to server
            fetch('{{ route("orders.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(orderData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Clear cart if order from cart
                    if (fromCart === 'true') {
                        localStorage.removeItem('cartItems');
                    }
                    // Redirect to success page
                    window.location.href = '{{ route("order.success") }}?order=' + data.order_number;
                } else {
                    alert('Terjadi kesalahan: ' + data.message);
                    btn.disabled = false;
                    btn.innerHTML = 'Pesan Sekarang';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses pesanan');
                btn.disabled = false;
                btn.innerHTML = 'Pesan Sekarang';
            });
        }
    </script>
</body>
</html>