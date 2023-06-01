<?php session_start ();
	if (!isset($_SESSION["admin_id"]))
	{
		header('location:Registration.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add to Cart</title>
	<link rel="stylesheet" href="IT21351440-CSS.css">
	<style>
		
		*, *:before, *:after {
		  box-sizing: inherit;
		}
		
		.hero-image{
			background-image: url("images/history.jpg");
			overflow-x: hidden;
		}
		
		.total {
			margin-top:4.5%;
			height: 100px;
			background-color: black;
			display: inline-flex;
			width:100%;
		}
		
		.form__button{
			margin-top:20px;
			color: green;
			width:200px;
			height:30px;
			font-color: green;
		}
		
		.form1{
			width:100%;
			height:100px;
			display: inline-flex;
		}
		
		.form2{
			margin-left: 0;
			display: inline-flex;
		}
		
		
		.container1 {
			width:90%;
			height:100px;
			margin-top: 30px;
			margin-left:5%;
			background-color: antiquewhite;
			display: inline-flex;
			border-radius: 8px;
			box-shadow: 0 0 8px black ;
			transition: 0.7s;
		}
		
		.other{
			margin-top:5%;
		}
		
		.container1 img {
			width:125px;
			height:100px;
			border-radius: 8px;
		}
		
		.btn {
		  background-color:antiquewhite; /* Blue background */
		  border: none; /* Remove borders */ 
		  color: black; /* White text */
		  padding: 12px 16px; /* Some padding */
		  font-size: 16px; /* Set a font size */
		  cursor: pointer; /* Mouse pointer on hover */
		}

		/* Darker background on mouse-over */
		.btn:hover {
		  transform: scale(1.1);
		}
		
		.cart_remove {
			position: absolute;
			width=30px; 
			height=30px;
			margin-top:35px;
			margin-left:80%;
			transition-duration: 0.5s;
			padding: 0;
		}
		
		.cart_remove:hover {
			transform: rotate(90deg) scale(1.5);
		}
		
		.total {
			margin-top:4.5%;
			height: 100px;
			background-color: black;
			display: inline-flex;
			width:100%;
		}
		
	</style>
	
</head>

<body class="hero-image">
	<div class="content" >
				<a href="myAccountAdmin.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/admin.png">
				<p class="dropdown-content" style="margin-top: 30px;">Account</p></a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Registration.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/log-in.png">
				<p class="dropdown-content" style="margin-top: 30px;">Log-In/Sign-Up</p></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="dropdwn"><img class="zoom" height="100%" width="100%" src="images/product.png"> 
					<div class="dropdown-content" style="margin-top: 30px;">
						<a href="Vegetables.php"> <img  height="25px" width="25px" src="images/vegetable.png"> &nbsp;&nbsp; Vegetables</a>
						<a href="Fruits.php"> <img  height="25px" width="25px" src="images/fruits.png"> &nbsp;&nbsp; Fruits</a>
						<a href="Meat.php"> <img  height="25px" width="25px" src="images/meat.png"> &nbsp;&nbsp; Meats</a>
						<a href="Fish.php"> <img  height="25px" width="25px" src="images/fish.png"> &nbsp;&nbsp; Fish</a>
						<a href="Grocery.php"> <img  height="25px" width="25px" src="images/grocery.png"> &nbsp;&nbsp; Grocery</a>
						<a href="Dairy.php"> <img  height="25px" width="25px" src="images/butter.png"> &nbsp;&nbsp; Diary Food</a>
					</div>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="Discount.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/discounts.png">
				<p class="dropdown-content" style="margin-top: 30px;">Discount</p>
				</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="Cart.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/shopping-cart.png">
				<p class="dropdown-content" style="margin-top: 30px;">Cart</p>
				</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="Wishlist.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/wishlist.png">
				<p class="dropdown-content" style="margin-top: 30px;">Wishlist</p>
				</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="Contact.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/telephone.png">
				<p class="dropdown-content" style="margin-top: 30px;">Contact</p>
				</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<form class="lgout dropdwn" action="logoutManager.php" method="post" >
					<input type="image" class="zoom" src="images/logout.png" name="logout" width="25px" height="25px"/>
					<p class="dropdown-content" style="margin-top: 30px;padding: 12px 8px;text-align: left;min-width: 70px;">Log-Out</p>
				</form>
	</div>
	<?php
	
		 $con = mysqli_connect("localhost","root","","it21351440","3306");

		 if(!$con) 
		 {
			die("Sorry!!! we are facing technical issue"); 
		 }

	?>
	<div class="total">
		<form action="#" method="post" class="form1"><button type=submit class="form__button" name="chk_cus">Check by Customer</button>&nbsp;&nbsp;&nbsp; <input type="text" name="customer" style="width: 250px;height: 40px;margin-top: 30px;" class="form__input" placeholder="Customer Username" /> &nbsp;&nbsp;&nbsp;<button type=submit class="form__button" name="chk_all" style="margin-left: 40%;background-color: lightslategray;" >Check All</button></form>  
	</div>
	<div class="other">
		<?php if(isset($_POST["chk_cus"]))
			  {
					$name = $_POST["customer"];
					
					$sql = "SELECT * FROM `purch_history` WHERE `cus_name` = '".$name."';";
						
			  }
			  if( (isset($_POST["chk_all"])) || (!isset($_POST["chk_cus"])) )
			  {
				  $sql = "SELECT * FROM `purch_history` ;";
			  }
		
			 $result = mysqli_query($con,$sql);	 

			 if(mysqli_num_rows($result)>0)
			 {
				while($row = mysqli_fetch_assoc($result)) 
				{
					 
		?>
		<div class="row">
			<div class="container1">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div >
					<table style="border: none;height: 100px;width:500px" >
						<tr height="40px"><td>Customer ID: <?php echo $row["cus_id"];?></td></tr>
						<tr height="40px"><td>Customer Name: <?php echo $row["cus_name"];?></td></tr>
					</table>
				</div>
				<div >
					<table style="border: none;height: 100px;width:500px" >
						<tr height="40px"><td>Item Count: <?php echo $row["item_count"];?></td></tr>
						<tr height="40px"><td>Total Price: <?php echo round($row["price"],2);?></td></tr>
					</table>
				</div>
				
				<div >
					<table style="border: none;height: 100px;width:500px" >
						<tr height="40px"><td>Date: <?php echo $row["date"];?></td></tr>
					</table>
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				
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