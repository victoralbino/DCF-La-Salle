<?php

define('DIR_APP', __DIR__ . "\\app\\");
define('DIR_PUBLIC', __DIR__ . '\\public\\');
define('DIR_DATABASE', __DIR__ . '\\Database\\');

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

require_once __DIR__.'/route/index.php';