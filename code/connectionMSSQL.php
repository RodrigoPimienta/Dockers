<?php
$connectionInfo = array(
    "host" => getenv("DB_MSSQL_HOST"),
    "username" => getenv("DB_MSSQL_USERNAME"),
    "password" => getenv("DB_MSSQL_PASSWORD"),
    "database" => getenv("DB_MSSQL_NAME"),
);

try {
    $conn = new PDO("sqlsrv:Server=" . $connectionInfo['host'] . ";Database=" . $connectionInfo['database'], $connectionInfo['username'], $connectionInfo['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($conn);
} catch (PDOException $e) {
    echo $e->getMessage();
    echo false;
}
