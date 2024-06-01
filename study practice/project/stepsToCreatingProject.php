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

    <header>
        <a href="index.php" id="logo"><img src="assets/images/logo.svg" alt=""></a>
        <nav class="main_nav">
            <a href="#about_us">О нас</a>
            <a href="#howtouse">Как пользоваться ресурсом</a>
            <a href="#advantages">Преимущества</a>
        </nav>
        <button id="btn_goProject">Мой проект</button>
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
    <script src="assets/scripts/scriptsModalWindows.js"></script>
</body>

</html>