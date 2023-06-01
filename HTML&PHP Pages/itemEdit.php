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
			top:10.8%;
		}
		
		.left {
			top:10.8%;
		}
		
		.form__input-group {
			width:60%;
			margin-top: 10%;
			margin-left: 20%;
		}
		
		.form__input{
			cursor: text;
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
		
		.container{
			background-color:white;
			margin-top: 1%;
			width: 600px;
			max-width: 90%;
			margin-left: 5%;
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

			 $sql = "SELECT * , `price` - (`price`*`discount`) AS disc_price FROM `product` WHERE `pro_id` = ".$_GET["id"];
	
			 $result = mysqli_query($con,$sql);	 

			 $row = mysqli_fetch_assoc($result); 

	?>
		<div class="split left">
			<div class="container1">
				<img style="border: #000000 solid;" src="<?php echo $row["img_path"];?>">
			</div>
		</div>
		<div class="split right">
		
					<div class="container" >
						<form class="form" id="login" action="itemEditManager.php" method="post" enctype="multipart/form-data">
							<h1 class="form__title">Add Item</h1>
							<div class="form__input-group" style="margin-left: 5%;width:90%;">
								<div class="form__input" style="display: inline-flex;align-items: center;" >
									<p>Change Image :   </p>
									<input type="file" name="add-image" style="margin-left:10px"  >
								</div>
							</div>
							<div class="form__input-group">
								<select class="form__input" name="add-category" autofocus required>
									<option value="vegetables" <?php if ($row["category"]=="vegetables"){echo "selected";}?> >vegetables</option>
									<option value="fruits" <?php if ($row["category"]=="fruits"){echo "selected";}?>>fruits</option>
									<option value="fish" <?php if ($row["category"]=="fish"){echo "selected";}?>>fish</option>
									<option value="meat" <?php if ($row["category"]=="meat"){echo "selected";}?>>meat</option>
									<option value="dairy" <?php if ($row["category"]=="dairy"){echo "selected";}?>>dairy</option>
									<option value="grocery" <?php if ($row["category"]=="grocery"){echo "selected";}?>>grocery</option>
								</select>
							</div>
							<?php $_SESSION["img_path"] = $row["img_path"];?></p>
							<div class="form__input-group">
								<p>Name:</p>
								<input type="text"  class="form__input" name="add-name" autofocus placeholder="name" value="<?php echo $row["name"];?>" >
							</div>
							
							<div class="form__input-group">
								<p>Discount:</p>
								<input type="text" class="form__input" name="add-discount" autofocus placeholder="discount" value="<?php echo $row["discount"]*100;?>%" >
							</div>
							
							<div class="form__input-group">
								<p>Price:</p>
								<input type="text" class="form__input" name="add-price" autofocus placeholder="price" value="<?php echo $row["price"];?>" >
							</div>
							
							<div class="form__input-group">
								<p>Description:</p>
								<input type="text" class="form__input" name="add-description" autofocus placeholder="description" value="<?php echo $row["description"];?>" >
							</div>
							
							<div class="form__input-group">
								<p>Price after discount:</p>
								<input type="text" class="form__input" name="disc-price" autofocus placeholder="price" value="<?php echo round($row["disc_price"],2);?>" style="cursor: not-allowed;" readonly>
							</div>
							<button class="form__button" type="submit"  name="btnAdd">Continue</button>
							<div class="form__input-group" style="visibility: hidden;" >
								<p>warning</p>
								<input type="text"  class="form__input" name="add-id" autofocus placeholder="id"  value="<?php echo $row["pro_id"];?>" readonly>
							</div>
						</form>
					</div>
				
		</div>
</body>
</html>