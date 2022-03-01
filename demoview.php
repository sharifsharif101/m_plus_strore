<?php 
session_start();
if(empty($_SESSION['cart'])) {
    $_SESSION['cart']=array();
}
    array_push($_SESSION['cart'],$_GET['cart_id']);
?>
<p> Addition successful
    <a href="cartveiw.php">Click To View </a>
</p>