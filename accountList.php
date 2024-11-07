<?php
include 'conn.php';
include 'func.php';
session_start();

if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit;
}
$sql = "SELECT * FROM users WHERE role = 'user'";
$users = ambilData($conn, $sql);

?>
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
        <div class="container">
            <h2>Daftar Pengguna</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['id_user'] ?></td>
                            <td class="username"><?= $user['username'] ?></td>

                            <td>
                                <a href="deleteAcc.php?idUser=<?= $user['id_user'] ?>" onclick="return confirm('Yakin Hapus?')">
                                    <button class="ban-btn"><i class='bx bx-trash'></i>Hapus</button>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<?php include('footer.php') ?>

</html>