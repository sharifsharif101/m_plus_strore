<?php 

include ('../partials/connect.php');
$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];

if ($password==$password2) {
    $sql="INSERT INTO `customers`(`username`, `password`) VALUES ('$email','$password')";

    $connect->query($sql);

    echo "<script>alert('You Are Registered');
    window.location.href='../customerforms.php';
    </script>";

}else{
    echo "<script>alert('password DidNot Match');
    window.location.href='../customerforms.php';
    </script>";
}

 




?>