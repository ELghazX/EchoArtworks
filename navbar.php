<!-- Navbar -->

<head>
    <link rel="stylesheet" href="styles/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid #ccc;
            background-color: white;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
        }

        .search-results div {
            padding: 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }

        .search-results div:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<div class="main-container">
    <div class="header">
        <a href="index.php" class="logo"><img src="assets/logo.png" style="height:100px"></a>
        <?php if (basename($_SERVER['PHP_SELF']) == 'index.php'): ?>
            <div class="search-bar">
                <input type="text" name="search" id="search" placeholder="Cari artwork disini" class="search-artwork" onkeyup="searchItems()">
                <button type="submit" class="search-button">
                    <i class='bx bx-search-alt' style="font-size: 32px; color: #fff;"></i>

                </button>

                <div id='search-results' class="search-results"> </div>
            </div>
        <?php endif; ?>
        <div class="navbar">
            <a href="addPost.php"><i class='bx bx-add-to-queue' style="font-size: 45px;"></i><span class="tooltip">Tambah Post</span></a>
            <a href="help.php"><i class='bx bx-help-circle'></i><span class="tooltip">Help</span></a>
            <a href="faq.php">FAQ</a>
            <?php if (isset($_SESSION["idUser"])): ?>
                <a href="profil.php?idUser=<?= $idUser ?>"><i class='bx bxs-user-circle' style="font-size: 50px;"></i><span class="tooltip">Profil kamu</span></a>
            <?php endif; ?>
        </div>
        <a class="hamburger" onclick="toggleNavbar()">
            <i class='bx bx-menu' style="font-size: 45px; color: #fff;"></i>
        </a>
    </div>
    <!-- Hidden Navbar -->
    <div class="hidden-navbar" id="hiddenNavbar">
        <?php if (isset($_SESSION["idUser"])): ?>
            <a href="profil.html"><i class='bx bxs-user-circle' style="font-size: 100px; "></i></a>
        <?php endif; ?>
        <?php if (basename($_SERVER['PHP_SELF']) == 'index.php'): ?>
            <input type="text" name="search" id="search" placeholder="Cari artwork disini" class="search-artwork" style="margin-top: 40px;">
            <button type="submit" style="background: none; border: none; "></button>
        <?php endif; ?>
        <a href="addPost.php"><i class='bx bx-add-to-queue' style="font-size: 46px; "></i></a>
        <a href="help.php">Help</a>
        <a href="faq.php">FAQ</a>
        <a href="javascript:void(0);" class="close" onclick="toggleNavbar()"><i class='bx bx-x' style="font-size: 32px;"></i></a>
    </div>
</div>

<script src="script/script.js"></script>
<script src="script/search.js"></script>