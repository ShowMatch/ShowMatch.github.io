<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'db.php';

$team_name = $_POST['team_name'];
$nick1 = $_POST['player_nick_1'];
$nick2 = $_POST['player_nick_2'];

$upload_dir = 'uploads/';
$filename = time() . '_' . basename($_FILES["logo"]["name"]);
$target_path = $upload_dir . $filename;

if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_path)) {
    $stmt = $conn->prepare("INSERT INTO teams (team_name, player_nick_1, player_nick_2, logo_path, status) VALUES (?, ?, ?, ?, 'pending')");
    $stmt->bind_param("ssss", $team_name, $nick1, $nick2, $target_path);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Ошибка добавления в БД: " . $stmt->error;
    }
} else {
    echo "Ошибка загрузки изображения.";
}
?>