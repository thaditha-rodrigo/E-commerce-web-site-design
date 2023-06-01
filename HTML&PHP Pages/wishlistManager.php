<?php session_start ();

?>

<?php
	
	$con = mysqli_connect("localhost","root","","it21351440","3306");

	if(!$con) 
	{
		die("Sorry!!! we are facing technical issue"); 
	}
		
	
	$id=$_GET["id"];

			 
	$sql = "DELETE FROM `wishlist` WHERE `wishlist`.`wish_id` = '".$id."';";
			 
	if(mysqli_query($con,$sql))
	{
		echo '<script>alert("Successfully deleted from cart.");</script>';
	}
		else
	{
		echo '<script>alert("OOPS!! , something is wrong , Please try again");</script>';
	} 
		
	header('location:Wishlist.php');

?>