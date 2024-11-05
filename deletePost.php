<?php
include 'func.php';
include 'conn.php';
session_start();
$idPost = $_GET['id_post'];
if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];
}
if (!isset($idUser)) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $pageTadi =  $_SERVER['HTTP_REFERER'];
    } else {
        $pageTadi = "index.php";
    }
    echo "<script>
        alert('Silakan login dulu baru bisa hapus postingan.');
        window.location.href='$pageTadi';
    </script>";
    exit;
}
if (isset($idPost)) {
    $query = "DELETE FROM posts WHERE id_post = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idPost);
    if ($stmt->execute()) {
        echo "<script>
            alert('Postingan berhasil dihapus.');
            window.location.href='index.php';
            </script>";
    } else {
        echo "Error deleting post: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "No post ID provided.";
}
$conn->close();
