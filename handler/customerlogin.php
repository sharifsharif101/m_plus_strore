<?php 
session_start();

if (isset($_POST['login'])){
    include ('../partials/connect.php');
    $email=$_POST['email'];
    $password=$_POST['password'];

    # the three step 1* the query 2*

    $sql = "SELECT * FROM customers WHERE username='$email' AND 
    password='$password'";

    $result = $connect->query($sql);
    
    $final= $result->fetch_assoc();
    
    $_SESSION['email']=$final['username'];
    $_SESSION['password']=$final['password'];
    $_SESSION['customerid']=$final['id'];

    if($email=$final['username'] AND $password=$final['password']){
        header('Location:../cart.php');
    }else{
      echo "<script>alert('Credentials are Wrong');
      window.location.href='../customerforms.php';</script>";
    }

    




}



?>
