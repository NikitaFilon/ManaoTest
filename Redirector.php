<?php
class Redirector
{
private $url;

public function __construct(string $url)
{
$this->url = $url;
}

public function redirect(string $message = null)
{
if ($message) {
$this->addMessageToUrl($message);
}

header("Location: {$this->url}");
exit();
}

private function addMessageToUrl(string $message)
{
$separator = '?';
if (parse_url($this->url, PHP_URL_QUERY)) {
$separator = '&';
}
$this->url .= "{$separator}message=" . urlencode($message);
}
}
