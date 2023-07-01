<?php
define("APP_PATH", __DIR__ . "/../");
require_once __DIR__ . '/../vendor/autoload.php';
// index.php:
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
if (file_exists(".env")) {
    $dotenv->load();
}
$host = 'db'; // Docker service name for the database container
$port = $_ENV['DB_PORT'];
$dbName = $_ENV['MYSQL_DATABASE'];
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbName";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $row = $pdo->query('SELECT * FROM school.users');
    foreach($row as $ressult){
        echo $ressult['name'];
    }
    echo 'Connected to the database!';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}













