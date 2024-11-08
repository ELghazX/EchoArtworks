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
    <?php if (!count($posts) == 0): ?>
        <?php foreach ($posts as $post) : ?>
            <div>
                <a href="detail.php?id_post=<?php echo $post['id_post']; ?>">
                    <img src="<?php echo $post['image']; ?>" alt="">
                </a><br>
                <div class="container-search">
                    <p><b><?php echo $post['caption']; ?></b></p>
                    <p>posted by: <?php echo $post['username']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h1>Post tidak ditemukan</h1>
    <?php endif; ?>

<?php
} else {
    header('Location: index.php');
}
