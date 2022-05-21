<?php 

include ('../partials/connect.php');

if (isset ($_POST['update'])){
    $newid=$_POST['form_id'];
    $newname=$_POST['name'];
    $newprice=$_POST['price'];
    $newdesc='';
    $newcat=$_POST['category'];

    
    $target= "uploads/";
    $file_path =$target.basename($_FILES['file']['name']);
    $file_name=$_FILES['file']['name'];
    $file_tmp=$_FILES['file']['tmp_name'];
    $file_store="uploads/".$file_name;

    

if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != "") {
    move_uploaded_file($file_tmp,$file_store);
}else{
// if image not upload this code will execute
$file_path = $_POST['hiddenImage'];
}

 


    
    $sql =  "UPDATE products SET 
    name= '$newname',
    price= '$newprice',
    description= '$newdesc',
    category_id= '$newcat',
    picture = '$file_path'
    WHERE id='$newid'
    ";
 
    if (mysqli_query($connect,$sql)) {
         header('Location:productsshow.php');
    }else{
        header('Location:adminindex.php');
    }

}
    

 



?>
<!-- --------------------------------------------------- -->
