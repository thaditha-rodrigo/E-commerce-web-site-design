<?php session_start ();
	if ( (!isset($_SESSION["username"])) && (!isset($_SESSION["admin_id"])) )
	{
		header ('Location:Registration.php');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Wishlist</title>
	<link rel="stylesheet" href="IT21351440-CSS.css">
	<style>
		
		*, *:before, *:after {
		  box-sizing: inherit;
		}
		
		.hero-image{
			background-image: url("images/wishlist-back.jpg");
		}
		
		#remove_button:hover {
			background-color: red;
		}
		
		.add-to-wishlist{
			transform: scale(1.5);
			background-color: red;
			transition: 0.3s;
			height: 50px;
			width: 50px;
			border-radius: 50%;
			display: inline-block;
		}
		
		.add-to-wishlist:hover{
			transform: scale(1);
			background-color: antiquewhite;
			margin-top:8%;
		}
		
		.add-to-wishlist a img {
			margin-top:7px;
			margin-left:3px;
			
		}
		
		.add-to-wishlist:hover a img {
			margin-top:0;
			margin-left:0;
			
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
		
	 $sql = "SELECT *, `price` - (`price`*`discount`) AS disc_price FROM `wishlist` WHERE `cus_id` = ".$_SESSION["cus_id"];
	 $result = mysqli_query($con,$sql);	 

	 if(mysqli_num_rows($result)>0)
	 {
		while($row = mysqli_fetch_assoc($result)) 
		{
			$sql2 = "SELECT `img_path` FROM `product` WHERE `pro_id`= '".$row["pro_id"]."';";
					
			$result2 = mysqli_query($con,$sql2);	
					
			$row2=mysqli_fetch_assoc($result2)

	?>

	<div class="after-menu">
			<div class="column">
				<div class="card" onClick="location.href='item.php?id=<?php echo $row["pro_id"];?>'">
					 <form action="#" method="post">
						  <img src="<?php echo $row2["img_path"];?>" style="width:100%;height: 220px;">
						   <div class="add-to-wishlist">
							<a href="wishlistManager.php?id=<?php echo $row["wish_id"];?>"><img src="images/favorite.png" style="width:35px;height: 35px;"></a>
					   	   </div>
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
						<p><button name="cart"><a href="addToCartManagerWishlist.php?id=<?php echo $row["pro_id"];?>">Add to Cart</a></button></p>
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