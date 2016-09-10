# Customer_Service
A customer  service call center application program where the logged in employees from particular regions attend customers of the particular region.
INFORMATION ABOUT THE FILES:

1."db.php"
	>This contains code for establishing database connectivity.
	>No direct access is provided to this file.
	>It is included in other files for mysql queries.

2."api.php"
	>This is the API file.
	>It contains class timesaverz with functions for :
		-Finding the geographical zone/node for respective circle codes.
		-Finding the customer care agents available for the respective zones.
	>It is included in other files to access the functionalities provided in it.

3."admin.php"
	>This contains login form for the various clients.
		-To log in:  USERNAME are jason,mike,sierra etc and the PASSWORD is password123. (already set in the database.)
		-The logged in users are displayed below.
		-All the users can be logged out together using the logoutall button.
	>There is a set occupied form to set the status of different users as occupied to decide which users would be free to attend a call.
		-The checked mark users are occupied.

4."index.php"
	>This is the file that accepts input as mobile no. and circle code and outputs the comma seperated list of available agents for particular circle(as asked in the problem statement).

HOW TO BEGIN:

>Log in using admin.php for various customer care agents.
>You can set the occupied status explictly.
>Switch to index.php.
>Enter the desired mob.no and circle code from the wiki codes mentioned in the problem statement.
>The page index.php will show the output as a comma seperated list of available customer care agents.
