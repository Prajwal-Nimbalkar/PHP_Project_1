<html>
<head>
<style>
p
{
	color: red;
}
table
{
	background-color: #fff;
}
th,td
   {
	 padding: 10px;  
	 text-align: center;
	 border: 1px solid black;
   } 
   table
   {
	   border-collapse: collapse;
	   
   }
</style>
</head>
<body>
<?php
$avail=$_GET['avail'];
try
{
	$dbuser="root";
	$dbpass="1234";
	$host="localhost:3307";
	$dbname="phpdata";
	$conn = new PDO("mysql:host=$host;dbname=$dbname",$dbuser,$dbpass);
}
catch(Exception $e)
{
	echo "Error:".$e->getMessage()."<br>";
	die();
}
$sql = "select * from booking where status='$avail'";
$result=$conn->query($sql);
if($result->rowcount()>0)
{
	echo "<div class='box3'>";
	echo "<table border=1>
	<tr>
		<th>Customer Name</th>
		<th>Owner Reg No</th>
		<th>Date</th>
		<th>Car Reg No</th>
		<th>Booking Id</th>
		<th>Status</th>
	</tr>";
	while($row=$result->fetch())
	{
		echo "<tr>
				 <td>$row[0]</td>
				 <td>$row[1]</td>
				 <td>$row[2]</td>
				 <td>$row[3]</td>
				 <td>$row[9]</td>
				 <td>$row[8]</td>
	</tr>";
	}
	echo "</table>";
	echo "</div>";
}
else
{
	echo "result not found";
}
?>