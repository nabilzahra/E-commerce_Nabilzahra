<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - Makeup Store</title>
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
            background: linear-gradient(135deg, #FFB6C1 0%, #FFC0CB 50%, #E89ABE 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
        }

        /* Floating Makeup Elements */
        .floating-element {
            position: absolute;
            opacity: 0.15;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(10deg); }
        }

        .lipstick-1 {
            top: 10%;
            left: 10%;
            font-size: 4rem;
            animation-delay: 0s;
        }

        .lipstick-2 {
            top: 70%;
            right: 15%;
            font-size: 3.5rem;
            animation-delay: 1s;
        }

        .sparkle-1 {
            top: 20%;
            right: 20%;
            font-size: 3rem;
            animation-delay: 2s;
        }

        .sparkle-2 {
            bottom: 15%;
            left: 15%;
            font-size: 2.5rem;
            animation-delay: 3s;
        }

        .heart-1 {
            top: 50%;
            left: 5%;
            font-size: 2rem;
            animation-delay: 1.5s;
        }

        .heart-2 {
            bottom: 25%;
            right: 8%;
            font-size: 2.8rem;
            animation-delay: 2.5s;
        }

        .container {
            max-width: 550px;
            width: 100%;
            position: relative;
            z-index: 10;
        }

        .success-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 35px;
            padding: 50px 40px;
            box-shadow: 0 30px 80px rgba(255, 105, 180, 0.3);
            text-align: center;
            animation: slideUp 0.8s ease;
            border: 2px solid rgba(255, 255, 255, 0.5);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* 3D Success Icon with Checkmark */
        .success-icon {
            width: 130px;
            height: 130px;
            margin: 0 auto 35px;
            position: relative;
            animation: scaleIn 0.6s ease 0.3s both;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0) rotate(-180deg);
            }
            to {
                transform: scale(1) rotate(0deg);
            }
        }

        /* Circular Background */
        .circle-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #FF69B4 0%, #FFB6C1 100%);
            border-radius: 50%;
            box-shadow: 0 20px 50px rgba(255, 105, 180, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circle-bg::before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 4px solid rgba(255, 105, 180, 0.3);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.15);
                opacity: 0.3;
            }
        }

        /* Checkmark SVG */
        .checkmark {
            width: 70px;
            height: 70px;
            stroke: white;
            stroke-width: 5;
            stroke-linecap: round;
            fill: none;
            position: relative;
            z-index: 2;
            animation: drawCheck 0.6s ease 0.9s both;
        }

        @keyframes drawCheck {
            from {
                stroke-dasharray: 0, 100;
            }
            to {
                stroke-dasharray: 100, 100;
            }
        }

        /* Sparkles around icon */
        .sparkle {
            position: absolute;
            font-size: 1.2rem;
            animation: sparkleAnim 1.5s ease-in-out infinite;
        }

        @keyframes sparkleAnim {
            0%, 100% { 
                transform: scale(0.8);
                opacity: 0.5;
            }
            50% { 
                transform: scale(1.2);
                opacity: 1;
            }
        }

        .sparkle-1 { top: 0; left: 0; animation-delay: 0s; }
        .sparkle-2 { top: 0; right: 0; animation-delay: 0.3s; }
        .sparkle-3 { bottom: 0; left: 0; animation-delay: 0.6s; }
        .sparkle-4 { bottom: 0; right: 0; animation-delay: 0.9s; }

        .success-title {
            color: #FF69B4;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            letter-spacing: 1px;
            text-shadow: 2px 2px 4px rgba(255, 105, 180, 0.2);
            animation: fadeInUp 0.8s ease 0.5s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-subtitle {
            color: #E89ABE;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease 0.7s both;
        }

        .success-message {
            color: #666;
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 40px;
            max-width: 450px;
            margin-left: auto;
            margin-right: auto;
            animation: fadeInUp 0.8s ease 0.9s both;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease 1.1s both;
        }

        .btn {
            padding: 16px 40px;
            border-radius: 20px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FF69B4 0%, #FF1493 100%);
            color: white;
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.4);
            position: relative;
            z-index: 1;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 105, 180, 0.5);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #FFB6C1 0%, #FFC0CB 100%);
            color: #FF1493;
            box-shadow: 0 10px 30px rgba(255, 182, 193, 0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255, 182, 193, 0.5);
        }

        .thank-you-note {
            margin-top: 35px;
            color: #999;
            font-size: 0.95rem;
            font-style: italic;
            animation: fadeInUp 0.8s ease 1.3s both;
        }

        @media (max-width: 768px) {
            .success-card {
                padding: 60px 30px;
                border-radius: 30px;
            }

            .success-icon {
                width: 140px;
                height: 140px;
            }

            .lipstick-3d {
                width: 50px;
                height: 80px;
            }

            .success-title {
                font-size: 2.2rem;
            }

            .success-subtitle {
                font-size: 1.2rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn {
                width: 100%;
                padding: 18px 40px;
            }

            .floating-element {
                font-size: 2rem !important;
            }
        }
    </style>
</head>
<body>
    <!-- Floating Background Elements -->
    <div class="floating-element lipstick-1">💄</div>
    <div class="floating-element lipstick-2">💄</div>
    <div class="floating-element sparkle-1">✨</div>
    <div class="floating-element sparkle-2">✨</div>
    <div class="floating-element heart-1">💖</div>
    <div class="floating-element heart-2">💖</div>

    <div class="container">
        <div class="success-card">
            <!-- Success Icon with Checkmark -->
            <div class="success-icon">
                <div class="circle-bg">
                    <svg class="checkmark" viewBox="0 0 52 52">
                        <path d="M14 27l7.5 7.5L38 18" />
                    </svg>
                </div>
                <span class="sparkle sparkle-1">✨</span>
                <span class="sparkle sparkle-2">✨</span>
                <span class="sparkle sparkle-3">✨</span>
                <span class="sparkle sparkle-4">✨</span>
            </div>

            <h1 class="success-title">PESANAN BERHASIL!</h1>
            <h2 class="success-subtitle">Terima Kasih Sudah Berbelanja ✨</h2>
            
            <p class="success-message">
                Pesanan Anda telah kami terima dan akan segera kami proses. 
                Kami akan mengirimkan produk makeup pilihan Anda dengan penuh perhatian dan cinta 💕
            </p>

            <div class="action-buttons">
                <a href="{{ url('/front/home') }}" class="btn btn-primary">
                    <i class="fas fa-home"></i>
                    Kembali Belanja
                </a>
            </div>

            <p class="thank-you-note">
                ✨ Tunggu kabar dari kami ya! Happy Shopping 💄💖
            </p>
        </div>
    </div>
</body>
</html>
