<?php
include 'conn.php';
include 'func.php';
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    if (cekUsername($conn, $username)) {
        echo "Username sudah terdaftar";
    } else if (cekEmail($conn, $email)) {
        echo "Email sudah terdaftar";
    } else if (!konfPassword($password, $password2)) {
        echo "Konfirmasi password tidak sesuai";
    } else {
        if (register($conn, $username, $email, $password)) {
            echo "<script>alert('Berhasil register');
            document.location.href='login.php';</script>";
        }
    }
}

?>
<!-- sesuaikan sma frontendnya kalau mau tambahin label kasih aja
asal name nya sama -->

<form method="post" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password2" placeholder="Konfirmasi password" required>
    <button type="submit" name="submit">Login</button>
</form>