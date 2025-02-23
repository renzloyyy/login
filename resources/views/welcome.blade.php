<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .logo {
            width: 100px; /* Adjust logo size */
            margin-bottom: 15px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 22px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label {
            font-size: 14px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .login-btn, .signup-btn {
            display: block;
            background: #007bff;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s ease;
            margin-top: 10px;
        }
        .login-btn:hover, .signup-btn:hover {
            background: #0056b3;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #ccc;
        }
        .divider span {
            padding: 0 10px;
            color: #777;
            font-size: 14px;
        }
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #fff;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s ease;
            width: 100%;
        }
        .github { background: #24292e; }
        .google { background: #db4437; }
        .facebook { background: #1877f2; }
        .social-btn:hover {
            opacity: 0.85;
        }
        .social-icon {
            width: 20px;
            margin-right: 10px;
        }
        .forgot-password {
            display: block;
            text-align: right;
            font-size: 13px;
            color: #007bff;
            text-decoration: none;
            margin-bottom: 10px;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        /* Responsive Design */
        @media (max-width: 480px) {
            .container {
                padding: 15px;
                max-width: 90%;
            }
            h2 {
                font-size: 20px;
            }
            .social-btn {
                font-size: 14px;
                padding: 10px;
            }
            .logo {
                width: 80px; /* Smaller logo on mobile */
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="{{ asset('logo.png')}}" alt="Logo" class="logo">

        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <a href="#" class="forgot-password">Forgot Password?</a>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="divider">
            <span>OR</span>
        </div>

        <a href="{{ route('auth.redirect', ['provider' => 'github']) }}" class="social-btn github">
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v8/icons/github.svg" class="social-icon" alt="GitHub"> Login with GitHub
        </a>

        <a href="{{ route('auth.redirect', ['provider' => 'google']) }}" class="social-btn google">
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v8/icons/google.svg" class="social-icon" alt="Google"> Login with Google
        </a>

        <a href="{{ route('auth.redirect', ['provider' => 'facebook']) }}" class="social-btn facebook">
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v8/icons/facebook.svg" class="social-icon" alt="Facebook"> Login with Facebook
        </a>

        <a href="{{ route('register') }}" class="signup-btn">Create an Account</a>
    </div>

</body>
</html>
