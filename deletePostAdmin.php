<?php
include 'conn.php';
include 'func.php';
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit;
}

if (!isset($_GET['idPost'])) {
    header('Location: accountList.php');
    exit;
}
$idPost = $_GET['idPost'];
$sqlUnlink = "SELECT * FROM posts WHERE id_post = '$idPost'";
$unlinkImage = ambilData($conn, $sqlUnlink);
unlink($unlinkImage[0]['image']);
$sql = "DELETE FROM posts WHERE id_post = '$idPost'";
$conn->query($sql);
header('Location: allPost.php');
exit;
