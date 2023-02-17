<?php
require_once 'SessionManager.php';
require_once 'Redirector.php';

$sessionManager = new SessionManager();
$sessionManager->destroy();

$redirector = new Redirector('index.php');
$redirector->redirect('You have been logged out');
