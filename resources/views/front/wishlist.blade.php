<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist - Makeup Store</title>
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
            padding: 40px 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            transition: gap 0.3s ease;
        }

        .back-button:hover {
            gap: 15px;
        }

        .page-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            flex: 1;
        }

        .wishlist-content {
            background: white;
            border-radius: 30px;
            padding: 50px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        }

        .wishlist-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 25px;
            border-bottom: 3px solid #FFB6C1;
        }

        .wishlist-header h2 {
            color: #FF69B4;
            font-size: 2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .clear-wishlist {
            background: none;
            border: 2px solid #FF69B4;
            color: #FF69B4;
            padding: 12px 30px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .clear-wishlist:hover {
            background: #FF69B4;
            color: white;
        }

        .wishlist-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .wishlist-card {
            background: #FFF8FA;
            border-radius: 25px;
            padding: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .wishlist-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(255, 105, 180, 0.3);
        }

        .remove-wishlist {
            position: absolute;
            top: 15px;
            right: 15px;
            background: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            z-index: 10;
        }

        .remove-wishlist i {
            color: #FF1493;
            font-size: 1.2rem;
        }

        .remove-wishlist:hover {
            background: #FF1493;
            transform: scale(1.1);
        }

        .remove-wishlist:hover i {
            color: white;
        }

        .product-image {
            width: 100%;
            height: 250px;
            background: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .product-image img {
            width: 85%;
            height: 85%;
            object-fit: contain;
        }

        .product-name {
            color: #333;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .product-price {
            color: #FF69B4;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .stars {
            color: #FFD700;
        }

        .rating-text {
            color: #666;
            font-size: 0.9rem;
        }

        .card-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border-radius: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.95rem;
        }

        .btn-cart {
            background: linear-gradient(135deg, #FF69B4 0%, #FF1493 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(255, 105, 180, 0.3);
        }

        .btn-cart:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 105, 180, 0.4);
        }

        .btn-view {
            background: white;
            color: #FF69B4;
            border: 2px solid #FF69B4;
        }

        .btn-view:hover {
            background: #FFF0F5;
        }

        .empty-wishlist {
            text-align: center;
            padding: 100px 40px;
        }

        .empty-wishlist i {
            font-size: 6rem;
            color: #FFB6C1;
            margin-bottom: 30px;
        }

        .empty-wishlist h3 {
            color: #666;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .empty-wishlist p {
            color: #999;
            font-size: 1.2rem;
            margin-bottom: 40px;
        }

        .browse-products {
            background: linear-gradient(135deg, #FF69B4 0%, #FF1493 100%);
            color: white;
            border: none;
            padding: 18px 50px;
            border-radius: 25px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.4);
        }

        .browse-products:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 105, 180, 0.5);
        }

        @media (max-width: 768px) {
            .wishlist-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 20px;
            }

            .wishlist-content {
                padding: 30px 20px;
            }

            .page-title {
                font-size: 2rem;
            }

            .wishlist-header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{ url('/front/home') }}" class="back-button">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
            <h1 class="page-title">
                <i class="fas fa-heart"></i> Wishlist Saya
            </h1>
            <div style="width: 100px;"></div>
        </div>

        <div class="wishlist-content">
            <div class="wishlist-header">
                <h2>
                    <i class="fas fa-heart"></i>
                    Produk Favorit (5)
                </h2>
                <button class="clear-wishlist" onclick="clearWishlist()">
                    <i class="fas fa-trash"></i> Hapus Semua
                </button>
            </div>

            <div class="wishlist-grid" id="wishlistGrid">
                <!-- Wishlist Item 1 -->
                <div class="wishlist-card" data-id="1">
                    <button class="remove-wishlist" onclick="removeFromWishlist(1)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="product-image">
                        <img src="{{ asset('assets/Images/produk1.jpg') }}" alt="Lipstick">
                    </div>
                    <h3 class="product-name">Lipstick Matte Long Lasting</h3>
                    <div class="product-price">Rp 80.000</div>
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-text">(4.5)</span>
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-cart" onclick="addToCart(1)">
                            <i class="fas fa-shopping-cart"></i>
                            Tambah
                        </button>
                        <button class="btn btn-view" onclick="viewProduct(1)">
                            <i class="fas fa-eye"></i>
                            Lihat
                        </button>
                    </div>
                </div>

                <!-- Wishlist Item 2 -->
                <div class="wishlist-card" data-id="2">
                    <button class="remove-wishlist" onclick="removeFromWishlist(2)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="product-image">
                        <img src="{{ asset('assets/Images/produk2.webp') }}" alt="Cushion">
                    </div>
                    <h3 class="product-name">Cushion Foundation SPF 50+</h3>
                    <div class="product-price">Rp 146.000</div>
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">(5.0)</span>
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-cart" onclick="addToCart(2)">
                            <i class="fas fa-shopping-cart"></i>
                            Tambah
                        </button>
                        <button class="btn btn-view" onclick="viewProduct(2)">
                            <i class="fas fa-eye"></i>
                            Lihat
                        </button>
                    </div>
                </div>

                <!-- Wishlist Item 3 -->
                <div class="wishlist-card" data-id="3">
                    <button class="remove-wishlist" onclick="removeFromWishlist(3)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="product-image">
                        <img src="{{ asset('assets/Images/produk3.jpg') }}" alt="Mascara">
                    </div>
                    <h3 class="product-name">Mascara Waterproof Volume</h3>
                    <div class="product-price">Rp 109.000</div>
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="rating-text">(4.0)</span>
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-cart" onclick="addToCart(3)">
                            <i class="fas fa-shopping-cart"></i>
                            Tambah
                        </button>
                        <button class="btn btn-view" onclick="viewProduct(3)">
                            <i class="fas fa-eye"></i>
                            Lihat
                        </button>
                    </div>
                </div>

                <!-- Wishlist Item 4 -->
                <div class="wishlist-card" data-id="4">
                    <button class="remove-wishlist" onclick="removeFromWishlist(4)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="product-image">
                        <img src="{{ asset('assets/Images/produk4.jpeg') }}" alt="Blush On">
                    </div>
                    <h3 class="product-name">Blush On Natural Glow</h3>
                    <div class="product-price">Rp 78.000</div>
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-text">(4.5)</span>
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-cart" onclick="addToCart(4)">
                            <i class="fas fa-shopping-cart"></i>
                            Tambah
                        </button>
                        <button class="btn btn-view" onclick="viewProduct(4)">
                            <i class="fas fa-eye"></i>
                            Lihat
                        </button>
                    </div>
                </div>

                <!-- Wishlist Item 5 -->
                <div class="wishlist-card" data-id="5">
                    <button class="remove-wishlist" onclick="removeFromWishlist(5)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="product-image">
                        <img src="{{ asset('assets/Images/produk5.webp') }}" alt="Eyeshadow">
                    </div>
                    <h3 class="product-name">Eyeshadow Palette 12 Colors</h3>
                    <div class="product-price">Rp 62.000</div>
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-text">(5.0)</span>
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-cart" onclick="addToCart(5)">
                            <i class="fas fa-shopping-cart"></i>
                            Tambah
                        </button>
                        <button class="btn btn-view" onclick="viewProduct(5)">
                            <i class="fas fa-eye"></i>
                            Lihat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let wishlistCount = 5;

        function removeFromWishlist(id) {
            const card = document.querySelector(`.wishlist-card[data-id="${id}"]`);
            card.style.animation = 'fadeOut 0.4s ease';
            
            setTimeout(() => {
                card.remove();
                wishlistCount--;
                updateWishlistCount();
                
                if (wishlistCount === 0) {
                    showEmptyWishlist();
                }
            }, 400);
        }

        function clearWishlist() {
            if (confirm('Hapus semua produk dari wishlist?')) {
                const cards = document.querySelectorAll('.wishlist-card');
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.animation = 'fadeOut 0.4s ease';
                        setTimeout(() => card.remove(), 400);
                    }, index * 100);
                });
                
                setTimeout(() => {
                    wishlistCount = 0;
                    showEmptyWishlist();
                }, cards.length * 100 + 400);
            }
        }

        function updateWishlistCount() {
            document.querySelector('.wishlist-header h2').innerHTML = `
                <i class="fas fa-heart"></i>
                Produk Favorit (${wishlistCount})
            `;
        }

        function showEmptyWishlist() {
            const grid = document.getElementById('wishlistGrid');
            grid.innerHTML = `
                <div class="empty-wishlist" style="grid-column: 1/-1;">
                    <i class="fas fa-heart-broken"></i>
                    <h3>Wishlist Kosong</h3>
                    <p>Belum ada produk favorit? Yuk tambahkan sekarang!</p>
                    <button class="browse-products" onclick="window.location.href='{{ url('/front/home') }}'">
                        <i class="fas fa-shopping-bag"></i> Lihat Produk
                    </button>
                </div>
            `;
        }

        function addToCart(id) {
            alert('Produk berhasil ditambahkan ke keranjang!');
            // Redirect to cart page
            // window.location.href = '{{ url("/cart") }}';
        }

        function viewProduct(id) {
            window.location.href = '{{ url("/product/detail") }}/' + id;
        }
    </script>

    <style>
        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: scale(0.8);
            }
        }
    </style>
</body>
</html>
