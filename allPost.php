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
        <div class="search-bar">
            <input type="text" name="search" id="search" placeholder="Cari  disini" class="search-artwork">
            <button type="submit" class="search-button">
                <i class='bx bx-search-alt' style="font-size: 50px; color: black;"></i>
            </button>
        </div>
        <div class="container">
            <h2>Semua Artwork</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Posted By</th>
                        <th>Judul</th>
                        <th>ArtWork</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="username">pussasdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddycat</td>
                        <td class="title">oren</td>
                        <td><img src="uploads/671f78ffbb39d.jpg" alt="Art 1" class="artwork-image"></td>
                        <td><button class="delete-btn"><i class='bx bx-trash'></i></button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="username">wibucabul</td>
                        <td class="title">keindahan alam</td>
                        <td><img src="uploads/671f7e963abcf.png" alt="Art 2" class="artwork-image"></td>
                        <td><button class="delete-btn"><i class='bx bx-trash'></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>