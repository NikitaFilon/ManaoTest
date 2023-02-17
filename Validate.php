<?php

require_once 'Json.php';

class Validate
{

    function validateUser($user)
    {
        $db = new Json();
        $errors = array();

        if (trim($user->getLogin()) == '') {
            $errors[] = "Enter login!";
        }

        if (!preg_match("/^[a-zA-Z0-9]+$/", $user->getPassword())) {
            $errors[] = "The password must contain only letters and numbers";
        }


        if (trim($user->getEmail()) == '') {
            $errors[] = "Enter Email";
        }

        if (trim($user->getName()) == '') {
            $errors[] = "Enter Name";
        }

        if ($user->getPassword() == '') {
            $errors[] = "Enter password";
        }

        if ($user->getPassword() != $_POST['confirmPassword']) {
            $errors[] = "The repeated password was entered incorrectly!";
        }

        if (strlen($user->getLogin()) < 5) {
            $errors[] = "Invalid login length";
        }

        if (strlen($user->getName()) == 1) {
            $errors[] = "Invalid name length";
        }

        if (!preg_match("/^[a-zA-Z]+$/", $user->getName())) {
            $errors[] = 'Invalid login(only letter)';
        }

        if (strlen($user->getPassword()) < 5) {
            $errors[] = "Invalid password( min 6 letter)";
        }

        if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email address';
        }


        if ($db->checkLogin($user)) {
            $errors[] = "A user.json with this name exists!";
        }

        if ($db->checkEmail($user)) {
            $errors[] = "A user.json with this email exists!";
        }

        return $errors;

    }
}