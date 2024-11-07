<?php
include 'conn.php';
include 'func.php';
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    if (cekUsername($conn, $username)) {
        echo "<script>alert('Username sudah terdaftar');
        document.location.href = 'logres.php';</script>";
    } else if (cekEmail($conn, $email)) {
        echo "<script>alert('Email sudah terdaftar');
        document.location.href = 'logres.php';</script>";
    } else if (!konfPassword($password, $password2)) {
        echo "<script>alert('Konfirmasi password tidak sesuai');
        document.location.href = 'logres.php';</script>";
    } else {
        if (register($conn, $username, $email, $password)) {
            echo "<script>alert('Berhasil register');
            document.location.href='logres.php';</script>";
        }
    }
} else {
    header('Location: index.php');
    exit;
}
