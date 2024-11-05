<?php

include "conn.php";
include "func.php";
session_start();
if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];
}
$sql = "SELECT posts.*, users.username, 
    (SELECT COUNT(*) FROM likes WHERE likes.id_post = posts.id_post) as like_count,
    (SELECT COUNT(*) FROM comments WHERE comments.id_post = posts.id_post) as comment_count
    FROM posts
    JOIN users ON posts.id_user = users.id_user";
$posts = ambilData($conn, $sql);
shuffle($posts);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EchoArtworks</title>
    <link rel="stylesheet" href="styles/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header>
        <!-- Navbar -->
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <!-- Login/Tidak -->

        <?php if (!isset($_SESSION['login'])) : ?>
            <div class="container-login">
                <div class="container-login-isi">
                    <p style="text-align: center;">Belum login atau daftar?</p>
                    <p> Ayo gunakan akun kamu untuk akses semua fitur!</p>
                </div>
                <div class="pilih">
                    <a href="logres.php" class="login-button">Login atau Daftar</a>
                </div>
            </div>
        <?php endif; ?>
        <div class="postingan">
            <?php foreach ($posts as $post) : ?>
                <div>
                    <a href="detail.php?id_post=<?= $post['id_post'] ?>"><img src="<?= $post['image'] ?>" alt=""></a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>



    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    <script src="script/script.js"></script>
</body>

</html>