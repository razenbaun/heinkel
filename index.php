<?php
header('Content-Type: text/plain; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);

error_log("Requested path: " . $path);

switch ($path) {
    case '/all_holidays.php':
    case '/all_holidays':
        include 'all_holidays.php';
        break;
    case '/':
    case '/index.php':
    case '/main.php':
    default:
        include 'main.php';
        break;
}
?>