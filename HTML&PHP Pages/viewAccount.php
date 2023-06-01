<?php session_start ();
?>

<?php
	function alert($message) {
     echo "<script>alert('$message');
	 window.location.href='viewAccount.php'
	 </script>";
	}
	function alert2($message) {
     echo "<script>alert('$message');
	 window.location.href='Home.html'
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
				<a href="myAccount.php" class="dropdwn" ><img class="zoom" height="25px" width="25px" src="images/user-account.png">
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
	 
	 $sql = "SELECT * FROM `customer` WHERE `customer`.`cus_id`= ".$_SESSION["cus_id"];
	 
	 $result = mysqli_query($con,$sql);	 

	 $row = mysqli_fetch_assoc($result);
	
		if(isset($_POST["edit"]))
		{
			$username = $_POST ["edit-user"] ;
			$email = $_POST ["edit-email"];
			$password = $_POST ["edit-password"];
			$mobile = $_POST ["edit-mobile"];
			$address = $_POST ["edit-address"];
			
			$sql2 = "UPDATE `customer` SET `username`='".$username."',`password`='".$password."',`email`='".$email."',`address`='".$address."',`mobile`='".$mobile."' WHERE `cus_id`= ".$_SESSION["cus_id"];

			if (mysqli_query ($con,$sql2))
			{
				alert ("User successfully updated.") ;
				
			}
			else
			{
				alert ("OOPS!! , something is wrong , Please try again") ;
			}
		}
		
		if(isset($_POST["delete"]))
		{
			$choice = confirm ("Delete your account? |:-(| ");
			if ($choice == "yes")
			{
				$sql3 = "DELETE FROM `customer` WHERE `customer`.`cus_id`=".$_SESSION["cus_id"];

				if (mysqli_query ($con,$sql3))
				{
					alert2("User removed.");
					header('location:logoutManager.php');
				}
			else
				{
					alert ("OOPS!! , something is wrong , Please try again") ;
				}
			}
		}

	?>
	<div class="container">
		<form class="form" method="post" action="#" enctype="multipart/form-data">
			<div class="form__input-group">
				<input type="text" class="form__input" autofocus placeholder="User Name" name="edit-user" value ="<?php echo $_SESSION["username"];?>">
			</div >
			<div class="form__input-group">
				<input type="text" class="form__input" autofocus placeholder="Address" name="edit-address" value ="<?php echo $row["address"];?>">
			</div>
			<div class="form__input-group">
				<input type="text" class="form__input" autofocus placeholder="Mobie Phone number" name="edit-mobile" value ="<?php echo $row["mobile"];?>">
			</div>
			<div class="form__input-group">
				<input type="text" class="form__input" autofocus placeholder="Email" name="edit-email" value ="<?php echo $row["email"];?>">
			</div>
			<div class="form__input-group">
				<input type="password" class="form__input" autofocus placeholder="Password" name="edit-password" value ="<?php echo $row["password"];?>">
			</div>
			<button class="form__button" name="edit" type="submit">Edit</button>
			
			<button style="margin-top:20px" class="form__button" name ="delete" type="submit">Delete Account</button>
		</form>
	</div>
</body>
</html>