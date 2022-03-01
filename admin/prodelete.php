<?php 
include('../partials/connect.php');
$newid=$_GET['del_id'];

$sql="DELETE FROM `products` WHERE id='$newid'";
if(mysqli_query($connect,$sql)){
    header('Location:productsshow.php');
}else{
    echo "Not Deleted";
}







?>