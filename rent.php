<style>
<style>
p
{
	color: red;
}
table
{
	background-color: #fff;
}
.pink
{
	background-color: #04aa6d;
	font-size: 20px;
}
th,td
{
	padding: 6.5px;  
	text-align: center;
	border: 1px solid black;
} 
table
{
	border-collapse: collapse;   
}
</style>

</style>
<?php
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
$sql = "select * from booking where status !='cancelled'";
$result=$conn->query($sql);
$cnt=$result->rowCount();
$amt=0;
echo "<div class='box3'>";
echo "<table border=1>
	<tr>
		<th>Customer Name</th>
		<th>Owner No</th>
		<th>Date</th>
		<th>Car No</th>
		<th>City</th>
		<th>Contact</th>
		<th>Kilometers</th>
		<th>Amount</th>
	</tr>";
foreach($result as $row)
{
	echo "<tr>
		<td>$row[0]</td>
		<td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td>$row[4]</td>
		<td>$row[5]</td>
		<td>$row[7]</td>
		<td>$row[6]</td>
	</tr>";
	$amt+=$row[6];
}
echo "<tr>
		<th colspan=7 class='pink'>TOTAL AMOUNT</th>
		<th class='pink'>$amt</th>
	</tr>";
	echo "</table>";
	echo "</div>";
?>