<?php
include 'conn.php';
include 'func.php';
session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];
}

if (isset($_POST['id_post'])) {
    $idPost = $_POST['id_post'];
} else {
    echo "<script>
        alert('Post ID tidak ditemukan.');
        window.location.href='index.php';
    </script>";
    exit;
}

if (!isset($idUser)) {
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
}

$comment = htmlspecialchars($_POST['comment_text']);

$sql = "INSERT INTO comments (id_post, id_user, comment_text) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iis', $idPost, $idUser, $comment);
$stmt->execute();

header("Location: detail.php?id_post=$idPost");
