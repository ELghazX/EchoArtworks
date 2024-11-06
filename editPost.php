<?php
include 'conn.php';
include 'func.php';
session_start();

if (isset($_GET['id_post'])) {
    $idPost = $_GET['id_post'];
    $sql = "SELECT * FROM posts WHERE id_post = $idPost";
    $posts = ambilData($conn, $sql);
    $post = $posts[0];
} else {
    echo "<script>
        alert('Postingan tidak ditemukan.');
        window.location.href='index.php';
        </script>";
}

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
        alert('Silakan login dulu baru bisa edit postingan.');
        window.location.href='$pageTadi';
    </script>";
    exit;
}

if (isset($_POST['submit'])) {
    $caption = htmlspecialchars($_POST['caption']);
    $description = htmlspecialchars($_POST['description']);

    $targetDir = "uploads/";
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $image_file_type = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $uploadAble = true;

        $uploadAble = cekImage($uploadAble, $image_file_type);
    } else {
        $uploadAble = false;
    }

    if ($uploadAble) {
        $newFileName = uniqid() . "." . $image_file_type;
        $targetFile = $targetDir . $newFileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $sql = "UPDATE posts SET image='$targetFile', caption='$caption', description='$description' WHERE id_post='$idPost'";
        } else {
            echo "Gagal mengunggah gambar.";
            exit;
        }
    } else {
        $sql = "UPDATE posts SET caption='$caption', description='$description' WHERE id_post='$idPost'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/tambahpost.css">
    <title>Edit Postingan</title>
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <div class="header">
                <p style="font-size: 32px;">Edit Postingan</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda yakin ingin mengubah postingan ini?');">
                <div class="container-upload">
                    <div class="container-foto">
                        <label for="input-file" id="drop-area">
                            <input type="file" name="image" accept="uploads/*" id="input-file" hidden>
                            <div id="img-view">
                                <img id="upload-image" src="<?php echo $post['image']; ?>" alt="" style="width: 20%;">
                                <p id="upload-text">Drag dan Drop file kamu atau klik disini untuk upload image</p>
                            </div>
                        </label>
                    </div>
                    <div class="container-form">
                        <label for="caption">Judul</label>
                        <input type="text" id="caption" name="caption" maxlength="25" placeholder="Judul (Maks 25 karakter)" value="<?php echo $post['caption']; ?>">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="description" maxlength="200" placeholder="Deskripsi (Maks 200 karakter)"><?php echo $post['description']; ?></textarea>
                        <div class="submit-btn">
                            <input type="submit" id="submit" value="Ubah Postingan" name="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

</html>