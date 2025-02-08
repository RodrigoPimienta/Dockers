<?php
$connectionInfo = array(
    "host" => getenv("DB_MYSQL_HOST"),
    "port" => getenv("3306"),
    "username" => getenv("DB_MYSQL_USERNAME"),
    "password" => getenv("DB_MYSQL_PASSWORD"),
    "database" => getenv("DB_MYSQL_NAME"),
);

try {
    $conn = new PDO("mysql:host={$connectionInfo['host']};port={$connectionInfo['port']};dbname={$connectionInfo['database']}", $connectionInfo['username'], $connectionInfo['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($conn);
} catch (PDOException $e) {
    echo $e->getMessage();
    echo false;
}

?>