<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Log-In/Sign-Up</title>
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
				let pw = document.getElementById("sign-password").value;
				let cpw = document.getElementById("sign-con_password").value;
				if(pw != cpw)
					{
						alert("Password and confrim password should be the same");
						event.preventDefault();
					}
			}
		
		document.addEventListener("DOMContentLoaded", () => {
			const loginForm = document.querySelector("#login");
			const createAccountForm = document.querySelector("#createAccount");

			document.querySelector("#linkCreateAccount").addEventListener("click", e => {
				e.preventDefault();
				loginForm.classList.add("form--hidden");
				createAccountForm.classList.remove("form--hidden");
			});

			document.querySelector("#linkLogin").addEventListener("click", e => {
				e.preventDefault();
				loginForm.classList.remove("form--hidden");
				createAccountForm.classList.add("form--hidden");
			});
		});
	</script>
</head>

<body class="hero-image" >
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
	<center>
		<div class="container">
			<form class="form" id="login" action="loginManager.php" method="post">
				<h1 class="form__title">Login</h1>
				<div class="form__input-group">
					<input type="text" class="form__input" name="log-user" autofocus placeholder="Username or email">
				</div>
				<div class="form__input-group">
					<input type="password" class="form__input" name="log-password" autofocus placeholder="Password">
				</div>
				<button class="form__button" type="submit" name="btnLogin">Continue</button>
				<p class="form__text">
					<a class="form__link" href="./" id="linkCreateAccount">Don't have an account? Create account</a>
				</p>
			</form>
			<form class="form form--hidden" id="createAccount" action="signupManager.php" method="post">
				<h1 class="form__title">Create Account</h1>
				<div class="form__input-group">
					<input type="text" id="signupUsername" class="form__input" name="sign-user" autofocus placeholder="Username" required>
					<div class="form__input-error-message"></div>
				</div>
				<div class="form__input-group">
					<input type="text" class="form__input" name="sign-address" autofocus placeholder="Address" required>
				</div>
				<div class="form__input-group">
					<input type="tel" class="form__input" name="sign-mobile" autofocus placeholder="Mobile Phone Number" required pattern="[0-9]{3}-[0-9]{7}">
				</div>
				<p style="font-size:10px;opacity: 0.5">Format:077-1234567</p>
				<div class="form__input-group">
					<input type="text" class="form__input" name="sign-email" autofocus placeholder="Email Address" required>
				</div>
				<div class="form__input-group">
					<input type="password" class="form__input" name="sign-password" id="sign-password" autofocus placeholder="Password" required >
				</div>
				<div class="form__input-group">
					<input type="password" class="form__input" name="sign-con_password" id="sign-con_password" autofocus placeholder="Confirm password" required>
				</div>
				<button class="form__button" type="submit" onClick="checkPassword()" name="btnSignUp">Continue</button>
				<p class="form__text">
					<a class="form__link" href="./" id="linkLogin">Already have an account? Sign in</a>
				</p>
			</form>
		</div>
	</center>
</body>
</html>