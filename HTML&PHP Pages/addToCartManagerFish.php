<?php session_start ();
	if ( (!isset($_SESSION["username"])) && (!isset($_SESSION["admin_id"])) )
	{
		header ('Location:Registration.php');
	}
?>

<?php
	
	 $con = mysqli_connect("localhost","root","","it21351440","3306");
	 
	 if(!$con) 
	 {
		die("Sorry!!! we are facing technical issue"); 
		 
	 }
	
	$sql = "SELECT *, `price`-(`price`*`discount`) AS disc_price FROM `product` WHERE `pro_id` = ".$_GET["id"];
	
	$result = mysqli_query($con,$sql);	

	$row = mysqli_fetch_assoc($result);

	
	$pid=$_GET["id"];
	$cid = $_SESSION["cus_id"];
	$name = $row["name"];
	$price = $row["disc_price"];
			
	$sql2 = "INSERT INTO `cart` (`pro_id`, `cus_id`, `name`, `price`, `quantity`) VALUES ('".$pid."', '".$cid."', '".$name."', '".$price."', '1');";

	if (mysqli_query ($con,$sql2))
	{

		echo '<script>alert("Successfully added to cart.")</script>';
		header ('location:Fish.php');

	}
	else
	{
		echo '<script>alert("OOPS!! , something is wrong , Please try again")</script>';
		header ('location:Fish.php');
	}
		
?>
