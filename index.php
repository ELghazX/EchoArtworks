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
        <div class="main-container">
            <div class="header">
                <a href="" class="logo">ECHOARTWORK</a>
                <div class="search-bar">
                    <input type="text" name="search" id="search" placeholder="Cari artwork disini" class="search-artwork">
                    <button type="submit" class="search-button">
                        <i class='bx bx-search-alt' style="font-size: 32px; color: #fff;"></i>
                    </button>
                </div>
                <div class="navbar">
                    <a href="addPost.php"><i class='bx bx-add-to-queue' style="font-size: 45px;"></i><span class="tooltip">Tambah Post</span></a>
                    <a href=""><i class='bx bx-help-circle'></i><span class="tooltip">Help</span></a>
                    <a href="">FAQ</a>
                    <?php if (isset($_SESSION["idUser"])): ?>
                        <a href="profil.php?idUser=<?= $idUser ?>"><i class='bx bxs-user-circle' style="font-size: 50px;"></i><span class="tooltip">Profil kamu</span></a>
                    <?php endif; ?>
                </div>
                <a class="hamburger" onclick="toggleNavbar()">
                    <i class='bx bx-menu' style="font-size: 45px; color: #fff;"></i>
                </a>
            </div>

            <!-- Hidden Navbar -->
            <div class="hidden-navbar" id="hiddenNavbar">
                <a href="profil.html"><i class='bx bxs-user-circle' style="font-size: 100px; "></i></a>
                <input type="text" name="search" id="search" placeholder="Cari artwork disini" class="search-artwork" style="margin-top: 40px;">
                <button type="submit" style="background: none; border: none; ">
                </button>
                <a href=""><i class='bx bx-add-to-queue' style="font-size: 45px; "></i></a>
                <a href="">Help</a>
                <a href="">FAQ</a>
                <a href="javascript:void(0);" class="close" onclick="toggleNavbar()"><i class='bx bx-x' style="font-size: 32px;"></i></a>
            </div>
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
        <div class="footer">
            @2024 EchoArtworks
        </div>
        <!-- tambahin lagi sini about us dll -->

    </footer>
    <script src="script/script.js"></script>
</body>

</html>