<?php session_start ();
	if ( (!isset($_SESSION["admin_name"])) && (!isset($_SESSION["admin_code"])) ) 
	{
		header('location:Registration.php');
	}
?>

<?php
	function alert($message) {
     echo "<script>alert('$message');
	 window.location.href='myAccountAdmin.php'
	 </script>";
	}
	function alert2($message) {
     echo "<script>alert('$message');
	 window.location.href='checkAdmin.php'
	 </script>";
	}

	if(isset($_POST["btnAdmin"]))
	{
		
		$username = $_SESSION["admin_name"];
		$code = $_SESSION["admin_code"];
		$password = $_POST ["admin-password"];
		
		
		$con = mysqli_connect ("localhost","root","","it21351440","3306");
		if (!$con)
		{
			die("Sorry !!! we are facing mechanical issues..");
		}
		
		$sql = "SELECT * FROM `admin` WHERE `name`= '".$username."' AND `code` = '".$code."' AND `password` = '".$password."';";
		
		$result = mysqli_query ($con,$sql);
		
		if(mysqli_num_rows($result) > 0)
		{
			$row=mysqli_fetch_assoc($result);
			
			$_SESSION["admin_id"]=$row["admin_id"];
			$_SESSION["cus_id"]=$row["cus_id"];
			unset($_SESSION["admin_code"]);
			unset($_SESSION["admin_name"]);
			alert("Admin Logged-In successfully");
			
		}
		else
		{
			alert2("Please try again");
		}
		
	}

	mysqli_close($con);
?>