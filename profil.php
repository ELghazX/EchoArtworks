<?php
include 'conn.php';
include 'func.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: logres.php');
    exit;
}

$idUser = $_GET['idUser'];
$sql = "SELECT posts.*, users.username, 
    (SELECT COUNT(*) FROM likes WHERE likes.id_post = posts.id_post) as like_count,
    (SELECT COUNT(*) FROM comments WHERE comments.id_post = posts.id_post) as comment_count
    FROM posts
    JOIN users ON posts.id_user = users.id_user
    WHERE posts.id_user = $idUser";
$posts = ambilData($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun</title>
    <link rel="stylesheet" href="styles/profil.css">
    <link rel="stylesheet" href="styles/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="script/profil.js"></script>
</head>

<body>
    <div class="main-container">
        <div class="background-container">
            <a href="index.php" style="text-decoration: none; color: black;">Kembali</a>
            <p style="font-size: 32px; font-weight: 800;">Profil Kamu</p>
            <a href="logout.php" style="text-decoration: none; color: black;">Logout</a>
        </div>
        <div class="profil-container">
            <div class="tempat-foto">
                <img src="assets/Profil.png" alt="Foto Profil">
            </div>
        </div>
        <div class="username-container">
            @<?= htmlspecialchars($posts[0]['username']) ?>
        </div>
        <div class="postingan-kamu">
            Postingan Kamu
        </div>

        <?php if (empty($posts)) : ?>
            <p>Belum ada postingan</p>
            <!-- ini distyling tampil di tengah align nya -->
        <?php else : ?>
            <div class="postingan">
                <?php foreach ($posts as $post) : ?>
                    <div>
                        <a href="detail.php?id_post=<?= $post['id_post'] ?>"><img src="<?= $post['image'] ?>" alt=""></a>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>