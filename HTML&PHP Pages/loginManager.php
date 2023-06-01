<?php session_start ();
	
?> 
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php
	function alert($message) {
     echo "<script>alert('$message');
	 window.location.href='myAccount.php'
	 </script>";
	}

	function alert2($message) {
     echo "<script>alert('$message');
	 window.location.href='Registration.php'
	 </script>";
	}
	
	function alert3($message) {
     echo "<script>alert('$message');
	 window.location.href='checkAdmin.php'
	 </script>";
	}
	
	function alert4($message) {
     echo "<script>alert('$message');
	 window.location.href='Home.html'
	 </script>";
	}
	
	if(isset($_POST["btnLogin"]))
	{
		if( (isset($_SESSION["username"])) || (isset($_SESSION["admin_id"])) )
		{

			alert4("A User is already logged in"); 
		}
		
		$username = $_POST ["log-user"];
		$password = $_POST ["log-password"];
		
		$con = mysqli_connect ("localhost","root","","it21351440","3306");
		if (!$con)
		{
			die("Sorry !!! we are facing mechanical issues..");
		}
		
		
		$sql = "SELECT * FROM `admin` WHERE `code` = '".$password."' AND `name` = '".$username."';";
		
		$sql2 = "SELECT * FROM `customer` WHERE `username` = '".$username."' AND `password` = '".$password."';";
		
		$result = mysqli_query ($con,$sql);

		
		if(mysqli_num_rows($result) > 0)
		{
			$_SESSION["admin_name"] = $username;
			$_SESSION["admin_code"] = $password;
			
			alert3("Please enter the password");
		}
		else
		{
			
			$result2 = mysqli_query ($con,$sql2);
		
			if (mysqli_num_rows($result2) > 0)
			{
				
				$row2 = mysqli_fetch_assoc($result2);
			
				$_SESSION ["username"] = $username;
				$_SESSION ["cus_id"] = $row2["cus_id"];
			
				alert("User Logged-In successfully");
			}
			else
			{
				alert2("Wrong passowrd or username");
			
			}
		}
		
	}

	mysqli_close($con);
?>
