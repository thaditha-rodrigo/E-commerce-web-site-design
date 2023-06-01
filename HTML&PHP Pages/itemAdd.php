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
<title>Add Item</title>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="IT21351440-CSS.css">
	<style>
		.container {
			margin-top: 6%;
		}
	</style>
	
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
	 window.location.href='itemAdd.php'
	 </script>";
	}

	if(isset($_POST["btnAdd"]))
	{
		  $name = $_POST["add-name"];
	  	  $description = $_POST["add-description"];
	      $discount = ($_POST["add-discount"]/100.00);
	      $category = $_POST["add-category"];
	      $price = $_POST["add-price"];
		
			if (!file_exists($_FILES['add-image']['tmp_name']) || !is_uploaded_file ($_FILES['add-image']['tmp_name']))
			{
				$image = $_SESSION["img_path"];
			}
			else
			{
				$image = "item_images/" . basename($_FILES["add-image"]["name"]);
		  		$imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

	    		$check = getimagesize($_FILES["add-image"]["tmp_name"]);
	    		if( ($check !== false) && ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" || $imageFileType == "img" || $imageFileType == "webp")) {
		  			move_uploaded_file($_FILES["add-image"]["tmp_name"], $image);
	    		} 
				else 
				{
					alert('File is not a image');
	    		}
			}


					$con = mysqli_connect ("localhost","root","","it21351440","3306");
					if (!$con)
					{
						die("Sorry !!! we are facing mechanical issues..");
					}

					$sql = "INSERT INTO `product`(`category`, `name`, `price`, `description`, `discount`, `img_path`) VALUES ('".$category."','".$name."','".$price."','".$description."','".$discount."','".$image."');";

					if (mysqli_query($con,$sql))
					{
						alert("Item added successfully");
					}
					else
					{
						alert("OOPS!! , something is wrong , Please try again");
					}
		
		
	}

?>
	<center>
		<div class="container">
			<form class="form" id="login" action="#" method="post" enctype="multipart/form-data">
				<h1 class="form__title">Add Item</h1>
				<div class="form__input-group">
					<div class="form__input" style="display: inline-flex;align-items: center;" >
						<p>Image :   </p>
						<input type="file" name="add-image" style="margin-left:10px" required>
					</div>
				</div>
				<div class="form__input-group">
					<select class="form__input" name="add-category" autofocus required>
						<option value="vegetables">vegetables</option>
						<option value="fruits">fruits</option>
						<option value="fish">fish</option>
						<option value="meat">meat</option>
						<option value="dairy">dairy</option>
						<option value="grocery">grocery</option>
					</select>
				</div>
				<div class="form__input-group">
					<input type="text"  class="form__input" name="add-name" autofocus placeholder="name" required>
				</div>
				<div class="form__input-group">
					<input type="text" class="form__input" name="add-discount" autofocus placeholder="discount" required>
				</div>
				<p style="font-size:10px;opacity: 0.5">0 if no discount</p>
				<div class="form__input-group">
					<input type="text" class="form__input" name="add-price" autofocus placeholder="price" required >
				</div>
				<div class="form__input-group">
					<input type="text" class="form__input" name="add-description" autofocus placeholder="description" >
				</div>
				<button class="form__button" type="submit"  name="btnAdd">Continue</button>
			</form>
		</div>
	</center>
	
</body>
</html>