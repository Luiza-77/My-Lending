<?php
// Данные подключения задаются через Replit Secrets, а не в исходном коде.
define('DB_HOST', getenv('DB_HOST') ?: '');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: '');
define('DB_USER', getenv('DB_USER') ?: '');
define('DB_PASS', getenv('DB_PASS') === false ? '' : getenv('DB_PASS'));
define('DB_CHARSET', 'utf8mb4');

date_default_timezone_set('Asia/Yakutsk');
error_reporting(E_ALL);
ini_set('display_errors', '0');