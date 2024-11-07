<?php
include 'func.php';
include 'conn.php';
session_start();
if (isset($_GET['id_post'])) {
    $idPost = $_GET['id_post'];
}
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
    $sqlUnlink = "SELECT * FROM posts WHERE id_post = '$idPost' AND id_user = '$idUser'";
    $unlinkImage = ambilData($conn, $sqlUnlink);
    unlink($unlinkImage[0]['image']);

    $query = "DELETE FROM posts WHERE id_post = $idPost AND id_user = $idUser";
    if ($conn->query($query) === TRUE) {
        echo "<script>
            alert('Postingan berhasil dihapus.');
            window.location.href='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Error: " . $query . "<br>" . $conn->error . "');
            window.location.href='index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Postingan tidak ditemukan.');
        window.location.href='index.php';
        </script>";
}
$conn->close();
