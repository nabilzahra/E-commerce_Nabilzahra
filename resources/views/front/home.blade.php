<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#FFB6C1">
    <title>Make Up Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-pink: #FFB6C1;
            --secondary-pink: #FFC0CB;
            --dark-pink: #FF69B4;
            --text-color: #333;
            --light-gray: #f5f5f5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--secondary-pink);
            min-height: 100vh;
        }

        /* Header Styles */
        .header {
            background-color: var(--secondary-pink);
            padding: 20px 0;
            box-shadow: none;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1600px;
            margin: 0 auto;
            padding: 0 60px;
            flex-wrap: nowrap;
        }

        .profile-section {
            display: flex;
            align-items: center;
            gap: 15px;
            min-width: 250px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
        }

        .brand-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin: 0;
            letter-spacing: 1px;
        }

        .welcome-text {
            font-size: 0.75rem;
            color: white;
            font-weight: 400;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .profile-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
        }

        .profile-name {
            font-weight: 600;
            color: white;
            font-size: 1.2rem;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .cart-section {
            min-width: 80px;
            text-align: right;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .cart-icon {
            font-size: 1.8rem;
            color: white;
            position: relative;
            cursor: pointer;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .cart-icon:hover {
            transform: scale(1.1);
            color: #FFE4E9;
        }

        .cart-count {
            position: absolute;
            top: 5px;
            right: 5px;
            background: white;
            color: var(--dark-pink);
            font-size: 12px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .btn-logout {
            background: white;
            color: var(--dark-pink);
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 45px;
        }

        .btn-logout:hover {
            background: var(--dark-pink);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* Search Bar */
        .search-bar {
            background: white;
            border-radius: 30px;
            padding: 12px 30px;
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            flex-grow: 1;
            margin: 0 40px;
        }

        .search-icon {
            color: #999;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .search-input {
            border: none;
            outline: none;
            width: 100%;
            padding: 5px;
            font-size: 1rem;
            color: var(--text-color);
            background: transparent;
        }

        .search-input::placeholder {
            color: #999;
        }

        .voice-search {
            color: var(--text-color);
            cursor: pointer;
            padding: 5px;
            font-size: 1.2rem;
        }

        /* Category Navigation */
        .category-nav {
            display: flex;
            justify-content: flex-start;
            gap: 40px;
            margin: 30px auto;
            padding: 15px 60px;
            max-width: 1600px;
            overflow-x: auto;
            -ms-overflow-style: none;
            scrollbar-width: none;
            background-color: var(--secondary-pink);
        }

        .category-nav::-webkit-scrollbar {
            display: none;
        }

        .category-link {
            color: #666666;
            text-decoration: none;
            font-size: 1.15rem;
            font-weight: 500;
            padding: 10px 0;
            white-space: nowrap;
            transition: all 0.3s ease;
            position: relative;
        }

        .category-link:hover {
            color: var(--dark-pink);
        }

        .category-link.active {
            color: var(--dark-pink);
            font-weight: 700;
        }

        .category-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--dark-pink);
            border-radius: 2px;
        }

        /* Product Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            padding: 30px 60px;
            max-width: 1600px;
            margin: 0 auto;
        }

        @media (min-width: 1400px) {
            .products-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 1200px) {
            .products-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .products-grid {
                grid-template-columns: 1fr;
                gap: 15px;
                padding: 15px;
            }
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        }

        .product-image-container {
            width: 100%;
            aspect-ratio: 1;
            background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E1 100%);
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--dark-pink);
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
            font-style: italic;
        }

        .product-info {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .product-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #6B4C4C;
            margin-bottom: 12px;
            height: 60px;
            line-height: 1.4;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }

        .rating-number {
            font-size: 0.85rem;
            font-weight: 600;
            color: #333;
        }

        .stars {
            display: flex;
            gap: 2px;
        }

        .star {
            color: #FFD700;
            font-size: 0.8rem;
        }

        .star.empty {
            color: #ddd;
        }

        .product-colors {
            display: flex;
            gap: 8px;
            margin-bottom: 12px;
        }

        .color-dot {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #E0E0E0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .product-price {
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            font-size: 1.1rem;
            margin-top: auto;
        }

        .btn-checkout {
            width: 100%;
            background: var(--dark-pink);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-checkout:hover {
            background: #ff4d94;
            transform: translateY(-2px);
        }

        .card-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-circle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #eee;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-circle:hover {
            border-color: var(--dark-pink);
            color: var(--dark-pink);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <div class="profile-section">
                @auth
                    <img src="{{ asset('assets/Images/logo2.jpeg') }}" alt="Profile" class="profile-img">
                    <div class="profile-info">
                        <p class="welcome-text">WELCOME</p>
                        <span class="profile-name">{{ explode('@', Auth::user()->email)[0] }}</span>
                    </div>
                @else
                    <div class="brand-logo">
                        <h2 class="brand-name">MakeUp Store</h2>
                    </div>
                @endauth
            </div>
            
            <div class="search-bar">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" id="searchInput" placeholder="Cari produk..." onkeyup="searchProducts()">
                <i class="fas fa-microphone voice-search"></i>
            </div>

            <div class="cart-section">
                <a href="{{ route('cart') }}" class="cart-icon" style="text-decoration: none; color: inherit;">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count" id="cartBadge">0</span>
                </a>
                @auth
                    <a href="{{ route('logout') }}" 
                       class="btn-logout"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-logout">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Category Navigation -->
    <nav class="category-nav">
        <a href="#" class="category-link active" onclick="filterCategory('all', event)">All Products</a>
        <a href="#" class="category-link" onclick="filterCategory('blush', event)">Blush & Bronzer</a>
        <a href="#" class="category-link" onclick="filterCategory('lipstick', event)">Lipstick & Lip Care</a>
        <a href="#" class="category-link" onclick="filterCategory('eyeshadow', event)">Eyeshadow Palette</a>
        <a href="#" class="category-link" onclick="filterCategory('mascara', event)">Mascara & Eyeliner</a>
        <a href="#" class="category-link" onclick="filterCategory('foundation', event)">Foundation & Concealer</a>
        <a href="#" class="category-link" onclick="filterCategory('skincare', event)">Skincare Products</a>
        <a href="#" class="category-link" onclick="filterCategory('tools', event)">Makeup Tools</a>
    </nav>

    <!-- Products Grid -->
    <div class="products-grid">
        <!-- Product Card 1 -->
        <div class="product-card" data-category="lipstick" onclick="window.location.href='{{ route('product.detail', ['id' => 1]) }}'" style="cursor: pointer;">
            <div class="product-image-container">
                <img src="{{ asset('assets/Images/produk.jpg') }}" class="product-image" alt="2in1 Lipstick">
                <span class="product-badge">New!</span>
            </div>
            <div class="product-info">
                <h3 class="product-title">SOMETHING Checkmatte Transferproof Lipstick Dengan Berbagai Warna Cantik</h3>
                <div class="product-rating">
                    <span class="rating-number">4.9</span>
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty">★</span>
                    </div>
                </div>
                <div class="product-colors">
                    <span class="color-dot" style="background: #FFB6C1"></span>
                    <span class="color-dot" style="background: #FFC0CB"></span>
                    <span class="color-dot" style="background: #FFE4B5"></span>
                    <span class="color-dot" style="background: #DC143C"></span>
                    <span class="color-dot" style="background: #8B4513"></span>
                </div>
                <p class="product-price">Rp. 80.000</p>
                <div class="card-buttons">
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                    <a href="{{ route('checkout.product', ['id' => 1]) }}" class="btn-checkout" style="text-decoration: none; display: flex; align-items: center; justify-content: center;" onclick="event.stopPropagation();">Check Out</a>
                </div>
            </div>
        </div>

        <!-- Product Card 2 -->
        <div class="product-card" data-category="foundation" onclick="window.location.href='{{ route('product.detail', ['id' => 2]) }}'" style="cursor: pointer;">
            <div class="product-image-container">
                <img src="{{ asset('assets/Images/produk1.jpg') }}" class="product-image" alt="2in1 Cushion">
                <span class="product-badge">New!</span>
            </div>
            <div class="product-info">
                <h3 class="product-title">Glad2glow Glad2glow 2-in-1 Perfect Fair Cushion Powder</h3>
                <div class="product-rating">
                    <span class="rating-number">4.8</span>
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty">★</span>
                    </div>
                </div>
                <div class="product-colors">
                    <span class="color-dot" style="background: #FFE4B5"></span>
                    <span class="color-dot" style="background: #FFDAB9"></span>
                    <span class="color-dot" style="background: #D2B48C"></span>
                    <span class="color-dot" style="background: #DEB887"></span>
                </div>
                <p class="product-price">Rp. 146.000</p>
                <div class="card-buttons">
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                    <a href="{{ route('checkout.product', ['id' => 2]) }}" class="btn-checkout" style="text-decoration: none; display: flex; align-items: center; justify-content: center;" onclick="event.stopPropagation();">Check Out</a>
                </div>
            </div>
        </div>

        <!-- Product Card 3 -->
        <div class="product-card" data-category="mascara" onclick="window.location.href='{{ route('product.detail', ['id' => 3]) }}'" style="cursor: pointer;">
            <div class="product-image-container">
                <img src="{{ asset('assets/Images/produk2.webp') }}" class="product-image" alt="Mascara">
                <span class="product-badge">New!</span>
            </div>
            <div class="product-info">
                <h3 class="product-title">Mascara Maybelline Sky High Waterproof</h3>
                <div class="product-rating">
                    <span class="rating-number">5.0</span>
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
                <div class="product-colors">
                    <span class="color-dot" style="background: #000000"></span>
                </div>
                <p class="product-price">Rp. 109.000</p>
                <div class="card-buttons">
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                    <a href="{{ route('checkout.product', ['id' => 3]) }}" class="btn-checkout" style="text-decoration: none; display: flex; align-items: center; justify-content: center;" onclick="event.stopPropagation();">Check Out</a>
                </div>
            </div>
        </div>

        <!-- Product Card 4 -->
        <div class="product-card" data-category="blush" onclick="window.location.href='{{ route('product.detail', ['id' => 4]) }}'" style="cursor: pointer;">
            <div class="product-image-container">
                <img src="{{ asset('assets/Images/produk3.jpg') }}" class="product-image" alt="Blush">
            </div>
            <div class="product-info">
                <h3 class="product-title">Wardah Colorfit Cream Blush Dengan 3 Pilihan Warna</h3>
                <div class="product-rating">
                    <span class="rating-number">4.8</span>
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty">★</span>
                    </div>
                </div>
                <div class="product-colors">
                    <span class="color-dot" style="background: #FFB6C1"></span>
                    <span class="color-dot" style="background: #FFA07A"></span>
                    <span class="color-dot" style="background: #FFD700"></span>
                </div>
                <p class="product-price">Rp. 78.000</p>
                <div class="card-buttons">
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                    <a href="{{ route('checkout.product', ['id' => 4]) }}" class="btn-checkout" style="text-decoration: none; display: flex; align-items: center; justify-content: center;" onclick="event.stopPropagation();">Check Out</a>
                </div>
            </div>
        </div>

        <!-- Product Card 5 -->
        <div class="product-card" data-category="eyeshadow" onclick="window.location.href='{{ route('product.detail', ['id' => 5]) }}'" style="cursor: pointer;">
            <div class="product-image-container">
                <img src="{{ asset('assets/Images/produk4.jpeg') }}" class="product-image" alt="Eyeshadow Palette">
            </div>
            <div class="product-info">
                <h3 class="product-title">Moori Beauty - PINKFLASH Pink Dessert Eyeshadow Palette</h3>
                <div class="product-rating">
                    <span class="rating-number">4.8</span>
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty">★</span>
                    </div>
                </div>
                <div class="product-colors">
                    <span class="color-dot" style="background: #FFB6C1"></span>
                </div>
                <p class="product-price">Rp. 62.000</p>
                <div class="card-buttons">
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                    <a href="{{ route('checkout.product', ['id' => 5]) }}" class="btn-checkout" style="text-decoration: none; display: flex; align-items: center; justify-content: center;" onclick="event.stopPropagation();">Check Out</a>
                </div>
            </div>
        </div>

        <!-- Product Card 6 -->
        <div class="product-card" data-category="tools" onclick="window.location.href='{{ route('product.detail', ['id' => 6]) }}'" style="cursor: pointer;">
            <div class="product-image-container">
                <img src="{{ asset('assets/Images/produk5.webp') }}" class="product-image" alt="Eyebrow Pencil">
            </div>
            <div class="product-info">
                <h3 class="product-title">IMPLORA EYEBROW PENCIL Tekstur Lembut Ringan Dilengkapi dengan Sikat & Rautan Ken Herbal</h3>
                <div class="product-rating">
                    <span class="rating-number">4.8</span>
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty">★</span>
                    </div>
                </div>
                <div class="product-colors">
                    <span class="color-dot" style="background: #A9A9A9"></span>
                    <span class="color-dot" style="background: #8B7355"></span>
                    <span class="color-dot" style="background: #5C4033"></span>
                    <span class="color-dot" style="background: #D2B48C"></span>
                </div>
                <p class="product-price">Rp. 47.000</p>
                <div class="card-buttons">
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                    <a href="{{ route('checkout.product', ['id' => 6]) }}" class="btn-checkout" style="text-decoration: none; display: flex; align-items: center; justify-content: center;" onclick="event.stopPropagation();">Check Out</a>
                </div>
            </div>
        </div>

        <!-- Product Card 7 -->
        <div class="product-card" data-category="lipstick" onclick="window.location.href='{{ route('product.detail', ['id' => 7]) }}'" style="cursor: pointer;">
            <div class="product-image-container">
                <img src="{{ asset('assets/Images/produk6.jpeg') }}" class="product-image" alt="Lip Gloss">
            </div>
            <div class="product-info">
                <h3 class="product-title">MAKE OVER Intense Matte Lip Cream 
                    6.5 g </h3>
                    <div class="product-rating">
                    <span class="rating-number">4.8</span>
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty">★</span>
                    </div>
                </div>
                <div class="product-colors">
                    <span class="color-dot" style="background: #FFB6C1"></span>
                    <span class="color-dot" style="background: #FF1493"></span>
                    <span class="color-dot" style="background: #DC143C"></span>
                </div>
                <p class="product-price">Rp 79.000</p>
                <div class="card-buttons">
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                    <a href="{{ route('checkout.product', ['id' => 7]) }}" class="btn-checkout" style="text-decoration: none; display: flex; align-items: center; justify-content: center;" onclick="event.stopPropagation();">Check Out</a>
                </div>
            </div>
        </div>

        <!-- Product Card 8 -->
        <div class="product-card" data-category="mascara" onclick="window.location.href='{{ route('product.detail', ['id' => 8]) }}'" style="cursor: pointer;">
            <div class="product-image-container">
                <img src="{{ asset('assets/Images/produk7.jpg') }}" class="product-image" alt="Eyeliner">
                <span class="product-badge">New!</span>
            </div>
            <div class="product-info">
                <h3 class="product-title">PINKFLASH Waterproof Easy Eyeliner Pen | Eye Liner Hitam & Coklat | Pink Flash Smoodgeproof</h3>
                <div class="product-rating">
                    <span class="rating-number">4.8</span>
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star empty">★</span>
                    </div>
                </div>
                <div class="product-colors">
                    <span class="color-dot" style="background: #000000"></span>
                    <span class="color-dot" style="background: #654321"></span>
                </div>
                <p class="product-price">Rp 29.000</p>
                <div class="card-buttons">
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn-circle" onclick="event.stopPropagation();">
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                    <a href="{{ route('checkout.product', ['id' => 8]) }}" class="btn-checkout" style="text-decoration: none; display: flex; align-items: center; justify-content: center;" onclick="event.stopPropagation();">Check Out</a>
                </div>
            </div>
        </div>

        <!-- Add more product cards with the same structure -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filterCategory(category, event) {
            event.preventDefault();
            
            // Update active category link
            document.querySelectorAll('.category-link').forEach(link => {
                link.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Get all product cards
            const productCards = document.querySelectorAll('.product-card');
            
            // Show/hide products based on category
            productCards.forEach(card => {
                if (category === 'all') {
                    card.style.display = '';
                } else {
                    const productCategory = card.getAttribute('data-category');
                    if (productCategory === category) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                }
            });
            
            // Check if no products found
            const visibleProducts = Array.from(productCards).filter(card => card.style.display !== 'none').length;
            const productsGrid = document.querySelector('.products-grid');
            
            // Remove existing "no results" message if any
            const existingMessage = document.querySelector('.no-results-message');
            if (existingMessage) {
                existingMessage.remove();
            }
            
            // If no products visible, show message
            if (visibleProducts === 0) {
                const noResultsDiv = document.createElement('div');
                noResultsDiv.className = 'no-results-message';
                noResultsDiv.style.cssText = 'grid-column: 1/-1; text-align: center; padding: 60px 20px; font-size: 1.2rem; color: #666;';
                noResultsDiv.innerHTML = '<i class="fas fa-box-open" style="font-size: 3rem; color: #FFB6C1; margin-bottom: 20px; display: block;"></i>Belum ada produk dalam kategori ini';
                productsGrid.appendChild(noResultsDiv);
            }
        }

        function searchProducts() {
            // Get search input value
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            
            // Get all product cards
            const productCards = document.querySelectorAll('.product-card');
            
            // Loop through all product cards
            productCards.forEach(card => {
                // Get product title
                const productTitle = card.querySelector('.product-title').textContent.toLowerCase();
                
                // Check if product title contains search value
                if (productTitle.includes(searchValue)) {
                    // Show product
                    card.style.display = '';
                } else {
                    // Hide product
                    card.style.display = 'none';
                }
            });
            
            // Check if no products found
            const visibleProducts = document.querySelectorAll('.product-card[style=""]').length;
            const productsGrid = document.querySelector('.products-grid');
            
            // Remove existing "no results" message if any
            const existingMessage = document.querySelector('.no-results-message');
            if (existingMessage) {
                existingMessage.remove();
            }
            
            // If no products visible, show message
            if (visibleProducts === 0 && searchValue !== '') {
                const noResultsDiv = document.createElement('div');
                noResultsDiv.className = 'no-results-message';
                noResultsDiv.style.cssText = 'grid-column: 1/-1; text-align: center; padding: 60px 20px; font-size: 1.2rem; color: #666;';
                noResultsDiv.innerHTML = '<i class="fas fa-search" style="font-size: 3rem; color: #FFB6C1; margin-bottom: 20px; display: block;"></i>Produk tidak ditemukan untuk "<strong>' + document.getElementById('searchInput').value + '</strong>"';
                productsGrid.appendChild(noResultsDiv);
            }
        }

        // Update cart badge on page load
        function updateCartBadge() {
            // Get cart items from our current cart page (3 items with quantities 1, 2, 1)
            const defaultCartItems = [
                { id: 1, quantity: 1 },
                { id: 2, quantity: 2 },
                { id: 3, quantity: 1 }
            ];
            
            // Try to get from localStorage, if not exist use default
            let cartItems = JSON.parse(localStorage.getItem('cartItems'));
            if (!cartItems || cartItems.length === 0) {
                cartItems = defaultCartItems;
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
            }
            
            let totalItems = 0;
            cartItems.forEach(item => {
                totalItems += item.quantity;
            });
            document.getElementById('cartBadge').textContent = totalItems;
        }

        // Initialize cart badge when page loads
        document.addEventListener('DOMContentLoaded', function() {
            updateCartBadge();
        });
    </script>
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            

