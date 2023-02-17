<?php

require_once 'SessionManager.php';

class HomePage
{
    public function render()
    {
        $this->renderHeader();
        $this->renderContent();
    }

    private function renderHeader()
    {
        require __DIR__ . '/header.php';
    }

    private function renderContent()
    {
        echo <<<HTML
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <h1>Добро пожаловать на наш сайт!</h1>
                </div>
            </div>
        </div>
        HTML;

        if ($this->isLoggedIn()) {
            $loggedUser = $this->getLoggedUser();
            echo "Hello, $loggedUser<br>";
            echo '<a href="logout.php">Выйти</a>';
        } else {
            echo '<a href="login.php">Авторизоваться</a><br>';
            echo '<a href="signup.php">Регистрация</a>';
        }
    }

    private function isLoggedIn()
    {
        return isset($_SESSION['logged_user']);
    }

    private function getLoggedUser()
    {
        return $_SESSION['logged_user'];
    }
}


$homePage = new HomePage();
$homePage->render();
