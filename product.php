<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
include ("partials/head.php");
include ('partials/connect.php');
?>

<body class="animsition">
	
<?php include ("partials/header.php") ;?>

 

	<!-- Product -->
	<div class="bg0 m-t-100 p-b-140">
		<div class="container">


			<div class="row isotope-grid">
				
				<?php 
		
				$sql="SELECT * FROM products";
				$result=$connect->query($sql);

				while($final=$result->fetch_assoc()){?>


				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
<img src=" <?php echo 'admin/'.$final['picture'] ;?>" alt="IMG-PRODUCT" style="min-height:250pxx; max-height: 250px;">

							<a href="details.php?details_id= <?php echo $final['id'] ;?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="details.php?details_id= <?php echo $final['id'] ;?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo $final['name'] ;?>
								</a>

								<span class="stext-105 cl3">
								$ <?php echo  $final['price'] ;?>
								</span>
							</div>

 
						</div>
					</div>
				</div>
				<?php } ?>
			</div>

		</div>
	</div>
		
 <!-- footer -->

<?php 
include ("partials/footer.php");
?>

</body>

</html>