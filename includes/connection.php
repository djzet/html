<?php
$servername = "localhost";
$database = "voyage";
$username = "root";
$password = "QWEasd123";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Сбой соединения:" . mysqli_connect_error());
}