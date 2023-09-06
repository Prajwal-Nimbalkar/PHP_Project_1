<style>
.red
{
	color: red;
}
.orange
{
	color: orange;
}
h1
{
	margin-left: 450px;
}
</style>
<?php
$cnum=$_POST['cnum'];

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
$sql = "update booking set status='free' where bookid='$cnum'";
$result = $conn->query($sql);
if($result->rowcount()>0)
{
		echo "<h1 class='orange'>Updated Successfully!</h1>";	
}
else
{
	echo "<h1 class='red'>Invalid Information!</h1>";
}
?>