<?php 

 

if (empty($_SESSION['email'] AND $_SESSION['password'])) {
    echo "<script>alert('please Log in ');
    window.location.href='customerforms.php';
    </script>";
 }



?>