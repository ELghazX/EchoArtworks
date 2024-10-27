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
