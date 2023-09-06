<html>
<head>
<style>
.box3
{
	margin-left: 450px;
}
th{
	text-align: left;
	vertical-align: middle;
	background-color: lightpink;
	font-size: 20px;
}
td,.sign
{
	font-size: 18px;
	background-color: yellow;
	font-weight: bold;
}
.b{
	text-align: center;
	padding-top: 20px;
	background-color: #D3D3D3;
}
h1
{
	color: red;	
}
.bill
{
	color: red;
	margin-left: 450px;
	background-color: #FFFF00;
	padding: 20px;
	width: 355px;
}
.amt
{
	background-color: orange;
}
.sign
{
	background: url("/semproject1/sign.jpg");
    background-size: cover;
    background-position: center;
}
th,td
   {
	 padding: 10px;  
	 text-align: center;
	 //border: 1px solid black;
	 background-color: white;
   } 
   table
   {
	   border-collapse: collapse;
	   
   }
   body
   {
	   background-color: #344a72;
   }
</style>
</head>
<body>
<?php
$name=$_POST['name'];

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
$sql = "select * from booking where bookid='$name'";
$result = $conn->query($sql);
if($result->rowcount()>0)
{
	echo "<div class='box3'>";
	echo "<table border=1>
	<tr>
	<th colspan=2 class='b'><h1>GORENT</th></th>
	</tr>";
	while($row=$result->fetch())
	{
		
		echo "<tr height=40px><th>Customer Name:</th><td>$row[0]</td></tr>";
		echo "<tr height=40px><th>Owner Registration Number:</th><td>$row[1]</td></tr>";
		echo "<tr height=40px><th>Date:</th><td>$row[2]</td></tr>";
		echo "<tr height=40px><th>Car Registration Number:</th><td>$row[3]</td></tr>";
		echo "<tr height=40px><th>City:</th><td>$row[4]</td></tr>";
		echo "<tr height=40px><th>Contact:</th><td>$row[5]</td></tr>";
		echo "<tr height=40px><th>Kilometers:</th><td>$row[7]</td></tr>";
		echo "<tr height=40px><th>Sign: Prajwal S Nimbalkar</th><th class='sign'></th></tr>";
		echo "<tr height=40px><th class='amt'>Amount:</th><th class='amt'>$row[6]</th></tr>";
	}
	echo "</table>";	echo "</div>";
}
else
{
	echo "<h1 class='bill'>OOps!Invalid Booking ID</h1>";
}
?>