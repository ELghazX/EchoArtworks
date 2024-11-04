<?php
include 'conn.php';
include 'func.php';
session_start();

if (isset($_POST['submit'])) {
    $idUser = $_SESSION['idUser'];
    $idPost = $_POST['id_post'];
    $comment = htmlspecialchars($_POST['comment_text']);

    $sql = "INSERT INTO comments (id_post, id_user, comment_text) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iis', $idPost, $idUser, $comment);
    $stmt->execute();

    header("Location: detail.php?id_post=$idPost");
}
