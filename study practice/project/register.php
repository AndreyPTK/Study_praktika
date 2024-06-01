<?php
require_once('db.php');

$nameSurname = $conn->real_escape_string($_POST['regNameSurname']);
$login = $conn->real_escape_string($_POST['regLogin']);
$password = $conn->real_escape_string($_POST['regPassword']);
$repeatPassword = $conn->real_escape_string($_POST['regRepeatPassword']);
$isManager = isset($_POST['isManager']) ? 1 : 0;

if ($password !== $repeatPassword) {
    echo "Пароли не совпадают";
    $conn->close();
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

if ($isManager) {
    $sql = "INSERT INTO projectManager (login, FIO, password) VALUES ('$login', '$nameSurname', '$hashedPassword')";
} else {
    $sql = "INSERT INTO memberProject (login, FIO, password) VALUES ('$login', '$nameSurname', '$hashedPassword')";
}

if ($conn->query($sql) === TRUE) {
    echo "Регистрация успешна.";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>