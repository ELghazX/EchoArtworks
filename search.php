<?php
include 'conn.php';
include 'func.php';
session_start();

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $keyword = htmlspecialchars($keyword);
    $sql = "SELECT posts.*, users.username FROM posts 
    JOIN users ON posts.id_user = users.id_user 
    WHERE posts.caption LIKE '%$keyword%' OR users.username LIKE '%$keyword%'";
    $posts = ambilData($conn, $sql);

    if (!count($posts) == 0) {
        foreach ($posts as $post) {
            echo "<div>";
            echo "<a href='detail.php?id_post=" . $post['id_post'] . "'><img src='" . $post['image'] . "' alt=''></a>";
            echo "<p>" . $post['caption'] . "</p>";
            echo "<p>by: " . $post['username'] . "</p>";
            echo "</div>";
        }
    }
}
