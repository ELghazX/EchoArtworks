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
$sql = "DELETE FROM users WHERE id_user = $idUser";
$conn->query($sql);
header('Location: accountList.php');
exit;
