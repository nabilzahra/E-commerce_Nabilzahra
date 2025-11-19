<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Makeup Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: #FFE4E8;
            border-radius: 30px;
            padding: 60px 50px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            max-width: 450px;
            width: 100%;
            text-align: center;
        }

        .makeup-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            position: relative;
            border-radius: 50%;
            overflow: hidden;
            background: white;
            padding: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .makeup-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        h1 {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 40px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-label {
            color: #C994B8;
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 10px;
            display: block;
        }

        .form-input {
            width: 100%;
            padding: 18px 20px;
            border: 3px solid #B8A6D9;
            border-radius: 15px;
            font-size: 1rem;
            background: white;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #9B7EBD;
            box-shadow: 0 0 0 3px rgba(155, 126, 189, 0.1);
        }

        .form-input::placeholder {
            color: #D4C4E0;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }

        .form-footer a {
            color: #E89ABE;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #D67FA3;
        }

        .btn-signin {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #E89ABE 0%, #C994B8 100%);
            border: none;
            border-radius: 15px;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(232, 154, 190, 0.3);
        }

        .btn-signin:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(232, 154, 190, 0.4);
        }

        .btn-signin:active {
            transform: translateY(0);
        }

        .alert {
            background: #FFD6E0;
            border: 2px solid #FFB6C1;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
            color: #C94F7C;
            font-size: 0.9rem;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .invalid-feedback {
            color: #E74C6C;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .is-invalid {
            border-color: #E74C6C !important;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Makeup Icon -->
        <div class="makeup-icon">
            <img src="{{ asset('assets/Images/logo1.webp') }}" alt="Makeup Store Logo">
        </div>

        <h1>Sign in</h1>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label">Enter you Email</label>
                <input type="email" name="email" class="form-input @error('email') is-invalid @enderror" 
                       placeholder="Email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Enter your password</label>
                <input type="password" name="password" class="form-input @error('password') is-invalid @enderror" 
                       placeholder="Password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-footer">
                <a href="{{ route('register') }}">No Account?<br>Sign up</a>
                <a href="#">Forgot Password</a>
            </div>

            <button type="submit" class="btn-signin">Sign in</button>
        </form>
    </div>
</body>
</html>