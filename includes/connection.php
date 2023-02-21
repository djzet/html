<?php
session_start();
$servername = "localhost";
$database = "voyage";
$username = "root";
$password = "QWEasd123";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Сбой соединения:" . mysqli_connect_error());
}
