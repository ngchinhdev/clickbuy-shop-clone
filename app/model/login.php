<?php
    class Login {
        private $dbConnection;

        public function __construct(){
            include "db_connect.php";
            $this->dbConnection = $conn;
        }

        public function adminLogin($phoneNum, $password) {
            try {
                $sql = "SELECT user_id, phone_num from user 
                        where phone_num = :phone_num and password = :password and role_id = 1
                ";
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindValue(':phone_num', $phoneNum);
                $stmt->bindValue(':password', $password);
                $stmt->execute();

                if($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo "Failed: " . $e->getMessage();
            }
        }

        public function userLogin($phoneNum, $password) {
            try {
                $sql = "SELECT user_id, phone_num from user 
                        where phone_num = :phone_num and password = :password and role_id = 2
                ";
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindValue(':phone_num', $phoneNum);
                $stmt->bindValue(':password', $password);
                $stmt->execute();

                if($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $user_id = $row['user_id'];
                    setcookie('user_id', $user_id, time() + 84600, "/");
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo "Failed: " . $e->getMessage();
            }
        }

        public function userRegister($name, $phoneNum, $password) {
            try {
                $sql = "SELECT phone_num from user where :phone_num = phone_num and status = 0";
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindValue(':phone_num', $phoneNum);
                $stmt->execute();

                if($stmt->rowCount() > 0) {
                    return false;
                } else {
                    $sql = "INSERT into user(name, phone_num, password)
                            values(:name, :phone_num, :password)
                    ";
                    $stmt = $this->dbConnection->prepare($sql);
                    $stmt->bindValue(':name', $name);
                    $stmt->bindValue(':phone_num', $phoneNum);
                    $stmt->bindValue(':password', $password);
                    $stmt->execute();
                    return true;
                }
            } catch(PDOException $e) {
                echo "Failed: " . $e->getMessage();
            }
        }

        public function userLogout(){
            setcookie('user_id', "", time() - 3600, "/");
            header("Location: index.php");
        }

        public function getInfomation($userId) {
            $sql = "SELECT picture, name, phone_num, email, password, address
                    from user where user_id = :userId";

            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
            
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
    }
?>