<?php
require_once('db.php');
session_start();

$targetName = $conn->real_escape_string($_POST['targetName']);
$projectId = $_SESSION['project_id'];

$sql = "INSERT INTO targetProject (numberProjectForTarget, targetName) VALUES ('$projectId', '$targetName')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['target_id'] = $conn->insert_id;
    echo "Цель создалась с ID: " . $_SESSION['target_id'];
    header("Location: lastStepCreatingTasks.php");
    exit();
} else {
    echo "Ошибка при создании цели: " . $conn->error;
}
$conn->close();