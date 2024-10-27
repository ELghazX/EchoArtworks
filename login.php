<?php
include 'conn.php';
include 'func.php';
session_start();

if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $user = login($conn, $email, $password);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
    } else {
        echo "Email atau password salah";
    }
}
?>

<!-- sesuaikan sma frontendnya kalau mau tambahin label kasih aja
asal name nya sama -->

<form method="post" action="">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="submit">Login</button>
</form>