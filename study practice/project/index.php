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
    <article id="modalBackdrop" class="modal-backdrop"></article>

    <dialog id="registration" class="modal">
        <form id="registrationForm" action="register.php" method="post">
            <h2>Регистрация</h2>
            <article class="form_inputs">
                <input type="text" placeholder="Имя Фамилия" name="regNameSurname" maxlength="35" required>
                <input type="text" placeholder="Логин" name="regLogin" maxlength="25" required>
                <input type="password" placeholder="Пароль" name="regPassword" required>
                <input type="password" placeholder="Повторите пароль" name="regRepeatPassword" required>
            </article>
            <article id="checkboxReg">
                <input type="checkbox" name="isManager">
                <p>- стать руководителем проектов</p>
            </article>
            <button id="btn_reg" type="submit">Зарегистрироваться</button>
        </form>
        <button id="goAuth">Авторизоваться</button>
    </dialog>

    <dialog id="auth" class="modal">
        <form action="auth.php" method="post" id="authForm">
            <h2>Авторизация</h2>
            <article class="form_inputs">
                <input type="text" id="login" name="login" required>
                <input type="password" id="password" name="password" required>
            </article>
            <button id="btn_auth" type="submit">Войти</button>
        </form>
        <button id="goReg">Зарегистрироваться</button>
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
    <main>
        <section class="block_start_page">
            <article class="h1_main">
                <h1><b class="b_h1_main">УПРАВЛЕНИЕ</b> ПРОЕКТОМ</h1>
                <h1>— ЭТО <b class="b_h1_main">ПРОСТО</b></h1>
            </article>
            <p class="block_Start_page_p">
                Наш сервис упрощает управление проектами. Планируйте, организовывайте и контролируйте задачи легко и эффективно. Достигайте целей быстрее вместе с нами!
            </p>
            <a class="block_start_page_notbtn" href="#about_us">
                <img src="assets/images/arrows_main_block.svg" alt="">
                <p>Больше о нас</p>
                <img src="assets/images/arrows_main_block.svg" alt="">
            </a>
        </section>
        <section id="about_us">
            <h2>О нас</h2>
            <p>Мы стремимся сделать управление проектами легким и удобным. Наш сервис позволяет вам быстро и эффективно организовывать работу, повышая продуктивность и упрощая достижение целей. С нами управление проектами становится действительно простым!</p>
            <article class="cards_advantages">
                <article id="block_us_age">
                    <b class="bigTextCard">15</b>
                    <p>лет <br>успешной <br>работы</p>
                </article>
                <article id="block_us_sponsors">
                    <b class="bigTextCard">8</b>
                    <p>спонсоров, <br>финансирующих <br>деятельность компании</p>
                </article>
                <article id="block_us_activeUsers">
                    <b class="bigTextCard">90</b>
                    <p>в среднем активных <br>пользователей <br>каждый час</p>
                </article>
                <article id="block_us_cost">
                    <b class="bigTextCard">0</b>
                    <p>рублей стоимость<br> пользования нашим<br> сервисом</p>
                </article>
            </article>
            <button id="getStarted">Начать свой проект</button>
        </section>
        <section id="howtouse" class="how_use_service">
            <h2>Как пользоваться ресурсом?</h2>
            <article class="six_steps">
                <article class="step">
                    <article class="number_step" id="step1">1</article>
                    <article class="text_step">Регистрируете свой аккаунт и авторизуетесь под ним</article>
                </article>
                <article class="step">
                    <article class="number_step" id="step2">2</article>
                    <article class="text_step">Создаёте новый проект</article>
                </article>
                <article class="step">
                    <article class="number_step" id="step3">3</article>
                    <article class="text_step">Приглашаете участников проекта</article>
                </article>
                <article class="step">
                    <article class="number_step" id="step4">4</article>
                    <article class="text_step">Устанавливаете сроки выполнения, условия, а также задачи, к каждой из которых присваиваете отвечающего за нее</article>
                </article>
                <article class="step">
                    <article class="number_step" id="step5">5</article>
                    <article class="text_step">Наблюдаете за деятельностью своих коллег</article>
                </article>
                <article class="step">
                    <article class="number_step" id="step6">6</article>
                    <article class="text_step">По окончанию хорошо сданного проекта удаляете нынешний и создаете новый</article>
                </article>
            </article>
        </section>
        <section class="advantages_our_service" id="advantages">
            <h2>Преимущества пользования нашим сервисом</h2>
            <article class="cards_using_advantages">
                <article class="card_using">
                    <article>
                        <img src="assets/images/time.svg" alt="">
                        <p>Экономия времени</p>
                    </article>
                    <p>автоматизация рутинных задач</p>
                </article>
                <article class="card_using">
                    <article>
                        <img src="assets/images/graphick.svg" alt="">
                        <p>Прозрачность процессов</p>
                    </article>
                    <p>наглядные отчеты и диаграммы</p>
                </article>
                <article class="card_using">
                    <article>
                        <img src="assets/images/team_work.svg" alt="">
                        <p>Совместная работа</p>
                    </article>
                    <p>удобные инструменты <br> для командного взаимодействия</p>
                </article>
            </article>
            <button id="getStarted1">Воспользоваться шансом</button>
        </section>
        <section class="faq">
            <h2>Часто задаваемые вопросы (ЧаВО)</h2>
            <article class="faq_blocks">
                <article class="faq_block">
                    <article class="faq_quastion">
                        <p>Планируется ли платная подписка?</p>
                        <img src="assets/images/faq_arrow.svg" alt="">
                    </article>
                    <article class="faq_answer">
                        <p>В ближайшее время нет</p>
                    </article>
                </article>
                <article class="faq_block">
                    <article class="faq_quastion">
                        <p>Собираетесь с кем-то сотрудничать?</p>
                        <img src="assets/images/faq_arrow.svg" alt="">
                    </article>
                    <article class="faq_answer">
                        <p>В ближайшее время нет</p>
                    </article>
                </article>
                <article class="faq_block">
                    <article class="faq_quastion">
                        <p>Можно ли добавлять в проект более 50 участников?</p>
                        <img src="assets/images/faq_arrow.svg" alt="">
                    </article>
                    <article class="faq_answer">
                        <p>В ближайшее время нет</p>
                    </article>
                </article>
                <article class="faq_block">
                    <article class="faq_quastion">
                        <p>Почему в одном проекте может быть только 1 руководящий?</p>
                        <img src="assets/images/faq_arrow.svg" alt="">
                    </article>
                    <article class="faq_answer">
                        <p>В ближайшее время нет</p>
                    </article>
                </article>
                <article class="faq_block">
                    <article class="faq_quastion">
                        <p>Как попасть в команду разработчиков?</p>
                        <img src="assets/images/faq_arrow.svg" alt="">
                    </article>
                    <article class="faq_answer">
                        <p>В ближайшее время нет</p>
                    </article>
                </article>
                <article class="faq_block">
                    <article class="faq_quastion">
                        <p>Что планируете в будущем?</p>
                        <img src="assets/images/faq_arrow.svg" alt="">
                    </article>
                    <article class="faq_answer">
                        <p>В ближайшее время нет</p>
                    </article>
                </article>
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
    <script>
        let questions = document.querySelectorAll('.faq_quastion');

        questions.forEach(question => {
            question.addEventListener('click', () => {
                let answer = question.nextElementSibling;
                answer.classList.toggle('active');
            });
        });
    </script>
    <script src="assets/scripts/script.js"></script>
</body>
</html>