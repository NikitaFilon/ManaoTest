<?php
session_start();

require __DIR__ . '/header.php';


if (isset($_COOKIE['session_id'])) {
    setcookie('session_id', '', time() - 3600, '/');
}


unset($_SESSION['user_id']);
unset($_SESSION['user_name']);

session_destroy();
?>
<script> location.replace("index.php"); </script>