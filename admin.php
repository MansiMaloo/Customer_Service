<?php
	require_once('db.php');

	if(!empty($_POST['submit']))
	{
		if( !empty( $_POST['username'] && $_POST['password'] ) )
		{
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$query = "select id, username from login where username = '$username' AND password =  '$password' " ; 
			$result = mysqli_query($con,$query);
			if(!$result)
				echo "Error : " . mysqli_error($con);
			else{
				$row = mysqli_fetch_array($result);
				$id = $row[0];
				mysqli_query($con,"update login set loggedin = 1 where id =  '$id' ");
			}
		}
	}
	if(!empty($_POST['logoutall'])){
		$query = " update login set loggedin = 0";
		$result = mysqli_query($con,$query);
		if(!$result)
			echo "Error : " . mysqli_error($con);
		else{
			echo "<script>alert('All Logged Out!');</script>";
		}
	}
	if(!empty($_POST['set']))
	{	
		$arr=$_POST['occupy'];
		$query="update login set occupied=0";
		$result = mysqli_query($con,$query);
		if(!$result)
		{
			echo "Error : " . mysqli_error($con);
		}
		
		foreach($arr as $occupy)
		{
			$query="update login set occupied=1 where username='$occupy'";
			$result = mysqli_query($con,$query);
			if(!$result)
				echo "Error : " . mysqli_error($con);
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css"/> 
	<title></title>
</head>
<body>
	<?php 
		echo "<br><br>";
		echo "<h4 style='text-align:center;'>Login Customer Agent </h4> <br>";
		echo "<form method='POST' align='center' action='admin.php'>";						//Login for the customer agents
		echo "<label for='username'>Enter Username : </label>";
		echo "<input type='text' name='username' placeholder='Username'/><br><br>";
		echo "<label for='password'>Enter Password : </label>";
		echo "<input type='password' name='password'  placeholder='Password'/><br><br>";
		echo "Example : Username : john , Password : password123 || Username : jason , Password : password123 <br><br>";
		echo "<input type='submit' name='submit'/>";
		echo "</form>";
		echo "<br>";
		
		echo "<ul>";
		echo "<h4 style='text-align:center;'>All Logged In Users are:</h4> <br>";
		
		$query = "select username from login where loggedin = 1 "; 
		$result = mysqli_query($con,$query);
		if(!$result)
			echo "Error : " . mysqli_error($con);
		else{
			while($row=mysqli_fetch_array($result))
			{
				echo "<li align='center'><\\>$row[0]</li>" . "<br>";
			}
			
		}
		echo "</ul>";
			
		echo "<form method='POST' align='center' action='admin.php'>";						// Logging out all the agents
		echo "<input type='submit' name='logoutall' value='Logout all'/>";
		echo "</form>";
		echo "<br><br>";

	?>

	<?php
	echo "<form action='admin.php' align='center' method='POST'>";							// Setting occupied status for the agents
	echo "<h3>SET OCCUPIED</h3>";	
	$query="select username,occupied from login where loggedin=1 ";
	$result = mysqli_query($con,$query);
		if(!$result)
			echo "Error : " . mysqli_error($con);
		else{
			echo "<div style='text-align:left; margin-left:47%;'>";
			while($row=mysqli_fetch_array($result))
			{
				echo "<p><input type='checkbox' name='occupy[]' value='$row[0]'"; 			// Printing the names to be checked for setting occupied
				if($row[1]==1)
					echo "checked";
				echo "/> $row[0]</p>";
			}
			echo "</div>";
		}
	echo "<br><input type='submit' value='Set occupied' name='set'>";
	echo "</form>";
	echo "<br>";
	?>
</body>
</html>
<?php mysqli_close($con);?>