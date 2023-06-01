<?php session_start ();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Item</title>
	<link rel="stylesheet" href="IT21351440-CSS.css">
	<style>
		.container1{
			margin-top: 0%;
			margin-left: 5%;
			height: 75%;
			width: 70%;
			padding: 2rem;
			box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
			border-radius: 12px;
			background: #ffffff;
			align-items: center;
		}
		
		.container1 img{
			margin: 1% 2% 2% 1%;
			border-radius: 12px;
			align-items: center;
			width: 98%;
			height: 98%;
		}
		
		.right {
			top:8%;
			height: 90%;		}
		
		.left {
			top:10.8%;
		}
		
		.form__input-group {
			width:60%;
			margin-top: 10%;
			margin-left: 20%;
		}
		
		.form__input{
			cursor: context-menu;
			color: #0C1D9B;
		}
		
		.form__button {
			width:60%;
			margin-top: 10%;
			margin-left: 20%;
		}
		
		.form__button:hover {
			color: grey:
		}
		
		.form__title{
			cursor: context-menu;
		}
		
		.right{
			overflow:scroll;
			overflow-x: hidden;
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

			 $sql = "SELECT * , `price` - (`price`*`discount`) AS disc_price FROM `product` WHERE `pro_id` = ".$_GET["id"];
	
			 $result = mysqli_query($con,$sql);
	
			 $row = mysqli_fetch_assoc($result);

			if(isset($_POST['add-to-cart']))
			{
				
				$con2 = mysqli_connect("localhost","root","","it21351440","3306");

				 if(!$con2) 
				 {
					die("Sorry!!! we are facing technical issue"); 
				 }
				
				$sql2 = "SELECT *, `price`-(`price`*`discount`) AS disc_price FROM `product` WHERE `pro_id` = ".$_POST["cart_id"];

				$result2 = mysqli_query($con2,$sql2);	

				$row2 = mysqli_fetch_assoc($result2);


				$name = $row2["name"];
				$price = $row2["disc_price"];

				$sql3 = "INSERT INTO `cart` ( `pro_id`, `cus_id`, `name`, `price`, `quantity`) VALUES ('".$_POST["cart_id"]."', '".$_SESSION["cus_id"]."', '".$name."', '".$price."', '1' );";

				if (mysqli_query ($con2,$sql3))
				{
					echo '<script>alert("Successfully added to cart.");</script>';
					header("Refresh:0");
				}
				else
				{
					echo '<script>alert("OOPS!! , something is wrong , Please try again");</script>';
				}
				
				mysqli_close($con2);
				
			}

			if(isset($_POST['add-to-wish']))
			{
				
				$con3 = mysqli_connect("localhost","root","","it21351440","3306");

				 if(!$con3) 
				 {
					die("Sorry!!! we are facing technical issue"); 
				 }
				
				$sql4 = "SELECT *, `price`-(`price`*`discount`) AS disc_price FROM `product` WHERE `pro_id` = ".$_POST["wish_id"];

				$result3 = mysqli_query($con3,$sql4);	

				$row3 = mysqli_fetch_assoc($result3);


				$name = $row3["name"];
				$price = $row3["disc_price"];
				$discount = $row3["discount"];

				$sql5 = "INSERT INTO `wishlist` (`pro_id`, `cus_id`, `name`, `price`, `discount`) VALUES ('".$_POST["wish_id"]."', '".$_SESSION["cus_id"]."', '".$name."', '".$price."', '".$discount."');";

				if (mysqli_query ($con3,$sql5))
				{

					echo '<script>alert("Successfully added to wishlist.");</script>';
					header("Refresh:0");

				}
				else
				{
					echo '<script>alert("OOPS!! , something is wrong , Please try again");</script>';
				}
				
				mysqli_close($con3);
			}

	?>
		<div class="split left">
			<div class="container1">
				<img style="border: #000000 solid;" src="<?php echo $row["img_path"];?>">
			</div>
		</div>
		<div class="split right">
			<h1 class="form__title"><?php echo $row["name"];?></h1>
			<?php
				if( $row["discount"] > '0' )
				{
			?>
					
					<div class="form__input-group">
							<p>Discount:</p>
							<input type="text" class="form__input" style="color: green;" autofocus placeholder="discount" value="<?php echo $row["discount"]*100;?>%" readonly>
					</div>
					
					<div class="form__input-group" >
							<p>Price before discount:Rs.</p>
							<input type="text" class="form__input" style="color: red;" autofocus placeholder="before_price" value="<?php echo $row["price"];?>" readonly>
					</div>
			<?php
				}
			?>
			
			<div class="form__input-group">
					<p>Price: Rs.</p>
					<input type="text" class="form__input" style="color: green;" autofocus placeholder="Price" value="<?php echo round($row["disc_price"],2);?>" readonly>
			</div>
			
			<div class="form__input-group" >
					<p>Description:</p>
					<input type="text" class="form__input" autofocus placeholder="Description" readonly>
			</div>
			<?php
				if ( (isset($_SESSION["username"])) || (isset($_SESSION["admin_id"])) )
				{
			?>
					<form action="#" method="post">
						<input type="text" value="<?php echo $row["pro_id"];?>" name="cart_id" style="width:5px;height:5px;display: none">
						<button class="form__button" type="submit" id="cart" name="add-to-cart"> Add to Cart</button>
					</form>
					<form action="#" method="post">
						<input type="text" value="<?php echo $row["pro_id"];?>" name="wish_id" style="width:5px;height:5px;display: none">
						<button class="form__button" type="submit" name="add-to-wish">Add to Wishlist</button>
					</form>
			<?php
				}
			?>
			<div class="form__input-group" style="visibility: hidden;">
					<p>Warning:</p>
					<input type="text" class="form__input" autofocus placeholder="warning" readonly>
			</div>
	<?php	
		mysqli_close($con);		
	?>
</body>
</html>