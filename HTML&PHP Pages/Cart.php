<?php session_start ();
	if ( (!isset($_SESSION["username"])) && (!isset($_SESSION["admin_id"])))
	{
		header ('location:Registration.php');
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
			background-image: url("images/vegetable-back2.jpg");
			overflow-x: hidden;
		}
		
		.total {
			margin-top:4.5%;
			height: 100px;
			background-color: black;
			display: inline-flex;
			width:100%;
		}
		
		.total p {
			color: aliceblue;
			font-size: 40px;
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
			margin-top:2%;
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
		
	</style>
	
</head>

<body class="hero-image">
	<div class="content" >
<?php if(isset($_SESSION["username"]))
		{
?>
				<a href="myAccount.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/user-account.png">
				<p class="dropdown-content" style="margin-top: 30px;">Account</p></a>
<?php
		}
?>
<?php if(isset($_SESSION["admin_id"]))
		{
?>
				<a href="myAccountAdmin.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/admin.png">
				<p class="dropdown-content" style="margin-top: 30px;">Account</p></a>
<?php
		}
?>
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
	
		 $con2 = mysqli_connect("localhost","root","","it21351440","3306");

		 if(!$con2) 
		 {
			die("Sorry!!! we are facing technical issue"); 
		 }
			
		 $total='0.00';
		 $count='0';
	
		 $sql2 = "SELECT SUM((`price`*`quantity`)) AS Total , COUNT(`cart_id`) AS Count FROM `cart` WHERE `cus_id` = ".$_SESSION["cus_id"];

		$result2 = mysqli_query($con2,$sql2);

		$row2 = mysqli_fetch_assoc($result2);
	
		$total=$row2["Total"];
		$count=$row2["Count"];
		
		 if(isset($_POST["total&count"]))
		 {
			 
			  
			 
			  $total=$row2["Total"];
			  $count=$row2["Count"];
		 }
	
		 if(isset($_POST["total&count"]))
		 {
			 
			  $sql2 = "SELECT SUM((`price`*`quantity`)) AS Total , COUNT(`cart_id`) AS Count FROM `cart` WHERE `cus_id` = ".$_SESSION["cus_id"];
			 
			  $total=$row2["Total"];
			  $count=$row2["Count"];
		 }
		
	?>
	<div class="total">
		<form action="#" method="post" class="form1"><button type=submit class="form__button" name="total&count">Check</button>&nbsp;&nbsp;&nbsp; <p style="margin-left: 60px">Item Count: <p style="color:green;"><?php echo $count;?></p> &nbsp;&nbsp;&nbsp; <p style="margin-left: 20px">Total: <p style="color:green;" >Rs.<?php echo round($total,2);?></p><p></form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<form action="cartManager.php" method="post"><button type=submit class="form__button" name="empty" style="margin-left: -10%;background-color: lightslategray;" >Empty Cart</button></form>  
		
	</div>
	<div class="other">
		<?php
	
			 $sql = "SELECT * FROM `cart` WHERE `cus_id` = ".$_SESSION["cus_id"];
		
			 $result = mysqli_query($con,$sql);	 

			 if(mysqli_num_rows($result)>0)
			 {
				while($row = mysqli_fetch_assoc($result)) 
				{
					 $sql3 = "SELECT `img_path` FROM `product` WHERE `pro_id`= '".$row["pro_id"]."';";
					
					 $result3 = mysqli_query($con,$sql3);	
					
					 $row3=mysqli_fetch_assoc($result3)

		?>
		<div class="row">
			<div class="container1">
				<img src="<?php echo $row3["img_path"];?>"> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<div >
					<table style="border: none;height: 100px;width:500px" >
						<tr height="40px"><td><?php echo $row["name"];?></td></tr>
						<tr height="40px"><td><?php echo round($row["price"],2);?></td></tr>
					</table>
				</div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<form class="form2" action="cartManager.php" method="post">
					<div class="form__input-group" style="width: 100px;height: 50px;margin-top: 25px;margin-left: 0;">
						<input type="text" class="form__input" autofocus placeholder="quantity" name="quantity" value="<?php echo $row["quantity"];?>">
					</div>
					&nbsp;&nbsp;&nbsp;
					<div class="form__input-group" style="width: 50px;height: 50px;margin-top: 25px;">
						<button style="width:30px;height:15px;margin-top: 0;margin-left:5%;" class="form__button" name ="quantity_btn" type="submit">OK</button>
					</div>
					<input type="text" value="<?php echo $row["cart_id"];?>" name="quantity_id" style="width:5px;height:5px;display: none">
				</form>
				
				<form class="cart_remove" action="cartManager.php" method="post">
					<input type="text" value="<?php echo $row["cart_id"];?>" name="remove_id" style="width:5px;height:5px;display: none">
					<button type="submit" name="remove_btn" style="padding:0; border:none;background-color: antiquewhite;margin-top:0;"><img src="images/delete.png" style="width:35px;height:35px"></button>
				</form>
				
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