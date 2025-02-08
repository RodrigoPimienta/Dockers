<?php
$connectionInfo = array(
    "host" => getenv("DB_POSTGRES_HOST"),
    "username" => getenv("DB_POSTGRES_USERNAME"),
    "password" => getenv("DB_POSTGRES_PASSWORD"),
    "database" => getenv("DB_POSTGRES_NAME"),
);

try {
    // conexiion a postgres
    $conn = new PDO("pgsql:host={$connectionInfo['host']};dbname={$connectionInfo['database']}", $connectionInfo['username'], $connectionInfo['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($conn);
} catch (PDOException $e) {
    echo $e->getMessage();
    echo false;
}
