<style>
h1{
	color: red;
	margin-left: 500px;
	width: 260px;
	background-color: orange;
}
</style>
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
if(empty($email) || empty($pass))
{
	echo "Enter Username or Password!";
}
else
{
	if(isset($email) && isset($pass))
{
	$sql2 = "select * from admin where email='$email' and password='$pass'";
	$result2 = $conn->query($sql2);
	if($result2->rowCount()>0)
	{
		header("Location:admin.html");
	}
	
	
	$sql = "select * from projectdata where email='$email'";
	$result = $conn->query($sql);
	if($result->rowCount()>0)
	{
		$sql1 = "select * from projectdata where email='$email' and password='$pass'";
		$result1 = $conn->query($sql1);
		if($result1->rowCount()>0)
		{
			header("Location:home.php");
		}
		else
			echo "<h1>Invalid Password!</h1>";
	}
	else
		echo "<h1>Invalid Username!</h1>";				
}
}
?>