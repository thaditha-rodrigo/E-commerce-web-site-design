<?php session_start();
	if(!isset($_SESSION["admin_id"]))
	{
		header('location:Registration.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Vegetables</title>
	<link rel="stylesheet" href="IT21351440-CSS.css">
	<style>
		@media screen and (max-width: 1200px) {
			.column {
				width: 50%;
				display: block;
				margin-bottom: 20px;
			}
		}

		@media screen and (max-width: 600px) {
			.column {
				width: 100%;
				display: block;
				margin-bottom: 20px;
			}
		}		
		
		*, *:before, *:after {
		  box-sizing: inherit;
		}
		
		.hero-image{
			background-image: url("images/dairy-back.jpg");
		}
		
		.container1 {
			display: inline-flex;
		}
		
		.item_remove {
			width=30px; 
			height=30px;
			transition-duration: 0.5s;
			padding: 0;
		}
		
		.item_remove:hover {
			transform: rotate(-90deg) ;
		}
	</style>
</head>

<body class="hero-image">
	<div class="content" >
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="myAccountAdmin.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/admin.png">
				<p class="dropdown-content" style="margin-top: 30px;">Log-In/Sign-Up</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="vegetablesAdmin.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/vegetable.png">
				<p class="dropdown-content" style="margin-top: 30px;">Vegetables</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="fruitsAdmin.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/fruits.png">
				<p class="dropdown-content" style="margin-top: 30px;">fruits</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="fishAdmin.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/fish.png">
				<p class="dropdown-content" style="margin-top: 30px;">fish</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="meatAdmin.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/meat.png">
				<p class="dropdown-content" style="margin-top: 30px;">Meat</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="dairyAdmin.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/butter.png">
				<p class="dropdown-content" style="margin-top: 30px;">Dairy</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="groceryAdmin.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/grocery.png">
				<p class="dropdown-content" style="margin-top: 30px;">Grocery</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<form class="lgout dropdwn" action="logoutManager.php" method="post" >
					<input type="image" class="zoom" src="images/logout.png" name="logout" width="25px" height="25px"/>
					<p class="dropdown-content" style="margin-top: 30px;padding: 12px 8px;text-align: left;min-width: 70px;">Log-Out</p>
				</form>
	</div>
	<div class="after-menu">
		<?php
		
	function alert($message) {
     	echo "<script>alert('$message');
	 	window.location.href='vegetableAdmin.php'
	 	</script>";
	}
	
	 $con = mysqli_connect("localhost","root","","it21351440","3306");
	 
	 if(!$con) 
	 {
		die("Sorry!!! we are facing technical issue"); 
	 }
		
	 $sql = "SELECT * , `price` - (`price`*`discount`) AS disc_price FROM `product` WHERE `category` = 'vegetables';";
	 $result = mysqli_query($con,$sql);	

	if(isset($_POST["remove_btn"]))
	{
		  $id = $_POST["remove_id"];

		 $sql = "DELETE FROM `product` WHERE `pro_id` = '".$id."';";

		 if(mysqli_query($con,$sql))	
		 {
				alert('Successfully deleted the item');
		 }
		 else
		 { 
				alert('Opps !! Something is wrong , Please try again');

		 }
	}

	 if(mysqli_num_rows($result)>0)
	 {
		while($row = mysqli_fetch_assoc($result)) 
		{

	?>

	<div class="after-menu">
			<div class="column">
				<div class="card" onClick="location.href='itemEdit.php?id=<?php echo $row["pro_id"];?>'" >
					 <form action="#" method="post">
						  <img src="<?php echo $row["img_path"];?>" style="width:100%;height: 220px;">
						  <h1><?php echo $row["name"];?></h1>
					<?php 
						if ($row["discount"] != '0')
						{
					?>
						  <div class="container1">
						  	<p>Discount:<p><?php echo $row["discount"]*100;?>%</p> </p>
						  </div>
						  <p>Rs.<s style="color: red;font-colr:black;"><?php echo $row["price"];?></s></p>
					<?php
						}
						else
						{
					?>
						  <div class="container1" style="visibility: hidden;">
						  <p>Discount:<p><?php echo $row["discount"]*100;?>%</p> </p>
						  </div>
						  <p style="visibility: hidden;">Rs.<s style="color: red;font-colr:black;visibility:hidden;"><?php echo $row["price"];?></s></p>
							
					<?php
						}
					?>
							<p class="price">Rs.<?php echo round($row["disc_price"],2);?></p>
			
					</form>
					
					<div>
						<form class="item_remove" action="#" method="post" s>
							<input type="text" value="<?php echo $row["pro_id"];?>" name="remove_id" style="width:5px;height:5px;display: none">
							<button type="submit" name="remove_btn" style="padding:0; border:none;background-color: antiquewhite;margin-top:0;width:30px;height:30px;"><img src="images/delete.png" style="width:35px;height:35px;"></button>
						</form>
					</div>
		
				</div>
		</div>
	</div>
	<?php
			}
		 }		
		mysqli_close($con);		
	?>
</body>
</html>
