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
        'year' => 31536000,
        'month' => 2592000,
        'week' => 604800,
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
        'second' => 1,
    ];

    foreach ($intervals as $name => $duration) {
        $count = floor($seconds / $duration);
        if ($count >= 1) {
            return $count . ' ' . $name . ($count > 1 ? 's' : '') . ' ago';
        }
    }

    return 'just now';
}
