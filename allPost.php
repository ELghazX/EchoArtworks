<?php
include 'conn.php';
include 'func.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit;
}
$sql = "SELECT posts.*, users.username FROM posts"
    . " JOIN users ON posts.id_user = users.id_user";
$posts = ambilData($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Artwork</title>
    <link rel="stylesheet" href="styles/allpost.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <?php include('navbar-admin.php') ?>
    <div class="main-container">
        <div class="container">
            <h2>Semua Artwork</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Dipost oleh</th>
                        <th>Judul</th>
                        <th>Image</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?= $post['id_post'] ?></td>
                            <td class="username"><?= $post['username'] ?></td>
                            <td class="title"><?= $post['caption'] ?></td>
                            <td><img src="<?= $post['image'] ?>" alt="Art 1" class="artwork-image"></td>
                            <td><a href="deletePostAdmin.php?idPost=<?= $post['id_post'] ?> " onclick="return confirm('Yakin Hapus?')">
                                    <button class=" delete-btn"><i class='bx bx-trash'>Hapus</i></button>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>