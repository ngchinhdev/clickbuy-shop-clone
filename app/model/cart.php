<?php
    class Cart{
        private $dbConnection;

        public function __construct() {
            include "db_connect.php";
            $this->dbConnection = $conn; 
        }

        public function isExistCart($user_id) {
            $sql = "SELECT cart_id from cart where user_id = :user_id";

            try {
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();

                return ($stmt->rowCount() > 0);
            } catch(PDOException $e){
                echo 'Failed: '.$e->getMessage();
            }
        }

        public function getCartId($user_id) {
            $sql = "SELECT cart_id FROM cart WHERE user_id = :user_id";
            try {
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['cart_id'];
            } catch (PDOException $e) {
                echo 'Failed: ' . $e->getMessage();
                die();
            }
        }

        public function isNoneItem($user_id) {
            $sql = "SELECT product_id from cart_item ci 
                    join cart c on ci.cart_id = c.cart_id where c.user_id = :user_id";

            try {
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    return false;
                } else {
                    return true;
                }
            } catch(PDOException $e) {
                echo 'Failed: '.$e->getMessage();
            }
        }

        public function addNewCart($user_id) {
            $sql = "INSERT INTO cart
                    VALUES(null, :user_id, now())
            ";

            try {
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
            } catch(PDOException $e) {
                echo 'Failed: '.$e->getMessage();
                exit();
            }
        }

        public function isExistItem($idProd, $idCart) {
            $sql = "SELECT product_id from cart_item
                    where product_id = :product_id and cart_id = :cart_id
            ";
            try {
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':product_id', $idProd);
                $stmt->bindParam(':cart_id', $idCart);
                $stmt->execute();
                if($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                throw new Exception('Item is existing: '.$e->getMessage());
            }
        }

        public function addItemToCart($id, $cartId) {
            $sql = "SELECT product_id from product
                    where product_id = :product_id
            ";

            try {
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':product_id', $id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                echo 'Failed: '.$e->getMessage();
                die(); 
            }

            if($row) {
                $insertTable = 'cart_item';
                $idProd = $row['product_id'];

                try {
                    $sqlInsert = "INSERT INTO $insertTable(cart_id, product_id, add_at)
                        VALUES(:cart_id, :product_id, now());
                    ";
                    $stmt = $this->dbConnection->prepare($sqlInsert);
                    $stmt->bindParam(':product_id', $idProd);
                    $stmt->bindParam(':cart_id', $cartId);
                    $stmt->execute();
                } catch(PDOException $e) {
                    echo 'Failed: '.$e->getMessage();
                    die();
                }
            }
        }

        public function displayCart($user_id) {
            $sql = "SELECT p.product_id, p.name, p.price, i.image_url, ci.quantity
                    from product p join (
                        select image_url, product_id, row_number() over
                        (partition by product_id order by product_id) row_num
                        from product_image
                    ) i on p.product_id = i.product_id and row_num = 2
                    join cart_item ci on ci.product_id = p.product_id
                    join cart c on c.cart_id = ci.cart_id
                    WHERE user_id = :user_id
                    order by add_at
                    asc;
            ";

            try {
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $row;
            } catch(PDOException $e) {
                echo "Failed: ".$e->getMessage();
                die();
            }
        }

        public function deleteProdInCart($prodId, $cartId) {
            $sql = "DELETE from cart_item 
                    where product_id = :prod_id and cart_id = :cart_id
            ";

            try {
                $stmt = $this->dbConnection->prepare($sql);
                $stmt->bindParam(':prod_id', $prodId);
                $stmt->bindParam(':cart_id', $cartId);
                $stmt->execute();
            } catch(PDOException $e) {
                echo 'Failed: '.$e->getMessage();
                exit;
            }
        }

        public function increaseQuantity($prodId, $cartId) {
            $sql = "SELECT quantity FROM cart_item WHERE product_id = :prodId and cart_id = :cart_id";
        
            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':prodId', $prodId);
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['quantity'] < 5) {
                    $newQuantity = ++$row['quantity'];
        
                    $updateSql = "UPDATE cart_item SET quantity = :newQuantity WHERE product_id = :prodId";
                    $updateStmt = $this->dbConnection->prepare($updateSql);
                    $updateStmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT);
                    $updateStmt->bindParam(':prodId', $prodId, PDO::PARAM_INT);
                    $updateStmt->execute();
        
                    return $newQuantity;
                }
            }
        }
        
        public function decreaseQuantity($prodId, $cartId) {
            $sql = "SELECT quantity from cart_item where product_id = :prodId and cart_id = :cart_id";

            $stmt = $this->dbConnection->prepare($sql);
            $stmt->bindParam(':prodId', $prodId);
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['quantity'] > 1) {
                    $newQuantity = --$row['quantity'];
    
                    $updateSql = "UPDATE cart_item set quantity = :newQuantity where product_id = :prodId";
                    $updateStmt = $this->dbConnection->prepare($updateSql);
                    $updateStmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT);
                    $updateStmt->bindParam(':prodId', $prodId, PDO::PARAM_INT);
                    $updateStmt->execute();
    
                    return $newQuantity;
                }
            }
        }
    }

?>