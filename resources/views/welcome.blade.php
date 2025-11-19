<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Makeup Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #FFB6C1 0%, #E89ABE 50%, #D89BC7 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Decorative circles */
        body::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(232, 154, 190, 0.3);
            border-radius: 50%;
            top: -150px;
            left: -150px;
        }

        body::after {
            content: '';
            position: absolute;
            width: 350px;
            height: 350px;
            background: rgba(216, 155, 199, 0.3);
            border-radius: 50%;
            bottom: -100px;
            right: -100px;
        }

        .circle-decoration {
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 182, 193, 0.2);
            border-radius: 50%;
            bottom: -80px;
            left: -80px;
        }

        .welcome-container {
            background: white;
            border-radius: 30px;
            padding: 80px 70px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            max-width: 650px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .logo-container {
            width: 180px;
            height: 180px;
            margin: 0 auto 40px;
            position: relative;
            border-radius: 50%;
            overflow: hidden;
            background: white;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(232, 154, 190, 0.2);
        }

        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        h1 {
            color: #E89ABE;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 25px;
            line-height: 1.3;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        p {
            color: #E89ABE;
            font-size: 1.3rem;
            line-height: 1.6;
            margin-bottom: 50px;
            opacity: 0.9;
        }

        .btn-get-started {
            background: linear-gradient(135deg, #E89ABE 0%, #C994B8 100%);
            border: none;
            border-radius: 30px;
            padding: 20px 70px;
            color: white;
            font-size: 1.3rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(232, 154, 190, 0.3);
            text-transform: capitalize;
        }

        .btn-get-started:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(232, 154, 190, 0.4);
            background: linear-gradient(135deg, #D67FA3 0%, #B87CA0 100%);
        }

        .btn-get-started:active {
            transform: translateY(-1px);
        }

        @media (max-width: 480px) {
            .welcome-container {
                padding: 40px 30px;
            }

            h1 {
                font-size: 1.5rem;
            }

            p {
                font-size: 0.9rem;
            }

            .logo-container {
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="circle-decoration"></div>
    
    <div class="welcome-container">
        <div class="logo-container">
            <img src="{{ asset('assets/Images/logo1.webp') }}" alt="Makeup Store Logo">
        </div>

        <h1>WELCOME TO OUR<br>MAKE UP STORE !</h1>
        
        <p>Discover the best make up products curated just for you</p>
        
        <a href="{{ url('/front/home') }}" class="btn-get-started">Get Started</a>
    </div>
</body>
</html>