<?php session_start ();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Admin</title>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="IT21351440-CSS.css">
	<style>
		.container {
			margin-top: 6%;
		}
	</style>
	<script>
		
		function checkPassword()
			{
				let pw = document.getElementById("admin-password").value;
				let cpw = document.getElementById("admin-con_password").value;
				if(pw != cpw)
					{
						alert("Password and confrim password should be the same");
						event.preventDefault();
					}
			}
		
	</script>
</head>

<body class="hero-image" >
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

	function alert($message) {
     echo "<script>alert('$message');
	 window.location.href='adminAdd.php'
	 </script>";
	}
	
	function alert2($message) {
     echo "<script>alert('$message');
	 window.location.href='Registration.php'
	 </script>";
	}

	if(isset($_POST["btnAddAdmin"]))
	{
		$adminname = $_POST ["admin-user"] ;
		$code = $_POST ["admin-code"];
		$password = $_POST ["admin-password"];
		

			$con = mysqli_connect ("localhost","root","","it21351440","3306");
			if (!$con)
			{
				die("Sorry !!! we are facing mechanical issues..");
			}

			$sql = "INSERT INTO `customer` (`username`, `password`, `email`, `address`, `mobile`) VALUES ('".$adminname."', '".$code."', '', '', '');";
		
			if(mysqli_query($con,$sql))
			{
			
				$sql2  = "SELECT `cus_id` FROM `customer` WHERE `username` = '".$adminname."' AND `password` = '".$code."' ;";

				$result = mysqli_query($con,$sql2);

				if(mysqli_num_rows($result)>0)
				{
					$row = mysqli_fetch_assoc($result);
				}
				else
				{
					alert("OOPS!! , something is wrong , Please try again1");
				}

				$cus_id = $row["cus_id"];

				$sql3 = "INSERT INTO `admin` (`cus_id`, `name`, `code`, `password`) VALUES ('".$cus_id."', '".$adminname."', '".$code."', '".$password."');";

				if (mysqli_query($con,$sql3))
				{
					alert("Admin added successfully");
				}
				else
				{
					alert("OOPS!! , something is wrong , Please try again1");
				}
			}
			else
			{
				alert("OOPS!! , something is wrong , Please try again3");
			}
		
		mysqli_close($con);
	}
	
	if(isset($_POST["btnDeleteAdmin"]))
	{
		$adminname = $_POST ["admin-user"] ;
		$code = $_POST ["admin-code"];
		$password = $_POST ["admin-password"];
		

			$con = mysqli_connect ("localhost","root","","it21351440","3306");
			if (!$con)
			{
				die("Sorry !!! we are facing mechanical issues..");
			}

			$sql = "DELETE FROM `admin` WHERE `name` = '".$adminname."' AND `code` = '".$code."' AND `password` ='".$password."' ;";
			
			$sql2 = "DELETE FROM `customer` WHERE `username` = '".$adminname."' AND `password` = '".$code."';";
		
			if (mysqli_query($con,$sql))
			{
				if (mysqli_query($con,$sql2)) 
				{
					alert2("Admin removed successfully");
					header('location:logoutManager.php');
				}
				else
				{
					alert("OOPS!! , something is wrong , Please try again");

				}
			}
			else
			{
				alert("OOPS!! , something is wrong , Please try again");
			}
		
		mysqli_close($con);	
	}
?>	
	<center>
		<div class="container">
			<form id="createAccount" action="#" method="post">
				<h1 class="form__title">Add Admin</h1>
				<div class="form__input-group">
					<input type="text"  class="form__input" name="admin-user" autofocus placeholder="Username" required>
				</div>
				<div class="form__input-group">
					<input type="text" class="form__input" name="admin-code" autofocus placeholder="Code" required>
				</div>
				<div class="form__input-group">
					<input type="password" class="form__input" name="admin-password" id="admin-password" autofocus placeholder="Passowrd" required>
				</div>
				<div class="form__input-group">
					<input type="password" class="form__input" name="admin-con_password" id="admin-con_password" autofocus placeholder="Confirm password" required>
				</div>
				<button class="form__button" type="submit" onClick="checkPassword()" name="btnAddAdmin">Continue</button>
				<button style="margin-top:20px" class="form__button" name ="btnDeleteAdmin" type="submit">Delete Account</button>
			</form>
		</div>
	</center>

</body>
</html>