<?php
namespace App\Core;
use PDO;
use PDOException;
class Database {
    private static $conn = null; 
    private $pdo;
    private $host = 'db';
    private $user = 'root';
    private $pass = '44';
    private $dbname = 'TechHaven_db';

    private function __construct() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
    }
    public static function connect() {
        if (self::$conn === null) {
            self::$conn = new self();
        }
        return self::$conn->pdo;
    }
}