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
        $_SESSION['role'] = $user['role'];
        $_SESSION['idUser'] = $user['id_user'];

        if ($_SESSION['role'] == 'admin') {
            header('Location: dashboard.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
        exit;
    } else {
        echo "<script>alert('Email atau password salah!');
        document.location.href = 'logres.php'</script>";
    }
} else {
    header('Location: index.php');
    exit;
}
