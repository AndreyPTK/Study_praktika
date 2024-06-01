<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $sqlManager = "SELECT * FROM projectmanager WHERE login='$login'";
        $resultManager = $conn->query($sqlManager);
        if ($resultManager->num_rows > 0) {
            $rowManager = $resultManager->fetch_assoc();
            if (password_verify($password, $rowManager['password'])) {
                $_SESSION['manager_id'] = $rowManager['id'];
                $_SESSION['login'] = $rowManager['login'];
                $_SESSION['user_role'] = 'manager';

                $manager_id = $rowManager['id'];
                $sqlProject = "SELECT * FROM project WHERE numberManager='$manager_id'";
                $resultProject = $conn->query($sqlProject);
                if ($resultProject->num_rows > 0) {
                    $project = $resultProject->fetch_assoc();
                    $_SESSION['project_id'] = $project['id'];
                    header('Location: workOnThePlan.php');
                } else {
                    header('Location: create_project.php');
                }
                exit();
            }
        }

        $sqlMember = "SELECT * FROM memberproject WHERE login='$login'";
        $resultMember = $conn->query($sqlMember);
        if ($resultMember->num_rows > 0) {
            $rowMember = $resultMember->fetch_assoc();
            if (password_verify($password, $rowMember['password'])) {
                $_SESSION['member_id'] = $rowMember['id'];
                $_SESSION['login'] = $rowMember['login'];
                $_SESSION['user_role'] = 'member';

                $member_id = $rowMember['id'];
                $sqlProject = "SELECT * FROM project WHERE id=(SELECT numberProject FROM memberproject WHERE id='$member_id')";
                $resultProject = $conn->query($sqlProject);
                if ($resultProject->num_rows > 0) {
                    $project = $resultProject->fetch_assoc();
                    $_SESSION['project_id'] = $project['id'];
                    header('Location: table_with_sotrudnicks.php');
                } else {
                    header('Location: join_project.php');
                }
                exit();
            }
        }

        if (isset($_POST['is_new_member']) && $_POST['is_new_member'] == 'yes') {
            $fio = $_POST['fio'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sqlInsertMember = "INSERT INTO memberproject (login, FIO, password) VALUES ('$login', '$fio', '$hashed_password')";
            if ($conn->query($sqlInsertMember) === TRUE) {
                $_SESSION['member_id'] = $conn->insert_id;
                $_SESSION['login'] = $login;
                $_SESSION['user_role'] = 'member';
                header('Location: table_with_sotrudnicks.php');
                exit();
            } else {
                echo "Ошибка при добавлении нового участника: " . $conn->error;
            }
        }

        echo "Неверные логин или пароль.";
    } else {
        echo "Пожалуйста, введите логин и пароль.";
    }
} else {
    echo "Некорректный запрос.";
}
?>
