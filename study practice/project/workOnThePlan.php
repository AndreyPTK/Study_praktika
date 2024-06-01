<?php
require_once('db.php');
session_start();

if (!isset($_SESSION['manager_id']) && !isset($_SESSION['member_id'])) {
    echo "Пользователь не авторизован";
    exit();
}

$projectId = $_SESSION['project_id'];
$userRole = $_SESSION['user_role'];

if ($userRole == 'manager') {
    $userId = $_SESSION['manager_id'];
    $sqlUser = "SELECT FIO, login FROM projectmanager WHERE id='$userId'";
} else {
    $userId = $_SESSION['member_id'];
    $sqlUser = "SELECT FIO, login FROM memberproject WHERE id='$userId'";
}

$resultUser = $conn->query($sqlUser);
$user = $resultUser->fetch_assoc();

$sqlProject = "SELECT nameProject FROM project WHERE id='$projectId'";
$resultProject = $conn->query($sqlProject);
$project = $resultProject->fetch_assoc();

$sqlTarget = "SELECT targetName FROM targetproject WHERE numberProjectForTarget='$projectId'";
$resultTarget = $conn->query($sqlTarget);
$target = $resultTarget->fetch_assoc();

$sqlTasks = "SELECT taskName, ProjectDeadline, FIO, login FROM tasksproject
            JOIN memberproject ON tasksproject.numberPersonWhichCharge = memberproject.id
            WHERE numberTarget IN (SELECT id FROM targetproject WHERE numberProjectForTarget='$projectId')";
$resultTasks = $conn->query($sqlTasks);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJMAN</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>

<body>
    <header>
        <a href="index.php" id="logo"><img src="assets/images/logo.svg" alt=""></a>
        <nav class="main_nav">
            <a href="#">Сделать пожертвование</a>
            <a href="#">Подробнее о сервисе</a>
        </nav>
        <button id="soon-button">Приобрести полную версию <img src="assets/images/lock.svg" alt="Lock"></button>
    </header>
    <main id="main_other_page">
        <section class="work_on_project">
            <button id="work_on_plan" style="background-color: #129A3F; color: white;">Работа над планом</button>
            <button id="list_participants" style="background-color: rgb(18, 154, 63, 50%);" onclick="window.location.href = 'table_with_sotrudnicks.php';">Список участников</button>
        </section>
        <section class="projectManagement">
            <article class="header_projman">
                <article class="user">
                    <img src="assets/images/user.svg" alt="User">
                    <article class="userInfo">
                        <h4><?php echo $user['FIO']; ?></h4>
                        <p><?php echo $user['login']; ?></p>
                    </article>
                </article>
                <article class="projectAbout">
                    <article class="projectNameText">
                        <h4>Проект</h4>
                        <p><?php echo $project['nameProject']; ?></p>
                    </article>
                    <article class="targetNameProject">
                        <h4>Цель</h4>
                        <p><?php echo $target['targetName']; ?></p>
                    </article>
                </article>
            </article>
            <article class="footer_projman">
                <article class="marks">
                    <p>Пометки для себя</p>
                    <textarea name="" id="textarea_otherblock" placeholder="Введите небольшой текст / описание для команды" cols="80" rows="27"></textarea>
                </article>
                <article class="task-table">
                    <table class="table_vtoraya">
                        <thead>
                            <tr>
                                <th class="th_inTable">название задачи</th>
                                <th class="th_inTable">срок выполнения</th>
                                <th class="th_inTable">кем выполняется</th>
                            </tr>
                        </thead>
                        <tbody id="taskTableBody">
                            <?php while ($task = $resultTasks->fetch_assoc()) : ?>
                                <tr>
                                    <td class="td_inTable"><?php echo $task['taskName']; ?></td>
                                    <td class="td_inTable"><?php echo $task['ProjectDeadline']; ?></td>
                                    <td class="td_inTable">
                                        <?php echo $task['FIO']; ?><br>
                                        <?php echo $task['login']; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            <?php if ($userRole == 'manager') : ?>
                                <tr id="newTaskRow">
                                    <td class="td_inTable"><input type="text" placeholder="Название задачи" id="inptexttask"></td>
                                    <td class="td_inTable"><input type="date" id="intdatetask"></td>
                                    <td class="td_inTable">
                                        <select class="selectOnPage" id="taskAssignee">
                                            <option value="">Выберите</option>
                                            <?php
                                            $sqlMembers = "SELECT id, FIO FROM memberproject WHERE numberProject='$projectId'";
                                            $resultMembers = $conn->query($sqlMembers);
                                            while ($member = $resultMembers->fetch_assoc()) {
                                                echo "<option value='" . $member['id'] . "'>" . $member['FIO'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if ($userRole == 'manager') : ?>
                        <button id="addTaskButton">Добавить задачу</button>
                    <?php endif; ?>
                </article>
            </article>
        </section>
    </main>
    <footer>
        <section class="footer_section">
            <a href="main.html" class="footer_links">Вернуться на главную</a>
            <a href="main.html" class="footer_links">Политика конфиденциальности</a>
        </section>
    </footer>
</body>
<script>
    document.getElementById('addTaskButton').addEventListener('click', function() {
        const taskName = document.getElementById('inptexttask').value;
        const taskDeadline = document.getElementById('intdatetask').value;
        const taskAssignee = document.getElementById('taskAssignee').value;

        if (taskName && taskDeadline && taskAssignee) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'add_task.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    location.reload();
                }
            };
            xhr.send(`taskName=${taskName}&taskDeadline=${taskDeadline}&taskAssignee=${taskAssignee}&projectId=<?php echo $projectId; ?>`);
        } else {
            alert('Заполните все поля');
        }
    });
</script>

</html>