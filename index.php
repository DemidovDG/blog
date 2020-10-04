<?php
// index.php

// загружаем и инициализируем глобальные библиотеки
// включение бизнес-логики
require_once 'model.php';
require_once 'controllers.php';



// внутренняя маршрутизация
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ('/index.php' === $uri) {
    list_action();
} elseif ('/index.php/show' === $uri && isset($_GET['id'])) {
    show_action($_GET['id']);
} else {
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}