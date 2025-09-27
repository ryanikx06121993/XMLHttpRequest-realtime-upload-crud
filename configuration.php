<?php

declare(strict_types=1);

$host = "localhost";
$db   = "upload";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // throw exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,         // default fetch as object
    PDO::ATTR_EMULATE_PREPARES   => false                   // use native prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
     http_response_code(500);
    die("Database connection failed: " . $e->getMessage());
}
?>