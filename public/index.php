<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

define("APP_PATH", __DIR__ . "/../");
require_once __DIR__ . '/../vendor/autoload.php';

// index.php:
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
if(file_exists(".env")) {
    $dotenv->load();
}
try {
    // Establish PDO connection
    $dsn = "mysql:host=" . getenv('DB_HOST') . ";port=" . getenv('DB_PORT') . ";dbname=" . getenv('DB_NAME');
    $pdo = new PDO($dsn, getenv('DB_USER'), getenv('DB_PASSWORD'));

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // For example, you can query a table:
    $stmt = $pdo->query('SELECT * FROM users');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Process each row
    }

    $pdo = null;
} catch (PDOException $e) {
    // Connection failed, handle the exception
    echo 'Connection failed: ' . $e->getMessage();
}




