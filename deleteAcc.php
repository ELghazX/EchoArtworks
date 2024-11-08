<?php
include 'conn.php';
include 'func.php';
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit;
}
if (!isset($_GET['idUser'])) {
    header('Location: accountList.php');
    exit;
}

$idUser = $_GET['idUser'];
$sqlUnlink = "SELECT * FROM posts WHERE id_user = '$idUser'";
$unlinkImage = ambilData($conn, $sqlUnlink);
unlink($unlinkImage[0]['image']);

$sql = "DELETE FROM users WHERE id_user = $idUser";
$conn->query($sql);
header('Location: accountList.php');
exit;
