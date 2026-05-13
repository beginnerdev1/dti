<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Admin Login | DTI–CARP Connect Aurora</title>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green-deep: #06281C;
            --green-primary: #0B3D2E;
            --green-soft: #146B4D;
            --green-light: #EAF4EE;
            --gold-main: #D4AF37;
            --gold-dark: #9C7412;
            --gold-soft: #F8E7A8;
            --gold-pale: #FFF7D6;
            --white: #FFFFFF;
            --cream-bg: #F8F7F2;
            --neutral-gray: #667085;
            --shadow-sm: 0 10px 30px rgba(0,0,0,0.06), 0 0 0 1px rgba(0,0,0,0.03);
            --shadow-md: 0 25px 45px rgba(0,0,0,0.12);
            --border-radius-card: 1.6rem;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #06281C 0%, #0B3D2E 45%, #146B4D 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle at 20% 30%, rgba(212,175,55,0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            padding: 20px;
        }

        .login-card {
            background: var(--white);
            border-radius: var(--border-radius-card);
            padding: 2.5rem 2rem;
            box-shadow: var(--shadow-md), 0 0 0 1px rgba(212,175,55,0.25);
            text-align: center;
        }

        .login-card .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.5rem;
        }

        .login-card .logo img {
            max-height: 80px;
            width: auto;
        }

        .login-card h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--green-deep);
            margin-bottom: 0.5rem;
        }

        .login-card p {
            color: var(--neutral-gray);
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .form-group label {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--green-primary);
            margin-bottom: 0.3rem;
            display: block;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
        }

        .form-input {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 1.5px solid rgba(212,175,55,0.3);
            border-radius: 40px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            outline: none;
            transition: 0.2s;
            background: var(--cream-bg);
        }

        .password-input {
            padding-right: 3rem;
        }

        .form-input:focus {
            border-color: var(--gold-main);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(212,175,55,0.15);
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--neutral-gray);
            transition: color 0.2s;
            font-size: 1.1rem;
        }

        .toggle-password:hover {
            color: var(--gold-dark);
        }

        .btn-login {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 40px;
            background: linear-gradient(135deg, #D4AF37, #B68A16);
            color: #06281C;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 10px 20px rgba(212,175,55,0.25);
            transition: all 0.25s;
            margin-top: 0.5rem;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #E6C252, #C99A1C);
            box-shadow: 0 20px 35px rgba(212,175,55,0.35);
        }

        .message {
            padding: 0.7rem 1rem;
            border-radius: 20px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            text-align: left;
        }

        .error-message {
            background: #FFE8E6;
            color: #D93025;
        }

        .success-message {
            background: #E0F2E9;
            color: #0B3D2E;
        }

        .back-link {
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }

        .back-link a {
            color: var(--gold-dark);
            font-weight: 600;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 500px) {
            .login-card {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="logo">
                <img src="<?= base_url('images/DTI-LOGO.png') ?>" alt="DTI Logo">
                <img src="<?= base_url('images/DTI-CARP_Logo-removebg-preview.png') ?>" alt="CARP Logo">
            </div>

            <h2>Admin Login</h2>
            <p>DTI–CARP Connect Aurora Dashboard</p>

            <!-- Display flash messages -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="message error-message">
                    <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="message success-message">
                    <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Login form: now points to Auth controller -->
            <form action="<?= base_url('/admin/login') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username or Email</label>
                    <input type="text" name="username" id="username" class="form-input"
                           placeholder="Enter your username or email" required
                           value="<?= old('username') ?>">
                </div>

                <div class="form-group">
                    <label for="password"><i class="fas fa-lock"></i> Password</label>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="password" class="form-input password-input"
                               placeholder="••••••••" required>
                        <i class="far fa-eye toggle-password" id="togglePasswordIcon"></i>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
            </form>

            <div class="back-link">
                <a href="<?= base_url('/') ?>"><i class="fas fa-arrow-left"></i> Back to Homepage</a>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePasswordIcon');
        const passwordField = document.getElementById('password');

        if (togglePassword && passwordField) {
            togglePassword.addEventListener('click', function () {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    </script>
</body>
</html>