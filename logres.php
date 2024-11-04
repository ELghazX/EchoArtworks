<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- STYLE -->
    <link rel="stylesheet" href="styles/masuk.css">
</head>
<body>
    <!-- Form Container -->
    <div class="form-container">
        <div class="col-1">
            <p class = "featured-words">Masuk atau Daftar sekarang untuk mulai terinspirasi!</p>
        </div> 

        <div class="col col-2">
            <div class="btn-box">
                <button class="btn btn-1" id="login" >Login</button>
                <button class="btn btn-2" id="register" >Daftar</button>
            </div>

            <!-- Login Form Container -->
            <form action="login.php" method="POST">
                <div class="login-form">
                    <div class="form-title">
                        <span>Login</span>
                    </div>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="email" class="input-field" name="email" id="email" placeholder="Email" required>
                            <i class="bx bx-envelope icon"></i>
                        </div>
                        <div class="input-box"> 
                            <input type="password" class="input-field" name="password" id="password" placeholder="Password" required>
                            <i class="bx bx-lock-alt icon"></i>
                        </div>
                        <div class="input-box">
                            <button class="input-submit" name="submit" id="login">
                                <span>Login</span>
                                <i class="bx bx-right-arror-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Register Form Container -->
            <form action="register.php" method="POST">
                <div class="register-form">
                    <div class="form-title">
                        <span>Buat Akun</span>
                    </div>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="email" class="input-field" name = "email" id="email" placeholder="Email" required>
                            <i class="bx bx-envelope icon"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" name = "username" id="username"placeholder="Username" required>
                            <i class="bx bx-user icon"></i>
                        </div>
                        <div class="input-box"> 
                            <input type="password" class="input-field" name = "password" id="password" placeholder="Password" required>
                            <i class="bx bx-lock-alt icon"></i>
                        </div>
                        <div class="input-box"> 
                            <input type="password" class="input-field" name = "password2" id="cpassword" placeholder="Confirm Password" required>
                            <i class="bx bx-lock-alt icon"></i>
                        </div>
                        <div class="input-box">
                            <button class="input-submit" name="submit" id="register">
                                <span>Daftar</span>
                                <i class="bx bx-right-arror-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>
        
    <!-- JS -->
    <script src="js/main.js"></script>
</body>
</html>
