<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Pengguna</title>
    <link rel="stylesheet" href="styles/accountList.css">
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
            <h2>Daftar Pengguna</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Username</th>
                        <th>Aksi</th>
                        <th>Status User</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="username">pannnjjjjjjjjjjjjjjjjjjjjaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaanggggggggggggggggggggggggggggggggggggggggggggggggg bangeetttttttttttttttttttttttttttttttt</td>
                        <td><button class="ban-btn"><i class='bx bx-block'></i> Ban</button></td>
                        <td class="status-active">Aktif</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="username">turu</td>
                        <td><button class="unban-btn"><i class='bx bx-block'></i> Unban</button></td>
                        <td class="status-banned">Terban</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php include('footer.php') ?>

</html>