<?php
    function formatPrice($price) {
        return number_format($price, 0, ",", ",") . " ₫";    
    }
?>