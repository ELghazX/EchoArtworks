<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/editpost.css">
    <title>Edit Postingan</title>
</head>

<body>
    <div class="main-container">
        <div class="header">
            <p style="font-size: 32px;">Edit Postingan</p>
        </div>
        <div class="container-upload">
            <div class="container-foto">
                <label for="input-file" id="drop-area">
                    <input type="file" accept="image/*" id="input-file" hidden>
                    <div id="img-view">
                        <img id="upload-image" src="assets/upload.png" alt="" style="width: 20%;">
                        <p id="upload-text">Drag dan Drop file kamu atau klik disini untuk upload image</p>
                    </div>
                </label>
            </div>
            <div class="container-form">
                <form action="">
                    <label for="caption">Judul</label>
                    <input type="text" id="caption" name="caption" maxlength="25" placeholder="Judul (Maks 25 karakter)">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" maxlength="200" placeholder="Deskripsi (Maks 200 karakter)"></textarea>
                    <div class="submit-btn">
                        <input type="submit" id="submit" value="Edit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="script/tambahpost.js"></script>
</body>

</html>