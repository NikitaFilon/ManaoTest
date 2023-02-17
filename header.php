<!DOCTYPE html>
<html lang="ru">
<head>
    <script src="jquery.min.js"></script>
    <script src="script.js"></script>
    <meta content="text/html; charset=utf-8">
</head>
<?php
require_once 'SessionManager.php';

$sessionManager = new SessionManager();
if (isset($sessionManager)) :
    $name = $sessionManager->get('logged_user');
    echo "<h5>$name</h5>";
else :
    echo "<h5>Авторизуйтесь</h5>";
endif;
?>
<body>
