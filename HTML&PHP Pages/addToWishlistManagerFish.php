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

	
	$name = $row["name"];
	$price = $row["disc_price"];
	$discount = $row["discount"];
			
	$sql2 = "INSERT INTO `wishlist` (`pro_id`, `cus_id`, `name`, `price`, `discount`) VALUES ('".$_GET["id"]."', '".$_SESSION["cus_id"]."', '".$name."', '".$price."', '".$discount."');";

	if (mysqli_query ($con,$sql2))
	{

		echo '<script>alert("Successfully added to wishlist.");</script>';
		header ('location:Fish.php');

	}
	else
	{
		echo '<script>alert("OOPS!! , something is wrong , Please try again");</script>';
		header ('location:Fish.php');
	}
		
	mysqli_close($con);	

?>