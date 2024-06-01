<?php
require_once('db.php');
session_start();

if (!isset($_SESSION['manager_id']) && !isset($_SESSION['member_id'])) {
    echo "Пользователь не авторизован";
    exit();
}

$projectId = $_SESSION['project_id'];
$userRole = $_SESSION['user_role'];

$sqlMembers = "SELECT FIO, login FROM memberproject WHERE numberProject='$projectId'";
$resultMembers = $conn->query($sqlMembers);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJMAN</title>
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
    <main style="height: 894px;">
        <section class="work_on_project">
            <button id="work_on_plan" style="background-color: rgb(18, 154, 63, 50%);" onclick="window.location.href = 'workOnThePlan.php';">Работа над планом</button>
            <button id="list_participants" style="background-color: #129A3F; color: white;">Список участников</button>
        </section>
        <table class="table_first">
            <thead class="thead_first_table">
                <tr>
                    <th class="th_firstTable">Имя Фамилия</th>
                    <th class="th_firstTable">Логин</th>
                    <?php if ($userRole == 'manager') : ?>
                        <th>Удалить</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td_firstTable">
                        <article class="user-info">
                            <img src="assets/images/user.svg" alt="User Icon" class="user-icon">
                            <span>Романов Роман</span>
                        </article>
                    </td>
                    <td>roman.andrv4</td>
                    <td>moloko.coc@gmail.com</td>
                    <td>
                        <button class="delete-btn">
                            Удалить
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    <footer>
        <section class="foot_header">
            <article class="footer_nav_block">
                <h3>Соц. сети компании</h3>
                <article>
                    <a href="#">VKontakte</a>
                    <a href="#">Telegram</a>
                    <a href="#">YouTube</a>
                </article>
            </article>
            <article class="footer_nav_block">
                <h3>Документация</h3>
                <article>
                    <a href="#">Политика конфиденциальности</a>
                    <a href="#">Условия использования</a>
                </article>
            </article>
            <article class="footer_nav_block">
                <h3>Источники картинок</h3>
                <article>
                    <a href="#">картинка.ru</a>
                    <a href="#">бесплатныекартинкибезпокупки.com</a>
                    <a href="#">popularimages.kz</a>
                </article>
            </article>
            <article class="footer_nav_block">
                <h3>Внешние ссылки с подсказками</h3>
                <article>
                    <a href="#">Как авторизоваться на сайте</a>
                    <a href="#">Как работать в команде</a>
                    <a href="#">Компания projman</a>
                </article>
            </article>
        </section>
        <section class="foot_footer">
            <p>© 2024 PROJMAN. Все права защищены.</p>
        </section>
    </footer>
    <script src="assets/scripts/table_with_sotrudnicks.js"></script>
</body>

</html>