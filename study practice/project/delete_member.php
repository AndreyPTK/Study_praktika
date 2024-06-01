<?php
require_once('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['manager_id'])) {
        $memberId = $_POST['memberId'];
        $projectId = $_POST['projectId'];

        $sqlDeleteMember = "DELETE FROM memberproject WHERE id='$memberId' AND numberProject='$projectId'";

        if ($conn->query($sqlDeleteMember) === TRUE) {
            echo "Участник успешно удален";
        } else {
            echo "Ошибка: " . $sqlDeleteMember . "<br>" . $conn->error;
        }
    } else {
        echo "У вас нет прав для удаления участников.";
    }
}
?>
