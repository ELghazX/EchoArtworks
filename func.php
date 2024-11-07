<?php
function ambilData($conn, $sql)
{
    $result = $conn->query($sql);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function  login($conn, $email, $password)
{
    $sql = "SELECT * FROM users WHERE email='$email'";
    $users = ambilData($conn, $sql);
    if (count($users) > 0) {
        $user = $users[0];
        if (password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    } else {

        return false;
    }
    return false;
}

function konfPassword($password, $password2)
{
    if ($password == $password2) {
        return true;
    } else {
        return false;
    }
}
function cekEmail($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email='$email'";
    $users = ambilData($conn, $sql);
    if (count($users) > 0) {
        return true;
    } else {
        return false;
    }
}
function cekUsername($conn, $username)
{
    $sql = "SELECT * FROM users WHERE username='$username'";
    $users = ambilData($conn, $sql);
    if (count($users) > 0) {
        return true;
    } else {
        return false;
    }
}

function register($conn, $username, $email, $password)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, email, password,role) VALUES ('$username', '$email', '$password','user')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
function cekImage($uploadAble, $image_file_type)
{
    $checkImage = getimagesize($_FILES["image"]["tmp_name"]);
    if ($checkImage !== false) {
        $uploadAble = true;
    } else {
        echo "File bukan gambar.";
        $uploadAble = false;
    }

    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
        echo "Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.";
        $uploadAble = false;
    }
    return $uploadAble;
}
function formatTimeElapsed($seconds)
{
    $intervals = [
        'tahun' => 31536000,
        'bulan' => 2592000,
        'minggu' => 604800,
        'hari' => 86400,
        'jam' => 3600,
        'menit' => 60,
        'detik' => 1,
    ];

    foreach ($intervals as $name => $duration) {
        $count = floor($seconds / $duration);
        if ($count >= 1) {
            return $count . ' ' . $name . ($count > 1 ? 's' : '') . ' yang lalu';
        }
    }

    return 'just now';
}
function cari($conn, $keyword)
{
    $query = "SELECT * from akun WHERE
    Username LIKE '%$keyword%' OR 
    Nama LIKE '%$keyword%' OR 
    UID LIKE '%$keyword%' OR 
    jenis_joki LIKE '%$keyword%'
    ";
    return ambilData($conn, $query);
}
