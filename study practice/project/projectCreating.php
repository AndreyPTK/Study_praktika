<?php
require_once('db.php');
session_start();

if (!isset($_SESSION['manager_id'])) {
    echo "Ошибка: пользователь не авторизован.";
    exit();
}

$projectName = $conn->real_escape_string(trim($_POST['createProjectName']));
$managerId = $_SESSION['manager_id'];

if (empty($projectName)) {
    echo "Ошибка: название проекта не может быть пустым.";
    exit();
}

$sql = "INSERT INTO Project (numberManager, nameProject) VALUES ('$managerId', '$projectName')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['project_id'] = $conn->insert_id;
    header("Location: nextStepAboutCreatingTarget.php");
    exit();
} else {
    echo "Ошибка при создании проекта: " . $conn->error;
}

$conn->close();
?>