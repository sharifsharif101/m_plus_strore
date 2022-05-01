<?php 

include ('../partials/connect.php');
$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];

$duplicate=mysqli_query($connect,"select * from `customers` where username='$email' ");
if (mysqli_num_rows($duplicate)>0)
{
echo 'nooooooo';
die;
}

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