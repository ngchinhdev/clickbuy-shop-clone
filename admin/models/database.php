<?php
    class DB_driver {
        private $conn;

        public function __construct() {
            $this->connect();
        }

        function connect() {
            if(!$this->conn) {
                $dbName = "clickbuy_project";
                $servername = "localhost";
                $username = "root";
                $password = "";

                try {
                    $this->conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
            }
        }

        function dis_connect() {
            if($this->conn) {
                $this->conn = null;
            }
        }

        public function execute_query($sql) {
            $this->connect();
    
            try {
                return $this->conn->exec($sql);
            } catch (PDOException $e) {
                echo "Error executing query: " . $e->getMessage();
                return false;
            }
        }
        
        public function get_row($sql) {
            $this->connect();

            try {
                $stmt = $this->conn->query($sql);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            } catch(PDOException $e) {
                echo "Failed: ".$e->getMessage();
                return false;
            }
        }

        public function get_rows($sql) {
            $this->connect();

            try {
                $stmt = $this->conn->query($sql);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch(PDOException $e) {
                echo "Failed: ".$e->getMessage();
                return false;
            }
        }

        public function insert($table, $data) {
            $this->connect();

            try {
                $columns = implode(', ', array_keys($data));
                $values = "'" . implode("', '", $data) . "'";
                $sql = "INSERT INTO $table ($columns) VALUES ($values)";
                $this->conn->exec($sql);

                return $this->conn->lastInsertId();
            } catch(PDOException $e) {
                echo "Error: ".$e->getMessage();
                return false;
            }
        }

        public function update($sql) {
            $this->connect();
            return $this->execute_query($sql);
        }
    
        public function delete($sql) {
            $this->connect();
            $this->execute_query($sql);
            return $this->conn->lastInsertId();
        }
    }
?>