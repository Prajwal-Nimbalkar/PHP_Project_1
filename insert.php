<style>
h1{
	color: red;
	margin-left: 500px;
	width: 400px;
	background-color: orange;
}
</style>
<?php
$email = $_POST['t1'];
$pass = $_POST['t2'];
$conpass = $_POST['t3'];

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
if(isset($email) && isset($pass))
{
	if(filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		if(preg_match('/@[a-zA-Z0-9]/',$pass) && preg_match('/@[a-zA-Z0-9]/',$conpass))
		{
			if($pass===$conpass)
			{
				$sql = "insert into projectdata values('$email','$pass')";
				$result = $conn->query($sql);
				if($result->rowCount()>0)
				{
						header("Location:home.php");	
				}	
			}
			else
				echo "<h1>Password Not Matched!<h1>";
		}
		else
			echo "<h1>Invalid Password Format!</h1>";
	}
	else
		echo "<h1>Invalid Username Format!</h1>";	
}
?>