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
/*$sql="select * from booking,vehicle where booking.bookid='$name'";
$result=$conn->query($sql);*/

	$sql1 = "update booking set status='cancelled' where bookid='$name'";
	$result=$conn->query($sql1);
	if($result->rowcount()>0)
	{
	
	echo "<h1 class='orange'>Booking Cancelled Successfully!</h1>";
	}
	else
	{
		echo "<h1 class='red'>Invalid Information!</h1>";
	}
?>