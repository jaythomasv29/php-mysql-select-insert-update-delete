<?php//
//Use session object
session_start();

//Get the data posted from the form
//addslashes will escapse special characters, such as an apostrophe
$ShipperID	=$_POST["shipperID"];
$CompanyNAME	=addslashes($_POST["CompanyName"]);
$Phone			=addslashes($_POST["phone"]);

if(($ShipperID=="") || ($CompanyNAME=="") || ($_Phone==""))
{//Check for empty form values
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insert.php");
	exit;
}
else if(!is_numeric($ShipperID))
{// Make sure the shipperID is a number
	$_SESSION["errorMessage"] = "You must enter a number for ShipperID!";
	header("Location: insert.php");
	exit;
}
	else	
{ 
	//Everything is OK so far
		$_SESSION["errorMEssage"]="";	
}

//Open DB connection
//Wait until after potential redirects to open DB connection
include("includes/openDbConn.php");

//Prepare SQL statement - determine if ShipperID already exists in DB
$sql = "SELECT ShipperID FROM ShippersLab5 WHERE ShipperID=".$ShipperID;

//execute the SQL query and store the result of the execution into $result
$result = mysql_query($sql);

//Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))
	$num_results=0;
else	$num_results = mysql_num_rows($results);


//Check to see if ShipperID from form is already i FB
if($num_results != 0)
{
	$_SESSION["errorMessage"] = "The ShipperID you entered already exists!";
	header("Location: insert.php");
	exit;
}
else
{
	$_SESSION["errorMessage"] ="";
}

//Prepare SQL statement
$sql ="INSERT INTO ShippersLab5(ShipperID, CompanyName, Phone) VALUES(".$ShipperID." '".$CompanyName."', '".$Phone."')";

//execute the SQL query and store the result of the execution into $result
$result = mysql_query($sql);

//clean up
include("includes/closeDbConn.php");

//redirect to default
header("Location. select.php");
exit;
?>