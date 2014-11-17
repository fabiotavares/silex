<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 17/11/14
 * Time: 11:26
 */

namespace FT\Sistema\Database;

abstract class Conexao
{
    private static $host = 'localhost';
    private static $dbName = "php_silex";
    private static $user = "root";
    private static $password = "root";
    private static $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
    private static $pdo;

    public static function getDb()
    {
        if(isset(self::$pdo)) {
            return self::$pdo;
        } else {
            try {
                self::$pdo = new \PDO('mysql:host='.self::$host.';dbname='.self::$dbName, self::$user, self::$password, self::$options);
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                return self::$pdo;
            } catch (\PDOException $e) {
                echo "ERROR: Unable to connect to database";
                die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br> File: {$e->getFile()} <br> line: {$e->getLine()}");
            }
        }
    }

    public static function getConection()
    {
        try {
            $conection = new \PDO('mysql:host='.self::$host, self::$user, self::$password, self::$options);
            $conection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conection;
        } catch (\PDOException $e) {
            echo "ERROR: Unable to connect to database";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br> File: {$e->getFile()} <br> line: {$e->getLine()}");
        }
    }
} 