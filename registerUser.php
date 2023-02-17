<?php
require_once 'RegistrationController.php';
$registrationController = new RegistrationController();
$response = $registrationController->registerUser($_POST['name'], $_POST['login'], $_POST['password'], $_POST['email'], $_POST['confirmPassword']);
echo $response;
