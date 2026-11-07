<?php
require_once __DIR__ . '/config.php';

try {
    if (DB_HOST === '' || DB_NAME === '' || DB_USER === '' || getenv('DB_PASS') === false) {
        throw new RuntimeException('MySQL configuration is missing.');
    }
    if (!ctype_digit(DB_PORT) || (int) DB_PORT < 1 || (int) DB_PORT > 65535
        || preg_match('/[;\\x00-\\x1f]/', DB_HOST . DB_NAME)) {
        throw new RuntimeException('MySQL configuration is invalid.');
    }
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT
        . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_TIMEOUT           => 5,
    ];
    
    $sslCa = getenv('DB_SSL_CA');
    if ($sslCa !== false && $sslCa !== '') {
        $options[PDO::MYSQL_ATTR_SSL_CA] = $sslCa;
        $options[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT] = true;
    }
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    
} catch (PDOException | RuntimeException $e) {
    http_response_code(503);
    $message = 'База данных временно недоступна. Пожалуйста, попробуйте позже.';
    // Не раскрываем адрес сервера, имя пользователя или другие данные подключения.
    if (basename($_SERVER['SCRIPT_NAME'] ?? '') === 'api.php') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'message' => $message], JSON_UNESCAPED_UNICODE);
    } else {
        header('Content-Type: text/html; charset=utf-8');
        echo '<h1>Сервис временно недоступен</h1><p>' . $message . '</p>';
    }
    exit;
}