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
?>

    <head>
        <link rel="stylesheet" href="styles/index.css">
        <link rel="stylesheet" href="styles/detail.css">
    </head>
    <?php include 'navbar.php'; ?>
    <header class="btn">
        <a href="index.php">Kembali</a>
    </header>
    <h2>Hasil Pencarian: <?= $keyword ?></h2>
    <?php if (!count($posts) == 0): ?>
        <?php foreach ($posts as $post) : ?>

            <div class="postingan">
                <?php foreach ($posts as $post) : ?>
                    <div>
                        <a href="detail.php?id_post=<?= $post['id_post'] ?>"><img src="<?= $post['image'] ?>" alt=""></a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h1>Post tidak ditemukan</h1>
    <?php endif; ?>

<?php
} else {
    header('Location: index.php');
}
