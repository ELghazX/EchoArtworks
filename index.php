<?php

include "conn.php";
include "func.php";
session_start();

$sql = "select * from users";
$users = ambilData($conn, $sql);
$posts = ambilData($conn, "select * from posts");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>HALAMAN TESTING</h1>
    <table>
        <tr>
            <th>Gambar</th>
            <th>caption</th>
            <th>deskripsi</th>
        </tr>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['image']; ?></td>
                <td><?= $post['caption']; ?></td>
                <td><?= $post['description']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form action="addPost.php" method="post" enctype="multipart/form-data">
        <label for="caption">Caption</label>
        <input type="text" name='caption'>
        <label for="deskripsi">deskripsi</label>
        <input type="text" name='deskripsi'>
        <label for="image">uploadgambar</label>
        <input type="file" name='image' id="image">
        <button type="submit" name="submit">submit</button>
    </form>

</body>

</html>