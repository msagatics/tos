<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];

$con = new mysqli(
    $host,
    $username,
    $password,
    $dbname
);

if ($con->connect_error) {
    die('Database connection failed: ' . $con->connect_error);
}

$con->set_charset('utf8mb4');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
