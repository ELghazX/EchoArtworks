<?php
include 'conn.php';
include 'func.php';

if (isset($_GET['id_post'])) {
    $idPost = $_GET['id_post'];
} else {
    header('Location: index.php');
}

$sql = "SELECT posts.*, users.username, users.id_user,
    (SELECT COUNT(*) FROM likes WHERE likes.id_post = posts.id_post) as like_count,
    (SELECT COUNT(*) FROM comments WHERE comments.id_post = posts.id_post) as comment_count
    FROM posts
    JOIN users ON posts.id_user = users.id_user 
    WHERE posts.id_post = $idPost";


$sql_likes = "SELECT COUNT(*) as total_likes, MAX(is_liked) as is_liked FROM likes WHERE id_post = '$idPost'";
$likes_result = ambilData($conn, $sql_likes);
$likes = $likes_result[0];

$posts = ambilData($conn, $sql);
$post = $posts[0];

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
        <button> <a href="index.php">Kembali</a></button><br>
    </header>
    <main>
        <!-- post konten  -->
        <img src="<?= $post['image'] ?>" alt="">
        <h1><?= $post['caption'] ?></h1>
        <p><?= $post['description'] ?></p>
        <p>Posted by: <a href="profil.php?idUser=<?= $post['id_user'] ?>"><?= $post['username'] ?></a></p>
        <!-- like -->
        <form method='POST' action='toggleLike.php'>
            <input type='hidden' name='id_post' value='<?php echo $post["id_post"]; ?>'>
            <button type='submit'><?php echo $likes['is_liked'] ? "Unlike" : "Like"; ?> (<?php echo $likes['total_likes']; ?>)</button>
        </form>
        <!-- donlot -->
        <a id="downloadBtn" href="<?= $post['image'] ?>" download class="download-btn">Unduh Gambar</a>
        <p>Comments: <?= $post['comment_count'] ?></p>

        <!-- komenn -->
        <?php
        $sql_comments = "SELECT comments.*, users.id_user, users.username FROM comments JOIN users ON comments.id_user = users.id_user WHERE comments.id_post = $idPost";
        $comments = ambilData($conn, $sql_comments);
        ?>
        <div>
            <h2>Comments</h2>
            <form method='POST' action='addComment.php'>
                <input type='hidden' name='id_post' value='<?php echo $post['id_post']; ?>'>
                <textarea name='comment_text' placeholder='Tambahkan komentar...' required></textarea>
                <button name="submit" type='submit'>Komentar</button>
            </form>
            <?php foreach ($comments as $comment): ?>
                <div class="userComment">
                    <p><a href="profil.php?idUser=<?= $comment['id_user'] ?>"><strong><?= $comment['username'] ?>:</strong></a> <?= $comment['comment_text'] ?>
                </div>
            <?php endforeach; ?>
        </div>

    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

</body>

</html>