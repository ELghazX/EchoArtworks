<!-- Navbar -->

<head>
    <link rel="stylesheet" href="styles/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .search-results {
            position: fixed;
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
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
            margin: 0;
            gap: 10px;
        }

        .search-results div img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 8px;
            object-fit: cover;
            border-radius: 8px;
        }

        .container-search {
            display: flex;
            flex-direction: column;
            padding: 0;
            margin: 0;
            width: auto;
            text-align: left;

        }

        .container-search p {
            margin: 0;
            text-align: left;
            width: 100%;
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

                <div id='search-results' class="search-results">

                </div>
            </div>
        <?php endif; ?>
        <div class="navbar">
            <a href="index.php"><i class='bx bx-home' style="font-size: 45px;"></i><span class="tooltip">Beranda</span></a>
            <?php if (isset($_SESSION["role"]) && $_SESSION['role'] == "admin"): ?>
                <a href="dashboard.php"><i class='bx bxs-dashboard' style="font-size: 50px;"></i><span class="tooltip">Dashboard</span></a>
            <?php endif; ?>
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
        <a href="index.php"><i class='bx bx-home' style="font-size: 45px;"></i><span class="tooltip">Beranda</span></a>
        <?php if (isset($_SESSION["role"]) && $_SESSION['role'] == "admin"): ?>
            <a href="dashboard.php"><i class='bx bxs-dashboard' style="font-size: 50px;"></i><span class="tooltip">Dashboard</span></a>
        <?php endif; ?>
        <a href="addPost.php"><i class='bx bx-add-to-queue' style="font-size: 45px;"></i><span class="tooltip">Tambah Post</span></a>
        <a href="help.php"><i class='bx bx-help-circle'></i><span class="tooltip">Help</span></a>
        <a href="faq.php">FAQ</a>
        <?php if (isset($_SESSION["idUser"])): ?>
            <a href="profil.php?idUser=<?= $idUser ?>"><i class='bx bxs-user-circle' style="font-size: 50px;"></i><span class="tooltip">Profil kamu</span></a>
        <?php endif; ?>
        <a href="javascript:void(0);" class="close" onclick="toggleNavbar()"><i class='bx bx-x' style="font-size: 32px;"></i></a>
    </div>
</div>

<script src="script/script.js"></script>
<script src="script/search.js"></script>