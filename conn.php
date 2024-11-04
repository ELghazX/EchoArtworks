<?php
$username = "root";
$password = "";
$server = 'localhost';
$db = 'echoartwork';

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
