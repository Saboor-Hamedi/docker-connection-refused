<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>

<body>
    <h1>This is the home page</h1>
    <?php require_once __DIR__ . '/../core/helpers.php';  ?>
    <img src="<?= asset('images/image-1.jpg') ?> " alt="">
    <?php
    require_once __DIR__ . '/../core/Database.php';

    $host = 'db'; // Docker service name for the database container
    $port = $_ENV['DB_PORT'];
    $dbName = $_ENV['MYSQL_DATABASE'];
    $username = $_ENV['MYSQL_USER'];
    $password = $_ENV['MYSQL_PASSWORD'];

    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$dbName";
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $rows = $pdo->query('SELECT * FROM school.users');
        foreach ($rows as $row) {
            echo $row['name'];
        }
        echo 'Connected to the database!';
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
</body>

</html>