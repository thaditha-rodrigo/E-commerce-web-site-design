<?php session_start ();

?>

<?php
	
		 $con = mysqli_connect("localhost","root","","it21351440","3306");

		 if(!$con) 
		 {
			die("Sorry!!! we are facing technical issue"); 
		 }
		
		if(isset($_POST["quantity_btn"]))
		 {
			 $id2=$_POST["quantity_id"];
			 $quantity=$_POST["quantity"];
			 
			 echo $id2;
			 
			 $sql4 = "UPDATE `cart` SET `quantity`='".$quantity."'WHERE `cart_id` = '".$id2."';";
			 
			 if(mysqli_query($con,$sql4))
			 {
				 echo '<script>alert("Successfully updated.");</script>';
			 }
			 else
			 {
				 echo '<script>alert("OOPS!! , something is wrong , Please try again");</script>';
			 }
			 
		 }
	
		 if(isset($_POST["remove_btn"]))
		 {
			 $id=$_POST["remove_id"];
			 
			 $sql3 = "DELETE FROM `cart` WHERE `cart`.`cart_id` = '".$id."';";
			 
			 if(mysqli_query($con,$sql3))
			 {
				 echo '<script>alert("Successfully deleted from cart.");</script>';
			 }
			 else
			 {
				 echo '<script>alert("OOPS!! , something is wrong , Please try again");</script>';
			 }

			 
		 }

		if(isset($_POST["empty"]))
		 {
			 $cus_id=$_SESSION["cus_id"];
			 
			 $sql4 = "DELETE FROM `cart` WHERE `cus_id` = '".$cus_id."';";
			 
			 if(mysqli_query($con,$sql4))
			 {
				 echo '<script>alert("Successfully deleted from cart.");</script>';
			 }
			 else
			 {
				 echo '<script>alert("OOPS!! , something is wrong , Please try again");</script>';
			 }

			 
		 }
		
		header('location:Cart.php');
?>