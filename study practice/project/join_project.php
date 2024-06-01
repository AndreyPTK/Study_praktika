<?php
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nameProject = $_POST['joinProject_nameProject'];
    $loginAdmin = $_POST['joinProject_loginAdmin'];

    $query = "SELECT id FROM project WHERE nameProject = :nameProject AND login = :loginAdmin";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nameProject', $nameProject);
    $stmt->bindParam(':loginAdmin', $loginAdmin);
    $stmt->execute();
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($project) {
        $query = "UPDATE memberproject SET numberProject = :projectId WHERE userId = :userId";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':projectId', $project['id']);
        $stmt->bindParam(':userId', $_SESSION['userId']);
        $stmt->execute();

        header('Location: table_with_sotrudnicks.php');
        exit();
    } else {
        $error = "Неверное название проекта или логин руководителя проекта";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <a href="index.php" id="logo"><img src="assets/images/logo.svg" alt=""></a>
        <nav class="main_nav">
            <a href="#">Сделать пожертвование</a>
            <a href="#">Подробнее о сервисе</a>
        </nav>
        <button id="soon-button">Приобрести полную версию <img src="assets/images/lock.svg" alt=""></button>
    </header>
    <main id="main_other_page">
        <section class="work_on_project">
            <button id="work_on_plan">Работа над планом</button>
            <button id="list_participants">Список участников</button>
        </section>
        <section class="someBlock_onOtherPage">
            <article class="someBlock_onOtherPage_article">
                <p>У Вас <b>нет</b> никаких целей и задач. <br> Желаете добавить?</p>
                <button id="openWindowWithTargetAndTasks">Конечно</button>
            </article>
        </section>
    </main>
    <div id="overlay1"></div>
    <dialog id="joinProject" open>
        <h3>Присоединиться к проекту</h3>
        <form action="join_project_handler.php" method="post">
            <article>
                <input type="text" name="joinProject_nameProject" placeholder="Название проекта" required>
                <input type="text" name="joinProject_loginAdmin" placeholder="Логин админа проекта" required>
            </article>
            <button type="submit" id="createProjectBtn">Присоединиться</button>
        </form>
        <a href="index.php">Обратно в главное меню</a>
    </dialog>
    <script src="assets/scripts/scriptsModalWindows.js"></script>
</body>

</html>