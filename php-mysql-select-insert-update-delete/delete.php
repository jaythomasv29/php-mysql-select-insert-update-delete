<?php//
//Use session object
session_start();

//Open DB connection
include("includes/openDbConn.php");

//Prepare SQL statement
$sql = "DELETE FROM ShippersLab5 WHERE ShipperID=2";

//execute the SQL query and store the results
$results = mysql_query($sql);

//clean up
include("includes/closeDbConn.php");

//redirect to default
header("Location: select.php");
?>