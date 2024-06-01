<?php
require_once('db.php');
session_start();

$taskNames = $_POST['taskNames'];
$targetId = $_SESSION['target_id'];

foreach ($taskNames as $taskName) {
    $taskName = $conn->real_escape_string($taskName);
    $sql = "INSERT INTO tasksProject (numberTarget, taskName) VALUES ('$targetId', '$taskName')";

    if ($conn->query($sql) !== TRUE) {
        echo "Ошибка при добавлении задачи: " . $conn->error;
        $conn->close();
        exit();
    }
}
header("Location: workOnThePlan.php");

$conn->close();