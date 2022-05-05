<?php 
include ("../partials/head.php") ;
include ('../partials/connect.php');
 
error_reporting(0);
ini_set('display_errors', 0);

$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];
// https://sweetalert2.github.io/
$duplicate=mysqli_query($connect,"select * from `customers` where username='$email' ");
if (mysqli_num_rows($duplicate)>0)
{
echo '
 
<script type="text/javascript">

$(document).ready(function(){

  swal({
    position: "top-end",
    icon: "warning",
    title: "You are allredy Registered ",
    showConfirmButton: false,
    closeOnClickOutside: false,
    closeOnEsc: false,
    showClass: {
        popup: "animate__animated animate__fadeInDown"
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp"
      }
    
  }).then(function() {
    window.location = "../customerforms.php";
});
  
});

</script>
 
 ';
 

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
 
include ("../partials/footer.php");



?>