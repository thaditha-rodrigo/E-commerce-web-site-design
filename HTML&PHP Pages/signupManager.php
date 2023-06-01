<?php session_start ();
?>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php

	function alert($message) {
     echo "<script>alert('$message');
	 window.location.href='Registration.php'
	 </script>";
	}

	if(isset($_POST["btnSignUp"]))
	{
		$username = $_POST ["sign-user"] ;
		$email = $_POST ["sign-email"];
		$password = $_POST ["sign-password"];
		$mobile = $_POST ["sign-mobile"];
		$address = $_POST ["sign-address"];
		

					$con = mysqli_connect ("localhost","root","","it21351440","3306");
					if (!$con)
					{
						die("Sorry !!! we are facing mechanical issues..");
					}
					
					$sql = "SELECT `username` FROM `customer` WHERE `username` = '".$username."';";
		
					$result = mysqli_query($con,$sql);
						
					if(mysqli_num_rows($result)>0)
					{
						alert("Username already exists.");
					}
					else
					{
						$sql2 = "INSERT INTO `customer` (`username`, `password`,`email`, `address`, `mobile`) VALUES ('".$username."', '".$password."', '".$email."', '".$address."', '".$mobile."');";

						if (mysqli_query($con,$sql2))
						{
							alert("User Signed-Up successfully");
						}
						else
						{
							alert("OOPS!! , something is wrong , Please sign up again");
						}
					}
	}

	mysqli_close($con);

?>