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
<title>My Account</title>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="IT21351440-CSS.css">
	<style>
		.zoom:hover{
			transform:scale(1.5);
		}
		
		.centered {
			margin-top: 30%;
		}
		
		.split{
			height:70%;
			overflow: auto;
		.
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
				<a href="Contact.html" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/telephone.png">
				<p class="dropdown-content" style="margin-top: 30px;">Contact</p>
				</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<form class="lgout dropdwn" action="logoutManager.php" method="post" >
					<input type="image" class="zoom" src="images/logout.png" name="logout" width="25px" height="25px"/>
					<p class="dropdown-content" style="margin-top: 30px;padding: 12px 8px;text-align: left;min-width: 70px;">Log-Out</p>
				</form>
	</div>
	<div style="width:100%;height: 100%;z-index: -3;border: none;margin-top: 8%">
		<div style="margin-left: 10%;width: 50%" >
			<div  style="top: 30%;">
				<div class="container zoom">
					<a href="itemAdd.php" class="form__title"><h1>Add item</h1></a>
				</div>
		  </div>
		  <div  style="margin-top: 100px;">
				<div class="container zoom">
					<a href="viewAccountAdmin.php" class="form__title"><h1>View Account</h1></a>
				</div>
		   </div>
		</div>
		<div style="margin-left: 50%;margin-top: -27.5%;width: 50%;margin-right: 5%;" >
			<div style="margin-left: 10%;">
				<div  >
					<div class="container zoom">
						<a href="vegetablesAdmin.php" class="form__title"><h1>Update / Delete Items</h1></a>
					</div>
				</div>
				<div style="margin-top: 100px;">
					<div class="container zoom">
						<a href="purchaseHistoryAdmin.php" class="form__title"><h1>Purchase History</h1></a>
					</div>
				</div>
			</div>
		</div>
		<center >
			<div style="margin-top: 2">
				<div class="container zoom">
					<a href="adminAdd.php" class="form__title"><h1>Add / Delete Admin</h1></a>
				</div>
			</div>
		</center>
		<div width="100%";>
			<p style="visibility: hidden;height: 60px;" >HEll0!!</p>
		</div>
	</div>
</body>
</html>