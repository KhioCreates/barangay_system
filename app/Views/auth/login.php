<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barangay Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .login-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://static.wixstatic.com/media/6285af_583626cb4f9f4d179462e65799a3699e~mv2.jpg/v1/fill/w_1920,h_1080,al_c,q_85,enc_auto/6285af_583626cb4f9f4d179462e65799a3699e~mv2.jpg');
            background-size: cover;
            background-position: center;
            filter: grayscale(100%);
            z-index: 1;
        }

        .login-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .login-container {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background-color: rgba(50, 50, 50, 0.95);
            padding: 50px 60px;
            border-radius: 30px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .login-title {
            color: white;
            font-size: 48px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }

        .form-label {
            color: white;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .form-control {
            background-color: #e0e0e0;
            border: none;
            border-radius: 50px;
            padding: 15px 25px;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .form-control:focus {
            background-color: #f0f0f0;
            box-shadow: none;
            outline: none;
        }

        .password-toggle {
            color: #999;
            font-size: 12px;
            text-align: right;
            margin-top: -20px;
            margin-bottom: 25px;
            cursor: pointer;
        }

        .btn-login-submit {
            background-color: #dc0000;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            width: 100%;
            cursor: pointer;
        }

        .btn-login-submit:hover {
            background-color: #b30000;
        }

        @media (max-width: 768px) {
            .login-box {
                padding: 40px 30px;
                margin: 20px;
            }
            .login-title {
                font-size: 36px;
            }
        }
    </style>
</head>
<body>
    <div class="login-background"></div>

    <div class="login-container">
        <div class="login-box">
            <h1 class="login-title">Login</h1>
            
            <!-- Show validation errors -->
            <?php echo validation_list_errors(); ?>

            <!-- Show flash messages -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?php echo base_url('login'); ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your username" required>   
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                </div>

                <div class="password-toggle" onclick="togglePassword()">
                    ••••••••••••
                </div>

                <button type="submit" class="btn-login-submit">Login</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
