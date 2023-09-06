<style>
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
   h3
   {
	   text-align: center;
	   color: red;
   }
</style>
<?php
$cname= $_GET['cname'];

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

if(isset($_GET['loc']))
{
	$loc= $_GET['loc'];
$sql = "select owner.name,owner.age,owner.contact,owner.city,owner.license,owner.own_no,vehicle.name,vehicle.car_num,vehicle.company,vehicle.date,vehicle.car_reg_num from owner,vehicle where vehicle.name='$cname' and owner.vnum=vehicle.car_reg_num and owner.city='$loc'";
$result=$conn->query($sql);
if($result->rowcount()>0)
{
	echo "<div class='box3'>";
	echo "<table border=1>
	<tr>
<th>Name</th><th>Age</th><th>Contact</th><th>City</th><th>License</th><th>Car Reg No</th><th>Owner Reg No</th><th>Carname</th><th>Car No</th><th>Company</th><th>Date
</th>
	</tr>";
	while($row=$result->fetch())
	{
		echo "<tr>
<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]
</td><td>$row[10]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td>
	</tr>";
	}
	echo "</table>";
	echo "</div>";
}
else
{
	echo "<h3>Sorry!Brezza Is Not Available On This Location.</h3>";
}
}

if(isset($_GET['loc1']))
{
	$loc1= $_GET['loc1'];
$sql1 = "select owner.name,owner.age,owner.contact,owner.city,owner.license,owner.own_no,vehicle.name,vehicle.car_num,vehicle.company,vehicle.date,vehicle.car_reg_num from owner,vehicle where vehicle.name='$cname' and owner.vnum=vehicle.car_reg_num and owner.city='$loc1'";
$result1=$conn->query($sql1);
if($result1->rowcount()>0)
{
	echo "<div class='box3'>";
	echo "<table border=1>
	<tr>
<th>Name</th><th>Age</th><th>Contact</th><th>City</th><th>License</th><th>Car Reg No</th><th>Owner Reg No</th><th>Carname</th><th>Car No</th><th>Company</th><th>Date
</th>
	</tr>";
	while($row=$result1->fetch())
	{
		echo "<tr>
<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]
</td><td>$row[10]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td>
	</tr>";
	}
	echo "</table>";
	echo "</div>";
}
else
{
	echo "<h3>Sorry!Swift Is Not Available On This Location.</h3>";
}
}


if(isset($_GET['loc2']))
{
	$loc2= $_GET['loc2'];
$sql2 = "select owner.name,owner.age,owner.contact,owner.city,owner.license,owner.own_no,vehicle.name,vehicle.car_num,vehicle.company,vehicle.date,vehicle.car_reg_num from owner,vehicle where vehicle.name='$cname' and owner.vnum=vehicle.car_reg_num and owner.city='$loc2'";
$result2=$conn->query($sql2);
 if($result2->rowcount()>0)
{
	echo "<div class='box3'>";
	echo "<table border=1>
	<tr>
<th>Name</th><th>Age</th><th>Contact</th><th>City</th><th>License</th><th>Car Reg No</th><th>Owner Reg No</th><th>Carname</th><th>Car No</th><th>Company</th><th>Date
</th>
	</tr>";
	while($row=$result2->fetch())
	{
		echo "<tr>
<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]
</td><td>$row[10]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td>
	</tr>";
	}
	echo "</table>";
	echo "</div>";
}
else
{
	echo "<h3>Sorry!Verna Is Not Available On This Location.</h3>";
}
}
?>
