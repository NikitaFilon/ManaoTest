<!DOCTYPE html>
<html lang="ru">
<head>
    <script src="jquery.min.js"></script>
    <script src="script.js"></script>
    <meta content="text/html; charset=utf-8">
</head>
<?php
if (isset($_COOKIE['session_id'])) {
    session_id($_COOKIE['session_id']);
    session_start();
}

if (isset($_SESSION['user_id'])) {
    ?><br>Hello, <?php echo $_SESSION['user_name']; ?></br>
        <a href="logout.php">Выйти</a><?php
} else {
    ?><a href="login.php">Авторизоваться</a><br>
    <a href="signup.php">Регистрация</a><?php
}

?>
<body>
<bod
</html>
