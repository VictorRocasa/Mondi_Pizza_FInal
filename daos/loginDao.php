<?php
require_once('../database/databaseAdm.php');

class admConect {

    private $conn;

    public function __construct() {
        $database = new DatabaseAdm();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
}
?>