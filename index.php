<?php 
require_once('api.php');							// Including the API
require_once('db.php');								// Including Database connectivity

$yes = new timesaverz();							// Instance of class in the API : Calling the API


?>

<!DOCTYPE html>
<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css"/> 
	</head>
	<body>
		<br>
		<h3 style="text-align:center;"> Enter Phone Number & Circle Code   </h3>
		<form align='center' method='post' action='index.php'>
		<?php
		echo"<br><br>";
		echo "<label for='mob'>Mobile : </label>";
		echo "<input type='text' name='mob' maxlength=11 placeholder='Enter mobile no.'><br><br>";
		echo "<label for='circle'>Circle : </label>";
		echo"<input type='text' name='circle' placeholder='Enter circle'><br><br>";
		echo "(Example : 7229966207 , MH) <br><br>";
		echo"<input type='submit' value='Connect' name='submit'><br>";

		
	
	?>
	<form>
	</body>
</html>
<?php
if(!empty($_POST["submit"]))
		{
			if(!empty($_POST["mob"] && $_POST["circle"]))
			{
				$mob=$_POST["mob"];
				$circle=$_POST["circle"];
				$zone = $yes->setzone($circle);			     // Settting Zone for the instance  
				$yes->getavailableagents($yes->zone,$con);	//	Gettting Available Agents for the Phone Number and Circle code  
			}

		}

?>