<?php
include 'conn.php';
include 'func.php';
session_start();

if (!isset($_SESSION['idUser'])) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $pageTadi =  $_SERVER['HTTP_REFERER'];
    } else {
        $pageTadi = "index.php";
    }
    echo "<script>
    alert('Silakan login dulu untuk komen');
    window.location.href='$pageTadi';
    </script>";
    exit;

    exit;
}
if (!isset($_POST['id_post'])) {
    echo "<script>
    alert('Post ID tidak ditemukan.');
    window.location.href='index.php';
    </script>";
}
$idUser = $_SESSION['idUser'];
$idPost = $_POST['id_post'];

$comment = htmlspecialchars($_POST['comment_text']);

$sql = "INSERT INTO comments (id_post, id_user, comment_text) VALUES ('$idPost', '$idUser', '$comment')";
$conn->query($sql);

header("Location: detail.php?id_post=$idPost");
