<?php 

error_reporting(E_ALL ^ E_WARNING); 


if (empty($_SESSION['email'] AND $_SESSION['password'])) {
    echo "<script>alert('please Log in ');
    window.location.href='customerforms.php';
    </script>";
 }



?>