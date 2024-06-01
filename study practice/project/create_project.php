<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['manager_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nameProject'])) {
        $nameProject = $_POST['nameProject'];
        $manager_id = $_SESSION['manager_id'];

        $sqlCreateProject = "INSERT INTO project (numberManager, nameProject) VALUES ('$manager_id', '$nameProject')";
        if ($conn->query($sqlCreateProject) === TRUE) {
            header('Location: nextStepAboutCreatingTarget.php');
            exit();
        } else {
            echo "Ошибка при создании проекта: " . $conn->error;
        }
    } else {
        echo "Пожалуйста, введите название проекта.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание проекта</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body>
    <header>
        <a href="index.php" id="logo"><img src="assets/images/logo.svg" alt=""></a>
        <nav class="main_nav">
            <a href="#about_us">О нас</a>
            <a href="#howtouse">Как пользоваться ресурсом</a>
            <a href="#advantages">Преимущества</a>
        </nav>
        <button id="btn_goProject">Мой проект</button>
    </header>
    <main>
        <article id="overlay1"></article>
        <dialog id="createProject" open>
            <h3>Создание проекта</h3>
            <form action="projectCreating.php" method="post">
                <article>
                    <input type="text" name="createProjectName" placeholder="название проекта" required>
                </article>
                <button id="createProjectBtn" type="submit">Создать</button>
            </form>
            <a href="index.php">Обратно в главное меню</a>
        </dialog>
    </main>
    <footer>
        <p>© 2024 PROJMAN. Все права защищены.</p>
    </footer>
</body>

</html>