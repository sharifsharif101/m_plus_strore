<?php 

session_start();
include('../partials/connect.php');

$total=$_POST['total'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$payment=$_POST['payment'];

 

if(isset($_SESSION['customerid'])):  
	$customerid=$_SESSION['customerid'];

$sql = "INSERT INTO `orders`( `customer_id`, `address`, `phone`, `total`,`pay_method`) VALUES ('$customerid','$address','$phone','$total','$payment')";
$connect->query($sql);

endif; 

$sql2="SELECT id FROM orders order by id DESC LIMIT 1";
$result=$connect->query($sql2);
$final=$result->fetch_assoc();
$orderid=$final['id'];

foreach ($_SESSION['cart'] as $key => $value) {
	$proid=$value['item_id'];
	$quantity=$value['quantity'];

	$sql3="INSERT Into order_details(order_id,product_id,quantity) VAlUES('$orderid','$proid','$quantity')";
	$connect->query($sql3);

}
echo "<script> alert('ORDER IS PLACED');
window.location.href='../index.php';
</script>";

unset($_SESSION['cart']);

 








 






?>