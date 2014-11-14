<?php

require_once(__DIR__.'/parametros.php');

try {
    $conn = new \PDO("{$driver}:host={$host};dbname={$dbName}", $dbUser, $dbPass);
} catch (\PDOException $ex) {
    die("Erro de conexão<br />Código: ".$ex->getCode()."<br />Mensagem: ".$ex->getMessage());
}