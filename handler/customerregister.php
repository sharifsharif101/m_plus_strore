<?php 
include ("../partials/head.php") ;
include ('../partials/connect.php');
 
error_reporting(0);
ini_set('display_errors', 0);

$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];

$duplicate=mysqli_query($connect,"select * from `customers` where username='$email'");
if (strlen($password) < 5) {
  echo '
 
<script type="text/javascript">

$(document).ready(function(){

  swal({
    position: "top-end",
    icon: "error",
    title: "Password too short! _ must be more than 5 character",
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
 
  die;
}
if (!preg_match("#[0-9]+#", $password)) {
  echo '
 
<script type="text/javascript">

$(document).ready(function(){

  swal({
    position: "top-end",
    icon: "error",
    title: "Password must include at least one number! ",
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
 
  die;
}
if (!preg_match("#[a-zA-Z]+#", $password)) {
 
  echo '<script type="text/javascript">

  $(document).ready(function(){
  
    swal({
      position: "top-end",
      icon: "error",
      title: "Password must include at least one letter!",
      showConfirmButton: false,
      closeOnClickOutside: false,
      closeOnEsc: false,
      
    }).then(function() {
      window.location = "../customerforms.php";
  });
    
  });
  
  </script>';
  die;
}     


if (mysqli_num_rows($duplicate)>0){
echo '
 
<script type="text/javascript">

$(document).ready(function(){

  swal({
    position: "top-end",
    icon: "error",
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

    echo '
 
    <script type="text/javascript">
    
    $(document).ready(function(){
    
      swal({
        position: "top-end",
        icon: "success",
        title: "You Are Registered ",
        showConfirmButton: false,
        closeOnClickOutside: false,
        closeOnEsc: false
        
      }).then(function() {
        window.location = "../index.php";
    });
      
    });
    
    </script>
     
     ';
     

}else{
    echo '
    <script type="text/javascript">

    $(document).ready(function(){
    
      swal({
        position: "top-end",
        icon: "error",
        title: "password DidNot Match",
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
    die;
}
