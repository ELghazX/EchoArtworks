<?php
include 'conn.php';
include 'func.php';
session_start();

if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $user = login($conn, $email, $password);
    if ($user) {
        $_SESSION['login'] = true;
        $_SESSION['idUser'] = $user['id_user'];

        header('Location: index.php');
        exit;
    } else {
        echo "<script>alert('Email atau password salah!');
        document.location.href = 'index.php'</script>";
    }
}
