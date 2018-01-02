<?php//
//Use session object
session_state();

//Open DB connection
include("includes/openDbConn.php");

//Get the data posted from the form
//addslashes will escape special characters, such as an apostrophe
$ShipperID		=$_POST["shipperID"];
$CompanyName	=addslashes($_POST["companyName"]);
$Phone			=addslashes($_POST["phone"]);

//If shipperID is empty, somebody typed this page into the URL, redirect them.
if(empty($ShipperID))
	header("Location: select.php");

//Prepare SQL statement
$sql ="UPDATE ShippersLab5 SET CompanyName='".$CompanyName."', Phone='".$Phone."' WHERE ShipperID=".$ShipperID;

//execute the SQL query and store the result of the execution into $result
$result = mysql_query($sql);

//clean up
include("includes/closeDbConn.php");

//redirect to default
header("Location: select.php");
?>
