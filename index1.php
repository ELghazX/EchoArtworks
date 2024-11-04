<?php

include "conn.php";
include "func.php";
session_start();

$sql = "SELECT posts.*, users.username, 
    (SELECT COUNT(*) FROM likes WHERE likes.id_post = posts.id_post) as like_count,
    (SELECT COUNT(*) FROM comments WHERE comments.id_post = posts.id_post) as comment_count
    FROM posts
    JOIN users ON posts.id_user = users.id_user";
$posts = ambilData($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 100%;
            margin-bottom: 1rem;
        }

        div.postingan {
            columns: 300px;
        }
    </style>
</head>

<body>
    <button class="button open-button">+</button>
    <?php if (!isset($_SESSION['login'])) : ?>
        <article>
            <button> <a href="login.php">Login</a></button>
            <button> <a href="register.php">Register</a></button>
        </article>
    <?php endif; ?>
    <dialog class="modal" id="modal">

        <form method="POST" action="addPost.php" enctype="multipart/form-data">
            <button class="button close-button">X</button>

            <label for="caption">Caption:</label>
            <input type="text" name="caption" id="caption" required>
            <label for="description">Deskripsi:</label>
            <input type="text" name="description" id="description" required>
            <label for="image">Upload Gambar:</label>
            <input type="file" name="image" id="image" required>
            <button type="submit" name="submit">Posting Gambar</button>
        </form>

    </dialog>


    <article>
        <div class="postingan">
            <?php foreach ($posts as $post) : ?>
                <div>
                    <a href="detail.php?id_post=<?= $post['id_post'] ?>"><img src="<?= $post['image'] ?>" alt=""></a>
                    <button class="like-button" data-id="<?= $post['id_post'] ?>">Like(<?= $post['like_count'] ?>)</button>
                </div>
            <?php endforeach; ?>
        </div>
    </article>
    <script>
        document.querySelector('.open-button').addEventListener('click', function() {
            <?php if (!isset($_SESSION['login'])) : ?>
                window.location.href = 'login.php';
            <?php else : ?>
                document.getElementById('modal').showModal();
            <?php endif; ?>
        });

        document.querySelector('.close-button').addEventListener('click', function() {
            document.getElementById('modal').close();
        });
    </script>
    <script src="js/script.js"></script>
</body>

</html>