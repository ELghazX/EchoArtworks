<?php
$username = "root";
$password = "";
$server = 'localhost:3307';
$db = 'echoartwork';

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
