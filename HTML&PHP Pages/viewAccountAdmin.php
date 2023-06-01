<?php session_start ();
	if (!isset($_SESSION["admin_id"]))
	{
		header('location:Registration.php');
	}
?>

<?php
	function alert($message) {
     echo "<script>alert('$message');
	 window.location.href='viewAccountAdmin.php'
	 </script>";
	}
?>
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View/Edit Account</title>
	<link rel="stylesheet" href="IT21351440-CSS.css">
	<style>
		.container{
			margin-left:40%;
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
	<?php
	
	 $con = mysqli_connect("localhost","root","","it21351440","3306");
	 
	 if(!$con) 
	 {
		die("Sorry!!! we are facing technical issue"); 
	 }
	 
	 $sql = "SELECT * FROM `admin` WHERE `admin`.`admin_id`= ".$_SESSION["admin_id"];
	 
	 $result = mysqli_query($con,$sql);	 

	 $row = mysqli_fetch_assoc($result);
	
		if(isset($_POST["edit"]))
		{
			$username = $_POST ["edit-admin"] ;
			$code = $_POST ["edit-code"];
			$password = $_POST ["edit-password"];
		
			$sql2 = "UPDATE `admin` SET `name`='".$username."',`code`='".$code."',`password`='".$password."' WHERE `admin_id`= ".$_SESSION["admin_id"];

			if (mysqli_query ($con,$sql2))
			{
				alert ("Admin successfully updated.") ;
				
			}
			else
			{
				alert ("OOPS!! , something is wrong , Please try again") ;
			}
		}

	?>
	<div class="container">
		<form class="form" method="post" action="#" enctype="multipart/form-data">
			<div class="form__input-group">
				<input type="text" class="form__input" autofocus placeholder="User Name" name="edit-admin" value ="<?php echo $row["name"];?>">
			</div>
			<div class="form__input-group">
				<input type="text" class="form__input" autofocus placeholder="code" name="edit-code" value ="<?php echo $row["code"];?>">
			</div>
			<div class="form__input-group">
				<input type="password" class="form__input" autofocus placeholder="Password" name="edit-password" value ="<?php echo $row["password"];?>">
			</div>
			<button class="form__button" name="edit" type="submit">Edit</button>
		</form>
	</div>
</body>
</html>