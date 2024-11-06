<?php
include 'conn.php';
include 'func.php';
session_start();
if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];
}
if (!isset($idUser)) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        $pageTadi =  $_SERVER['HTTP_REFERER'];
    } else {
        $pageTadi = "index.php";
    }
    echo "<script>
        alert('Silakan login dulu baru bisa posting.');
        window.location.href='$pageTadi';
    </script>";
    exit;
}

if (isset($_POST['submit'])) {
    $caption = htmlspecialchars($_POST['caption']);
    $description = htmlspecialchars($_POST['description']);

    $idUser = $_SESSION['idUser'];
    $targetDir = "uploads/";
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $image_file_type = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $uploadAble = true;

        $uploadAble = cekImage($uploadAble, $image_file_type);
    } else {
        $uploadAble = false;
        echo "No file uploaded or there was an upload error.";
    }

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/tambahpost.css">
    <title>Postingan Baru</title>
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <div class="header">
                <p style="font-size: 32px;">Tambah Postingan</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return confirm('Yakin ingin posting?');">
                <div class="container-upload">
                    <div class="container-foto">
                        <label for="input-file" id="drop-area">
                            <input type="file" name="image" accept="uploads/*" id="input-file" hidden required>
                            <div id="img-view">
                                <img id="upload-image" src="assets/upload.png" alt="" style="width: 20%;">
                                <p id="upload-text">Drag dan Drop file kamu atau klik disini untuk upload image</p>
                            </div>
                        </label>
                    </div>
                    <div class="container-form">
                        <label for="caption">Judul</label>
                        <input type="text" id="caption" name="caption" maxlength="25" placeholder="Judul (Maks 25 karakter)" required>
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="description" maxlength="200" placeholder="Deskripsi (Maks 200 karakter)"></textarea>
                        <div class="submit-btn">
                            <input type="submit" id="submit" value="Posting" name="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script src="script/tambahpost.js"></script>
</body>

</html>