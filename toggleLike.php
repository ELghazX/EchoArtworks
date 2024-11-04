<?php
include 'conn.php';
session_start(); // Assuming you are using sessions to manage users

// Get the current user ID and post ID
$idUser = $_SESSION['idUser']; // Ensure the user is logged in
$idPost = $_POST['id_post'];

if (!isset($idUser)) {
    die("You must be logged in to like posts.");
}

// Check if the user has already liked the post
$sql_check = "SELECT * FROM likes WHERE id_post = ? AND id_user = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param('ii', $idPost, $idUser);
$stmt->execute();
$result = $stmt->get_result();
$like = $result->fetch_assoc();

if ($like) {
    // If the post is already liked, unlike it (delete the like)
    $sql_unlike = "DELETE FROM likes WHERE id_post = ? AND id_user = ?";
    $stmt = $conn->prepare($sql_unlike);
    $stmt->bind_param('ii', $idPost, $idUser);
    $stmt->execute();
} else {
    // If the post is not liked yet, like it
    $sql_like = "INSERT INTO likes (id_post, id_user) VALUES (?, ?)";
    $stmt = $conn->prepare($sql_like);
    $stmt->bind_param('ii', $idPost, $idUser);
    $stmt->execute();
}

// Redirect back to the post or homepage
header("Location: detail.php?id_post=$idPost");
