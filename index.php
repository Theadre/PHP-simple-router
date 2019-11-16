<?php
$redirect = $_SERVER['REQUEST_URI']; // You can also use $_SERVER['REDIRECT_URL'];

switch ($redirect) {
    case '/'  :
    case ''   :
        require __DIR__ . '/views/home.php';
        break;

    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    default:
        require __DIR__ . '/views/404.php';
        break;
}