<?php
class timesaverz
{	
	public $zone;						// Stores the zone for the circle code

	public  function setzone($var)		// Function to set the zone
	{	
		$var = strtoupper($var);
		if ($var=="KL"|| $var=="CH" || $var=="TN" || $var=="KA")
			$this->zone="bengaluru";
		
		if ($var=="AP"|| $var=="AS" || $var=="NE" || $var=="OR" || $var=="WB" ||$var=="KO")
			$this->zone="kolkata";
		
		if ($var=="MH"||$var=="MP"||$var=="MU"||$var=="GJ"||$var=="RJ")
			$this->zone="mumbai";
		
		if ($var=="DL"||$var=="HP"||$var=="HR"||$var=="JK"||$var=="PB"||$var=="UE"||$var=="UW")
			$this->zone="delhi";
		
		return $this->zone;	
	} 

	public function getavailableagents($zone,$con)		// Function to find the agents
	{	
		$query = "select username from login where zone = '$zone' and loggedin = 1 and occupied = 0"; 
		$result = mysqli_query($con,$query);
		if(!$result)
			echo "Error : " . mysqli_error($con);
		else
		{	
			echo "<br>Available agents at $zone are : &nbsp; &nbsp; &nbsp; ";
			while($row = mysqli_fetch_array($result))
			{	
				echo "$row[0] ,";
			}

		}
	}

}

?>
<script type="text/javascript">
	if(window.location.pathname == "/api.php")
	{	
		window.location= '/index.php';			// To redirect if attempt made to directly access the file from browser
	}	
</script>