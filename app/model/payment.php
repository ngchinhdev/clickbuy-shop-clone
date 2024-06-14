<?php
    class Payment {
        private $dbConnection;

        public function __construct() {
            include "db_connect.php";
            $this->dbConnection = $conn;
        }

        public function addNewCustomer($userId, $name, $phone, $email, $adr, $note, $method) {
            try {
                $sql = "INSERT into order_info (user_id, customer_name, phone_num, email, address, note, payment_method)
                    values(:user_id, :customer_name, :phone_num, :email, :address, :note, :payment_method)
                ";

                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':user_id', $userId);
                $stmt->bindParam(':customer_name', $name);
                $stmt->bindParam(':phone_num', $phone);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':address', $adr);
                $stmt->bindParam(':note', $note);
                $stmt->bindParam(':payment_method', $method, PDO::PARAM_INT);
                $stmt->execute();
                return $this->dbConnection->lastInsertId();
                // if($stmt->execute()) {
                //     try {
                //         $sql = "SELECT order_id from order_info
                //                 where phone_num = :phone_num
                //                 order by order_date
                //                 asc
                //                 limit 1;
                //         ";

                //         $stmt = $this->dbConnection->prepare($sql);
                //         $stmt->bindParam(':phone_num', $phone); 
                //         $stmt->execute();
                //         $row = $stmt->fetch(PDO::FETCH_ASSOC);
                //         return $row['order_id'];
                //     } catch(PDOException $e) {
                //         echo 'Failed: '.$e->getMessage(); 
                //     }
                // }

            } catch(PDOException $e) {
                echo 'Failed: '.$e->getMessage();
            }
        }

        public function addNewOrtherDetail($product_id,	$order_id, $price, $quantity){
            try {
                $sql = "INSERT into order_detail (product_id, order_id, price, quantity)
                        values(:product_id, :order_id, :price, :quantity)
                ";

                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->bindParam(':order_id', $order_id);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':quantity', $quantity);
                $stmt->execute();
            } catch(PDOException $e) {
                echo 'Failed add new detail: '.$e->getMessage();
            }
        }
    }
?>