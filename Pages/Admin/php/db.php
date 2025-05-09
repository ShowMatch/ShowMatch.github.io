<?php
$host = '127.0.0.1';
$user = 'root';
$pass = 'qwerty12345';
$db = 'website';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
?>