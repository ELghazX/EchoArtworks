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

    <style>
        :root {
            --header-bg-color: rgba(8, 30, 30, 0.8);
            --hero-bg-color: #7387bd;
            --text-color: #f4f3ef;
            --cta-bg-color: #f4f3ef;
            --mauve: #cfbaf0ff;
            --champagne-pink: #fde4cfff;
            --pink-lavender: #f1c0e8ff;
            --hitam: #060606;
            --coklat-tua: #bd8282;
            --biru-muda: #8aaeda;
            --biru-tua: #7387bd;
            --putih-bersih: #fff;
            --biru-muda1: #a6b3da;
        }


        /* footer Styling */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .kontener {
            display: flex;
            flex-direction: column;
            min-height: 70vh;
        }


        .footer {
            margin-top: auto;
            padding: 20px;
            background-color: #f3f3f3;
            border-top: 1px solid #ddd;
            width: 100%;
            box-sizing: border-box;
        }

        .menu-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 20px;
            padding-right: 20px;
            width: 100%;
        }

        .logo-footer {
            flex: 1;
            text-align: left;
        }

        .logo-footer img {
            height: 100px;

        }

        .footer .tentang-kami a {
            text-decoration: none;
            color: var(--hero-bg-color);
            font-weight: bold;
            flex: 1;
            text-align: center;
        }

        .footer .tentang-kami a:hover {
            text-decoration: underline;
            color: var(--coklat-tua) !important;

        }

        .footer-social {
            flex: 1;
            text-align: right;
        }

        .footer-social a {
            font-size: 20px;
            margin: 0 10px;
        }

        .footer-social a:hover {
            color: var(--coklat-tua) !important;
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <?php include 'navbar.php'; ?>

    </header>
    <main>
        <div class="search-mobile" id="search-mobile">
            <?php if (basename($_SERVER['PHP_SELF']) == 'index.php'): ?>
                <div class="search-bar-mobile">
                    <input type="text" name="search" id="search" placeholder="Cari artwork disini" class="search-artwork" onkeyup="searchItems()">
                    <button type="submit" class="search-button">
                        <i class='bx bx-search-alt' style="font-size: 32px; color: #fff;"></i>
                    </button>
                    <div id='search-results' class="search-results"> </div>
                </div>
            <?php endif; ?>
        </div>
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
        <!-- Postingan -->
        <?php if (!$posts) : ?>
            <h1>Belum ada postingan</h1>
        <?php else : ?>
            <div class="postingan">
                <?php foreach ($posts as $post) : ?>
                    <div>
                        <a href="detail.php?id_post=<?= $post['id_post'] ?>"><img src="<?= $post['image'] ?>" alt=""></a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <footer>
        <div class="kontener">
            <div class="footer">
                <div class="menu-footer">
                    <a href="" class="logo-footer"><img src="assets/logo.png" alt="logo"></a>
                    <div class="tentang-kami">
                        <a href="aboutus.php">Tentang Kami</a>
                    </div>
                    <div class="footer-social">
                        <a href="facebook.com"><i class="fab fa-facebook-f"></i></a>
                        <a href="instagram.com"><i class="fab fa-instagram"></i></a>
                        <a href="x.com"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="copyright">
                    <p>&copy; 2024 by ECHOARTWORK</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="script/script.js"></script>
    <script src="script/search.js"></script>
</body>

</html>