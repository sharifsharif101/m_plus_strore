<!DOCTYPE html>
<html>

<?php 
    include ('adminpartials/session.php');
    include ('adminpartials/head.php');
?>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php 
include("adminpartials/header.php");
include ("adminpartials/aside.php");
?>
  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6"> 
      <form role="form" action="proupdatehandler.php" method="POST" enctype="multipart/form-data">
          <?php  

          $newid=$_GET['up_id'];
          echo  $newid;
          include ('../partials/connect.php');
          $sql ="SELECT * FROM products WHERE id='$newid' ";
          $result=$connect->query($sql);
          $final=$result->fetch_assoc();
          ?>
          <h1>Products</h1>
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter product name"
                  value="<?php echo $final['name'] ?>"
                  name="name">
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" placeholder="price"
                  value="<?php echo $final['price'] ?>"
                  name="price">
                </div>
                <div class="form-group">
                  <label for="picture">File input</label>
                  <input type="file" 
                  value="<?php echo $final['picture'] ?>"
                  id="picture" name="file">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                <textarea rows="10" placeholder="Enter Description" class="form-control" id="description" 
                value="<?php echo $final['description'] ?>"
                name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category"
                    value="<?php echo $final['category'] ?>">
                        <?php 
                        $cat ="SELECT * FROM categories";
                        $results=mysqli_query($connect,$cat);
                        while ($row = mysqli_fetch_assoc($results)){
                echo '<option value='.$row['id'].'>'.$row['name'] .'</option> ';
                        }
                        ?>
                    </select>
                    </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="form_id" 
                value="<?php echo $final['id'] ?>">
                <button name="update" type="submit" class="btn btn-primary">update</button>
              </div>
              
            </form>


            </div>
            <div class="col-sm-3"></div>
            </div>
    
    
        </section>



  </div>
  <!-- /.content-wrapper -->
  <?php 
  include ("adminpartials/footer.php");
  ?>
</body>
</html>
