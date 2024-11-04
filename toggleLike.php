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
        alert('Silakan login dulu untuk menyukai post.');
        window.location.href='$pageTadi';
    </script>";
    exit;
}

$sql_check = "SELECT * FROM likes WHERE id_post = ? AND id_user = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param('ii', $idPost, $idUser);
$stmt->execute();
$result = $stmt->get_result();
$like = $result->fetch_assoc();

if ($like) {
    $sql_unlike = "DELETE FROM likes WHERE id_post = ? AND id_user = ?";
    $stmt = $conn->prepare($sql_unlike);
    $stmt->bind_param('ii', $idPost, $idUser);
    $stmt->execute();
} else {
    $sql_like = "INSERT INTO likes (id_post, id_user) VALUES (?, ?)";
    $stmt = $conn->prepare($sql_like);
    $stmt->bind_param('ii', $idPost, $idUser);
    $stmt->execute();
}

header("Location: detail.php?id_post=$idPost");
