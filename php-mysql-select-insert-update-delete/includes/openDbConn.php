<?php
//Connect to MySQL from PHP
//Open DB connection and select DB to use
//The "@" bypasses the usual PHP error handling, so you get to deal with a 
//failure return from pconnect yourself in the if statement below.
//If you leave off the '@' then any errors will automatically be thrown
@ $db = mysqli_connect("localhost", "cgt356web1z", "Tradings1z5747"); //webserver called local host with login
mysqli_select_db($db, "cgt356web1z") or die(mysqli_error());

// check to see if connection was successful
if(!$db)
{
	echo "Error: Could not connect to database.  Please try again later.";
	exit;
}

?>