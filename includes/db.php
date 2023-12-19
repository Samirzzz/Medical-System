<?php
class Database {
    private static $instance;
    private $conn;

    private function __construct() {
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

}




