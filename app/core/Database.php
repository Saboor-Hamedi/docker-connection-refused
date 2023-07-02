<?php
namespace App\core;
use PDO;
use PDOException;
class Database
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
        try {
            // Establish PDO connection
            $dsn = "mysql:host=" . $_ENV['DB_HOST'] . ";port=" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['MYSQL_DATABASE'];
            $this->pdo = new PDO($dsn, $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Connection failed, handle the exception
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function query($sql)
    {
        return $this->pdo->query($sql);
    }

    public function closeConnection()
    {
        $this->pdo = null;
    }
}

