<?php
require_once('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['manager_id'])) {
        $taskName = $_POST['taskName'];
        $taskDeadline = $_POST['taskDeadline'];
        $taskAssignee = $_POST['taskAssignee'];
        $projectId = $_POST['projectId'];

        $sqlInsertTask = "INSERT INTO tasksproject (taskName, ProjectDeadline, numberPersonWhichCharge, numberTarget)
                          VALUES ('$taskName', '$taskDeadline', '$taskAssignee', 
                                  (SELECT id FROM targetproject WHERE numberProjectForTarget='$projectId' LIMIT 1))";

        if ($conn->query($sqlInsertTask) === TRUE) {
            echo "Новая задача успешно добавлена";
        } else {
            echo "Ошибка: " . $sqlInsertTask . "<br>" . $conn->error;
        }
    } else {
        echo "У вас нет прав для добавления задач.";
    }
}
?>
