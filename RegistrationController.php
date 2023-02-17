<?php

require_once 'User.php';
require_once 'Json.php';
require_once 'Validate.php';

class RegistrationController {
private $db;
private $validate;

public function __construct() {
$this->db = new Json();
$this->validate = new Validate();
}

public function registerUser($name, $login, $password, $email, $confirmPassword) {
$user = new User($name, $login, $password, $email);
$errors = $this->validate->validateUser($user, $confirmPassword);

if (empty($errors)) {
$userData = array(
'name' => $user->getName(),
'email' => $user->getEmail(),
'login' => $user->getLogin(),
'salt' => $user->getSalt(),
'password' => md5($user->getSalt() . $user->getPassword())
);

$insert = $this->db->insert($userData);
return json_encode(array("message" => "Register Successfully "));
} else {
return json_encode(array("error" => $errors));
}
}
}
