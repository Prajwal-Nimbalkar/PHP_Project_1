<?php
$email = $_POST['t1'];
$pass = $_POST['t2'];
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
$sql = "select * from projectdata where email='$email' and password='$pass'";
$result = $conn->query($sql);
if($result->rowCount()>0)
{
	while($row=$result->fetch())
	{
		
	}
}
else
	echo "Username and Password not matched";
	$conn=null; 
?>