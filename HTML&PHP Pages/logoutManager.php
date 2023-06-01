<?php session_start ();
?> 
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php
	function alert($message) {
     	echo "<script>alert('$message');
	 	window.location.href='Home.html'
	 	</script>";
		}
	if(isset($_SESSION["admin_id"]))
	{
		unset($_SESSION["cus_id"]);
		unset($_SESSION["admin_id"]);
		alert("Logged-Out successfully");
	}
	else
	{
		if (!isset($_SESSION["username"]))
		{
		alert("User Not Logged-In");
		}
		else
		{
		unset($_SESSION["cus_id"]);
		unset($_SESSION["username"]);
		alert("Logged-Out successfully");
		}
	}
?>