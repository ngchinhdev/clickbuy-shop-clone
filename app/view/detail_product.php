<?php require_once "include/detail.php"; ?>
<?php require_once "include/sub_header.php"; ?>
<section id="product_wrap">
    <?php 
        if(isset($_GET['id']) && $_GET['id']) {
            $id = $_GET['id'];
            $_SESSION['prod_id'] = $id;
            render($id, $conn);
        } 
    ?>
</section>