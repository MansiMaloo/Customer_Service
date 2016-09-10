<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "timesaverz";

$con = mysqli_connect( $host, $user , $pass , $db );

if (mysqli_connect_errno())
 {
 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>
<script type="text/javascript">
	if(window.location.pathname == "/db.php")
	{	
		window.location='/index.php';			// To redirect if attempt made to directly access the file from browser
	}	
</script>