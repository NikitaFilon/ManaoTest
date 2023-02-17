<?php
class SessionManager
{
private $sessionName;

public function __construct(string $sessionName = 'my_session')
{
$this->sessionName = $sessionName;
$this->startSession();
}

public function set(string $key, $value)
{
$_SESSION[$key] = $value;
}

public function get(string $key, $default = null)
{
return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
}

public function remove(string $key)
{
unset($_SESSION[$key]);
}

public function regenerate()
{
session_regenerate_id(true);
}

public function destroy()
{
session_destroy();
}

private function startSession()
{
if (session_status() == PHP_SESSION_NONE) {
session_name($this->sessionName);
session_start();
}
}
}
