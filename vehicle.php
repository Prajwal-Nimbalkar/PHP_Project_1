<style>
.alert
{
	color: red;
	margin-top: 20px;
	margin-left: 380px;
}
h1
{
	color: green;
	margin-top: 20px;
	margin-left: 450px;
}
</style>
<?php
$name=$_POST['name'];
$cnum=$_POST['car_num'];
$company=$_POST['company'];
$model=$_POST['model'];
$date=$_POST['date'];
$status=$_POST['status'];

$car_reg_no = rand(1000,9000);
$flag = 0;
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

//CAR NUMBER VALIDATION
if(!preg_match("/^[A-Z]{2}[\\ -]{1}[0-9]{2}[\\ ''        -]{1}[A-Z]{1,2}[\\ -]{1}[0-9]{4}$/",$cnum))
{
	echo "<h1 class='alert'>Invalid Car Number Format!</h1>";
}
else
{
	$flag = 1;
}

//COMPANY NAME VALIDATION
if($flag==1)
{
	if(!preg_match('/^[A-Za-z]*$/',$company))
	{
		echo "<h1 class='alert'>Invalid Company Name Format!</h1>";
	}
	else
	{
		$flag = 2;
	}
}
//MODEL NAME VALIDATION
if($flag==2)
{
	if(!preg_match('/^[A-Za-z0-9]*$/',$model))
	{
		echo "<h1 class='alert'>Invalid Model Name Format!</h1>";
	}
	else
	{
		$flag = 3;
	}
}

//INSERTION OF VEHICLE INFORMATION
if($flag==3)
{
	$sql1 = "select * from vehicle where car_num='$cnum'";
	$result1=$conn->query($sql1);
	if($result1->rowcount()>0)
	{
		echo "<h1 class='alert'>Car Of That Number Is Already Present!<h1>";
	}
	else
	{
		$sql = "insert into vehicle values('$name','$cnum','$company','$model','$date','$car_reg_no','$status')";
		$conn->query($sql);

		echo "<h1>Registration Done Successfully!<h1>";
		echo "<h1 class='cno'>Car Registration Number=".$car_reg_no;
		echo "</h1>";
	}
}
?>