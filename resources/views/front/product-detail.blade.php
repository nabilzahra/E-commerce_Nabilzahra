<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail - Makeup Store</title>
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
            max-width: 1200px;
            margin: 0 auto;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            margin-bottom: 30px;
            transition: gap 0.3s ease;
        }

        .back-button:hover {
            gap: 15px;
        }

        .product-detail-card {
            background: white;
            border-radius: 30px;
            padding: 50px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .product-image-section {
            position: relative;
        }

        .product-image {
            width: 100%;
            aspect-ratio: 1;
            background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E1 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            width: 90%;
            height: 90%;
            object-fit: contain;
        }

        .product-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #FF69B4;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .product-info-section h1 {
            color: #333;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .stars {
            color: #FFD700;
            font-size: 1.2rem;
        }

        .rating-text {
            color: #666;
            font-size: 0.95rem;
        }

        .product-price {
            color: #FF69B4;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .product-description {
            color: #666;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .color-selection {
            margin-bottom: 30px;
        }

        .color-selection h3 {
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .color-options {
            display: flex;
            gap: 15px;
        }

        .color-option {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 3px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .color-option:hover,
        .color-option.active {
            border-color: #FF69B4;
            transform: scale(1.1);
        }

        .quantity-section {
            margin-bottom: 30px;
        }

        .quantity-section h3 {
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border: 2px solid #FFB6C1;
            background: white;
            border-radius: 10px;
            font-size: 1.2rem;
            color: #FF69B4;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background: #FFB6C1;
            color: white;
        }

        .quantity-display {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            min-width: 40px;
            text-align: center;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            flex: 1;
            padding: 18px 30px;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FF69B4 0%, #FF1493 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(255, 105, 180, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 105, 180, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #FF69B4;
            border: 2px solid #FF69B4;
        }

        .btn-secondary:hover {
            background: #FFB6C1;
            color: white;
        }

        @media (max-width: 768px) {
            .product-detail-card {
                grid-template-columns: 1fr;
                padding: 30px;
                gap: 30px;
            }

            .product-info-section h1 {
                font-size: 1.5rem;
            }

            .product-price {
                font-size: 2rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ url('/front/home') }}" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Shop
        </a>

        @php
            $products = [
                1 => [
                    'name' => 'SOMETHING Checkmatte Transferproof Lipstick Dengan Berbagai Warna Cantik',
                    'price' => 80000,
                    'rating' => 4.9,
                    'reviews' => 2456,
                    'image' => 'produk.jpg',
                    'description' => 'Lipstick matte dengan formula transfer-proof yang tahan lama hingga 16 jam. Tekstur ringan dan nyaman di bibir tanpa membuat kering. Tersedia dalam berbagai pilihan warna cantik yang cocok untuk berbagai kesempatan.',
                    'colors' => ['#FFB6C1', '#FFC0CB', '#FFE4B5', '#DC143C', '#8B4513'],
                    'badge' => 'New!'
                ],
                2 => [
                    'name' => 'Glad2glow Glad2glow 2-in-1 Perfect Fair Cushion Powder',
                    'price' => 146000,
                    'rating' => 4.8,
                    'reviews' => 1893,
                    'image' => 'produk1.jpg',
                    'description' => 'Cushion powder 2-in-1 yang memberikan coverage sempurna dengan hasil natural glowing. Mengandung formula brightening dan SPF untuk melindungi kulit dari sinar UV. Praktis dibawa kemana-mana dengan kemasan travel-friendly.',
                    'colors' => ['#FFE4B5', '#FFDAB9', '#D2B48C', '#DEB887'],
                    'badge' => 'New!'
                ],
                3 => [
                    'name' => 'Mascara Maybelline Sky High Waterproof',
                    'price' => 109000,
                    'rating' => 5.0,
                    'reviews' => 3241,
                    'image' => 'produk2.webp',
                    'description' => 'Mascara waterproof dengan formula Sky High yang memberikan volume dan panjang maksimal pada bulu mata. Dilengkapi brush flex tower yang dapat menjangkau setiap bulu mata dari akar hingga ujung. Tahan air dan tahan lama seharian.',
                    'colors' => ['#000000'],
                    'badge' => 'New!'
                ],
                4 => [
                    'name' => 'Wardah Colorfit Cream Blush Dengan 3 Pilihan Warna',
                    'price' => 78000,
                    'rating' => 4.8,
                    'reviews' => 1567,
                    'image' => 'produk3.jpg',
                    'description' => 'Cream blush dengan tekstur lembut dan mudah di-blend. Memberikan warna natural pada pipi dengan hasil dewy finish. Formula tahan lama dan tidak mudah luntur. Cocok untuk semua jenis kulit.',
                    'colors' => ['#FFB6C1', '#FFA07A', '#FFD700'],
                    'badge' => null
                ],
                5 => [
                    'name' => 'Moori Beauty - PINKFLASH Pink Dessert Eyeshadow Palette',
                    'price' => 62000,
                    'rating' => 4.8,
                    'reviews' => 987,
                    'image' => 'produk4.jpeg',
                    'description' => 'Eyeshadow palette dengan 12 warna pilihan yang cocok untuk berbagai look makeup. Formula pigmented dan mudah di-blend. Terdiri dari shade matte dan shimmer yang dapat digunakan untuk daily makeup maupun party look.',
                    'colors' => ['#FFB6C1'],
                    'badge' => null
                ],
                6 => [
                    'name' => 'IMPLORA EYEBROW PENCIL Tekstur Lembut Ringan Dilengkapi dengan Sikat & Rautan Ken Herbal',
                    'price' => 47000,
                    'rating' => 4.8,
                    'reviews' => 2145,
                    'image' => 'produk5.webp',
                    'description' => 'Pensil alis dengan tekstur lembut yang mudah diaplikasikan. Dilengkapi dengan sikat untuk merapikan alis dan rautan untuk ketajaman hasil. Formula tahan lama dan waterproof. Tersedia dalam berbagai shade natural.',
                    'colors' => ['#A9A9A9', '#8B7355', '#5C4033', '#D2B48C'],
                    'badge' => null
                ],
                7 => [
                    'name' => 'MAKE OVER Intense Matte Lip Cream 6.5 g',
                    'price' => 79000,
                    'rating' => 4.7,
                    'reviews' => 1876,
                    'image' => 'produk6.jpeg',
                    'description' => 'Lip cream dengan hasil matte intense yang tahan lama. Formula lightweight yang nyaman di bibir dan tidak membuat kering. Pigmentasi tinggi dengan satu kali apply. Tersedia dalam berbagai pilihan warna trendy.',
                    'colors' => ['#FFB6C1', '#FF1493', '#DC143C'],
                    'badge' => null
                ],
                8 => [
                    'name' => 'PINKFLASH Waterproof Easy Eyeliner Pen | Eye Liner Hitam & Coklat | Pink Flash Smoodgeproof',
                    'price' => 29000,
                    'rating' => 4.6,
                    'reviews' => 3456,
                    'image' => 'produk7.jpg',
                    'description' => 'Eyeliner pen dengan formula waterproof dan smudgeproof yang tahan hingga 24 jam. Aplikator tip yang presisi memudahkan untuk membuat garis eyeliner yang sempurna. Quick dry dan tidak mudah luntur.',
                    'colors' => ['#000000', '#654321'],
                    'badge' => 'New!'
                ],
            ];

            $product = $products[$id] ?? $products[1];
        @endphp

        <div class="product-detail-card">
            <div class="product-image-section">
                <div class="product-image">
                    <img src="{{ asset('assets/Images/' . $product['image']) }}" alt="{{ $product['name'] }}">
                </div>
                @if($product['badge'])
                    <div class="product-badge">{{ $product['badge'] }}</div>
                @endif
            </div>

            <div class="product-info-section">
                <h1>{{ $product['name'] }}</h1>
                
                <div class="product-rating">
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($product['rating']))
                                <i class="fas fa-star"></i>
                            @elseif($i == ceil($product['rating']) && $product['rating'] - floor($product['rating']) >= 0.5)
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <span class="rating-text">{{ $product['rating'] }} ({{ number_format($product['reviews']) }} reviews)</span>
                </div>

                <div class="product-price">Rp. {{ number_format($product['price'], 0, ',', '.') }}</div>

                <p class="product-description">
                    {{ $product['description'] }}
                </p>

                <div class="color-selection">
                    <h3>Available Colors</h3>
                    <div class="color-options">
                        @foreach($product['colors'] as $color)
                            <div class="color-option {{ $loop->first ? 'active' : '' }}" style="background: {{ $color }};"></div>
                        @endforeach
                    </div>
                </div>

                <div class="quantity-section">
                    <h3>Quantity</h3>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="decreaseQuantity()">
                            <i class="fas fa-minus"></i>
                        </button>
                        <span class="quantity-display" id="quantity">1</span>
                        <button class="quantity-btn" onclick="increaseQuantity()">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('cart') }}" class="btn btn-primary">
                        <i class="fas fa-shopping-cart"></i>
                        Add to Cart
                    </a>
                    <a href="{{ route('wishlist') }}" class="btn btn-secondary">
                        <i class="fas fa-heart"></i>
                        Wishlist
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        let quantity = 1;

        function increaseQuantity() {
            quantity++;
            document.getElementById('quantity').textContent = quantity;
        }

        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantity').textContent = quantity;
            }
        }

        // Color selection
        document.querySelectorAll('.color-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.color-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>