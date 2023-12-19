<?php
class Database {
    public static $instance;
    public $conn;

    public function __construct() {
        $db_server = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'tabibi2';

        $this->conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

        if (!$this->conn) {
            die("Couldn't connect to the database: " . mysqli_connect_error());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    // You may add other methods for interacting with the database if needed
}

// Usage:
$database = Database::getInstance();
$conn = $database->getConnection();

// Now, use $conn to perform your database operations
