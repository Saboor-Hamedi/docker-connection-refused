<?php
use App\core\Database;
require_once __DIR__ . '/../vendor/autoload.php';

// Get an instance of the Database class
$db = Database::getInstance();

// For example, you can query a table:
$stmt = $db->query('SELECT * FROM users');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['username'];
}

// Close the database connection
$db->closeConnection();



