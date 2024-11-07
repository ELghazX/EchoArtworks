<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/navbar-admin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="main-container">
        <div class="header">
            <a href="dashboard.php" class="logo"><img src="assets/logo.png" style="height:100px"></a>

            <!-- Navbar -->
            <div class="navbar">
                <a href="index.php"><i class='bx bx-home' style="font-size: 45px;"></i><span class="tooltip">Beranda</span></a>
                <a href="dashboard.php"><i class='bx bxs-dashboard' style="font-size: 45px;"></i><span class="tooltip">Dashboard</span></a>
                <a href="accountList.php"><i class='bx bx-user' style="font-size: 45px;"></i><span class="tooltip">Semua User</span></a>
                <a href="allPost.php"><i class='bx bx-image-add'></i><span class="tooltip">Semua Postingan</span></a>
                <a href="logout.php"><i class='bx bx-exit'></i><span class="tooltip">Logout</span></a>
            </div>

            <!-- Hamburger Menu untuk versi mobile -->
            <a class="hamburger" onclick="toggleNavbar()">
                <i class='bx bx-menu' style="font-size: 45px; color: #fff;"></i>
            </a>
        </div>
        <!-- Hidden Navbar untuk versi mobile -->
        <div class="hidden-navbar" id="hiddenNavbar">
            <a href="index.php"><i class='bx bx-home'></i> Beranda</a>
            <a href="dashboard.php"><i class='bx bxs-dashboard'></i> Dashboard</a>
            <a href="accountList.php"><i class='bx bx-user'></i> Semua User</a>
            <a href="allPost.php"><i class='bx bx-image-add'></i> Semua Postingan</a>
            <a href="logout.php"><i class='bx bx-exit'></i> Logout</a>
            <a href="javascript:void(0);" class="close" onclick="toggleNavbar()"><i class='bx bx-x' style="font-size: 32px;"></i></a>
        </div>
        <script src="script/script.js"></script>
</body>

</html>