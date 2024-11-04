<?php
include 'conn.php';
include 'func.php';
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['submit'])) {
    $caption = htmlspecialchars($_POST['caption']);
    $description = htmlspecialchars($_POST['description']);

    $idUser = $_SESSION['idUser'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $image_file_type = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $uploadAble = true;

    $uploadAble = cekImage($uploadAble, $image_file_type);

    $newFileName = uniqid() . "." . $image_file_type;
    $targetFile = $targetDir . $newFileName;
    if ($uploadAble) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO posts (id_user,image,caption,description) VALUES ('$idUser', '$targetFile','$caption','$description')";
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    }
}
?>
<form method="POST" action="addPost.php" enctype="multipart/form-data">
    <label for="caption">Judul:</label>
    <input type="text" name="caption" id="caption" required>

    <label for="description">Deskripsi:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="image">Upload Gambar:</label>
    <input type="file" name="image" id="image" required>

    <button type="submit" name="submit">Posting Gambar</button>
</form>