<?php//
session_start();//allows session variables

include("includes/openDbConn.php");

//This file is validating as HTML5
//You need to use an HTML5 validator to check yout code
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>	
	<meta charset="utf-8" />
	<title>Assign05 - Select</title>
</head>

<body>

<?php	
	//Create the SQL query //Prepare SQL statement
$sql = "SELECT EmployeeID, LastName, FirstName, Title FROM Employeeslab5";

//execute the SQL query and store the result of the execution into $result
$result      = mysqli_query($db, $sql); //used to send SQL statement to database and stores result at $result

//Check to see if there are records in the result, if not set the number of results = 0
if(empty($result))//if the number of rows queried 
	$num_results = 0;
else
	$num_results = mysqli_num_rows($result);//if not empty, it will count number of rows queried
?>

<h1 style="text-align:center;">Assign05 - Select</h1>
<?php
	include("includes/menu.php");
?>
<div style="font-style:italic; text-align: center; font-size: 9px;">this set of pages valides as HTML5 compliant <br />&nbsp;</div>
 
 <table style="border:0px; width:500px; padding:0px; margin:0px auto; border-spacing:0px;" title="listing of Employees">
 	<thead>
 		<tr>
 			<th colspan="4" style="font-weight:bold; background-color:#b1946c; text-align:center; text-decoration:underline;">EmployeesLab 5 Table</th>
 		</tr>
 		<tr>
 			<th style="background-color:#b1946c; font-weight:bold">EmployeeID</th>
  			<th style="background-color:#b1946c; font-weight:bold">LastName</th>
 			<th style="background-color:#b1946c; font-weight:bold">FirstName</th>
 			<th style="background-color:#b1946c; font-weight:bold">Title</th>
 		</tr>
 	</thead>
 	<tfoot>
 		<tr>
 			<td colspan="4" style="text-align:center; font-style:italic;">Information pulled from the northwind database</td>
 		</tr>
 	</tfoot>
 	<tbody>
 	
 		<?php
//Loop through the results
for($i=0; $i < $num_results; $i++)
{
	//store a single record into $row 
	$row = mysqli_fetch_array($result);

	//below: always, ALWAYS use trim() on data pulled from a database
 		?>
 		<tr>
 			<td style="border-right:1px solid #000000;"><?php echo trim($row["EmployeeID"]); ?></td>
 			<td style="border-right:1px solid #000000;"><?php echo trim($row["LastName"]); ?></td>
 			<td style="border-right:1px solid #000000;"><?php echo trim($row["FirstName"]); ?></td>
 			<td><?php echo trim($row["Title"]); ?></td>
		</tr>
 			<?php
		}
		?>	
 	</tbody>
 </table>

	<p>&nbsp;</p>

<?php
	//Prepare SQL statement
	$sql = "SELECT ShipperID, CompanyName, Phone FROM ShippersLab5";
	
	//execute the SQL query and store the result of the execution into $result
	$result = mysqli_query($db, $sql);
	
	//Check to see if there are records in the result, if not set the number of results = -
	if(empty($results))
		$num_results = 0;
	else
		$num_results = mysql_num_rows($results);
	?>
	
	<table style="border:0px; width:500px; padding:0px; margin:0px auto; border-spacing:0px;" title="Listing of Shippers">
		<thead>
			<tr>
				<th colspan="3" style="background-color:#b1946c; font-weight:bold; text-align:center; text-decoration:underline;">ShippersLab5 Table</th>
			</tr>
			<tr>
				<th style="background-color:#b1946c; font-weight:bold">ShipperID</th>
				<th style="background-color:#b1946c; font-weight:bold">CompanyName</th>
				<th style="background-color:#b1946c; font-weight:bold">Phone</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3" style="text-align:center; font-style:italic;">Information pulled from the northwind database</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
			//Loop through the results
			for($i=0; $i < $num_results; $i++)
			{
				//store a single record into $row
				$row = mysql_fetch_array($result);
				
				//below: always ALWAYS use trim() on data pulled from the database
				?>
				<tr>
					<td style="border-right:1px solid #000000;"><?php echo trim($row["ShipperID"]); ?></td>
					<td style="border-right:1px solid #000000;"><?php echo trim($row["CompanyName"]); ?></td>
					<td><?php echo trim($row["Phone"]); ?></td
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	
	<?php
	//clean up
	mysqli_free_result($result);//??????????
	include("includes/closeDbConn.php"); //close database connection
	?>
	
	</body>
	</html>
	