<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nameProject = $_POST['joinProject_nameProject'];
    $loginAdmin = $_POST['joinProject_loginAdmin'];

    $query = "SELECT p.id FROM project p 
              JOIN projectmanager pm ON p.numberManager = pm.id 
              WHERE p.nameProject = :nameProject AND pm.login = :loginAdmin";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nameProject', $nameProject);
    $stmt->bindParam(':loginAdmin', $loginAdmin);
    $stmt->execute();
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($project) {
        $userId = $_SESSION['id'];
        $query = "UPDATE memberproject SET numberProject = :projectId WHERE id = :userId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':projectId', $project['id']);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        header('Location: table_with_sotrudnicks.php');
        exit();
    } else {
        $error = "Неверное название проекта или логин админа проекта";
        include 'join_project.php';
        exit();
    }
} else {
    header('Location: join_project.php');
    exit();
}
?>
