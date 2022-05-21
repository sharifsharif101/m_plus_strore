<?php 
session_start();
include ("../partials/head.php") ;

error_reporting(0);
ini_set('display_errors', 0);

if (isset($_POST['login'])){
    include ('../partials/connect.php');
    $email=$_POST['email'];
    $password=$_POST['password'];

  

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
      echo  '
      <script type="text/javascript">

$(document).ready(function(){

  swal({
    position: "top-end",
    icon: "error",
    title: "Credentials are Wrong",
    showConfirmButton: false,
    closeOnClickOutside: false,
    closeOnEsc: false
    
  }).then(function() {
    window.location = "../customerforms.php";
});
  
});

</script>
 ';

    }

if (empty($_SESSION['email'] AND $_SESSION['password'])) {
      echo '
      
 <script type="text/javascript">

 $(document).ready(function(){
 
   swal({
     position: "top-end",
     icon: "error",
     title: "please Login ",
     showConfirmButton: false,
     closeOnClickOutside: false,
     closeOnEsc: false
     
   }).then(function() {
     window.location = "../customerforms.php";
 });
   
 });
 
 </script>
      
      ';
    }
    
     

    




}



?>
