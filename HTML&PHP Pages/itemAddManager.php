<?php session_start ();
?>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php

	function alert($message) {
     echo "<script>alert('$message');
	 window.location.href='itemAdd.php'
	 </script>";
	}

	if(isset($_POST["btnAdd"]))
	{
		  $name = $_POST["add-name"];
	  	  $description = $_POST["add-description"];
	      $discount = ($_POST["add-discount"]/100.00);
	      $category = $_POST["add-category"];
	      $price = $_POST["add-price"];
		
			if (!file_exists($_FILES['add-image']['tmp_name']) || !is_uploaded_file ($_FILES['add-image']['tmp_name']))
			{
				$image = $_SESSION["img_path"];
			}
			else
			{
				$image = "item_images/" . basename($_FILES["add-image"]["name"]);
		  		$imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

	    		$check = getimagesize($_FILES["add-image"]["tmp_name"]);
	    		if( ($check !== false) && ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" || $imageFileType == "img" || $imageFileType == "webp")) {
		  		move_uploaded_file($_FILES["add-image"]["tmp_name"], $image);
	    		} 
				else 
				{
?>	
			<script>
				alert('File is not a image');
				window.location.href='itemAdd.php?id=<?php echo $id; ?>'
			</script>
<?php
	    		}
			}


					$con = mysqli_connect ("localhost","root","","it21351440","3306");
					if (!$con)
					{
						die("Sorry !!! we are facing mechanical issues..");
					}

					$sql = "INSERT INTO `product`(`category`, `name`, `price`, `description`, `discount`, `img_path`) VALUES ('".$category."','".$name."','".$price."','".$description."','".$discount."','".$image."');";

					if (mysqli_query($con,$sql))
					{
						alert("Item added successfully");
					}
					else
					{
						alert("OOPS!! , something is wrong , Please try again");
					}
		
		
	}
?>