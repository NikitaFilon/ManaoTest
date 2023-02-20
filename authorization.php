<?php
require_once 'Json.php';
session_start();
$db = new Json();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $errors = array();
    $user = $db->getSingle($_POST['login']);

    if ($user) {
        if ($user = $db->checkPassword(($_POST['login']), $_POST['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $session_id = session_id();
            setcookie('session_id', $session_id, time() + 3600, '/');
            ?>
            <script> location.replace("index.php");  </script>
            <?php
        } else {

            $errors[] = 'Пароль неверно введен!';

        }

    } else {
        $errors[] = 'Пользователь с таким логином не найден!';
    }

    if (!empty($errors)) {

        echo json_encode(array("error" => $errors));

    }

}