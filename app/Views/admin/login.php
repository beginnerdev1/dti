<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pixel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        .main-container {
            height: 100vh;
            overflow: hidden;
        }

        .left-section {
            background-color: #f8f9fa;
            padding: 40px;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .right-section {
            background: linear-gradient(135deg, #6BB6D6 0%, #4A9DBD 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .palm-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: #000;
            margin-bottom: 60px;
        }

        .login-title {
            font-size: 36px;
            font-weight: 700;
            color: #000;
            margin-bottom: 30px;
        }

        .social-btn {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 15px;
            border: 1px solid #dee2e6;
            background: white;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
        }

        .social-btn:hover {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .social-btn.google {
            color: #000;
        }

        .social-btn.facebook {
            background-color: #1877F2;
            color: white;
            border: none;
        }

        .social-btn.facebook:hover {
            background-color: #166FE5;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            color: #999;
            font-size: 14px;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #dee2e6;
        }

        .divider::before {
            left: 0;
        }

        .divider::after {
            right: 0;
        }

        .form-label {
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .form-control:focus {
            border-color: #1877F2;
            box-shadow: 0 0 0 0.2rem rgba(24, 119, 242, 0.1);
        }

        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            padding: 0;
            margin-top: -10px;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background-color: #1a1a1a;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .login-btn:hover {
            background-color: #000;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .signup-text {
            text-align: center;
            margin-top: 25px;
            color: #666;
            font-size: 14px;
        }

        .signup-text a {
            color: #000;
            font-weight: 600;
            text-decoration: none;
        }

        .signup-text a:hover {
            text-decoration: underline;
        }

        .footer-text {
            margin-top: auto;
            color: #999;
            font-size: 13px;
        }

        .top-right-buttons {
            position: absolute;
            top: 30px;
            right: 30px;
            display: flex;
            gap: 15px;
            z-index: 10;
        }

        .btn-outline-light {
            border: 2px solid white;
            color: white;
            padding: 8px 24px;
            border-radius: 25px;
            font-weight: 500;
            background: transparent;
            transition: all 0.3s;
        }

        .btn-outline-light:hover {
            background-color: white;
            color: #4A9DBD;
        }

        .btn-light {
            background-color: white;
            color: #4A9DBD;
            padding: 8px 24px;
            border-radius: 25px;
            font-weight: 500;
            border: 2px solid white;
            transition: all 0.3s;
        }

        .btn-light:hover {
            background-color: transparent;
            color: white;
        }

        .language-selector {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 25px;
            padding: 6px 15px;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 60px;
        }

        @media (max-width: 768px) {
            .right-section {
                display: none;
            }
            
            .left-section {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid main-container">
        <div class="row h-100">
            <!-- Left Section - Login Form -->
            <div class="col-md-6 col-lg-5 left-section">
                <div class="logo">pixel</div>
                
                <div class="language-selector">
                    <span>🇺🇸</span>
                    <span>EN</span>
                    <i class="bi bi-chevron-down"></i>
                </div>

                <h1 class="login-title">Login</h1>

                <button class="social-btn google">
                    <svg width="18" height="18" viewBox="0 0 18 18">
                        <path fill="#4285F4" d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.717v2.258h2.908c1.702-1.567 2.684-3.874 2.684-6.615z"/>
                        <path fill="#34A853" d="M9 18c2.43 0 4.467-.806 5.956-2.183l-2.908-2.259c-.806.54-1.837.86-3.048.86-2.344 0-4.328-1.584-5.036-3.711H.957v2.332C2.438 15.983 5.482 18 9 18z"/>
                        <path fill="#FBBC05" d="M3.964 10.707c-.18-.54-.282-1.117-.282-1.707 0-.593.102-1.17.282-1.709V4.958H.957C.347 6.173 0 7.548 0 9c0 1.452.348 2.827.957 4.042l3.007-2.335z"/>
                        <path fill="#EA4335" d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0 5.482 0 2.438 2.017.957 4.958L3.964 7.29C4.672 5.163 6.656 3.58 9 3.58z"/>
                    </svg>
                    Sign in with Google
                </button>

                <button class="social-btn facebook">
                    <i class="bi bi-facebook" style="font-size: 18px;"></i>
                    Sign in with Facebook
                </button>

                <div class="divider">Or login with email</div>

                <form>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="hamza@email.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div class="password-wrapper">
                            <input type="password" class="form-control" id="passwordInput" value="••••••••••">
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="bi bi-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="login-btn">Login</button>
                </form>

                <div class="signup-text">
                    Don't have an account? <a href="#">Sign up</a>
                </div>

                <div class="footer-text">
                    © 2021 Sportly. All rights reserved.
                </div>
            </div>

            <!-- Right Section - Image -->
            <div class="col-md-6 col-lg-7 right-section p-0">
                <div class="top-right-buttons">
                    <button class="btn btn-outline-light">Sign Up</button>
                    <button class="btn btn-light">Join us</button>
                </div>
                <img src="https://images.unsplash.com/photo-1519046904884-53103b34b206?w=1200&q=80" alt="Palm tree" class="palm-image">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>
</html>