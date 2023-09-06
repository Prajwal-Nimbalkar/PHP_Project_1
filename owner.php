<style>
.alert
{
	color: red;
	margin-top: 20px;
	margin-left: 350px;
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
$age=$_POST['age'];
$vnum=$_POST['vnum'];
$cnt=$_POST['cnt'];
$city=$_POST['city'];
$lno=$_POST['lno'];

$ownerno = rand(1000,9000);

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
$flag=0;

//OWNER NAME VALIDATION
if(!preg_match("/^([A-Za-z' ])+$/",$name))
{
	echo "<h1 class='alert'>Invalid Name Format!</h1>";
}
else
{
	$flag = 1;
}

if($flag==1)
{
	if($age>=18)
	{
		if(preg_match('/^[0-9]+$/',$age))
		{
			$flag = 2;
		}
		else
		{
			echo "<h1 class='alert'>Age Cannot Contain Special Symbols and Alphabets!</h1>";
		}
	}
	else
		echo "<h1 class='alert'>Age of Driver Cannot Be Less Than 18!</h1>";
}

//VEHICLE NUMBER VALIDATION
if($flag==2)
{
	$sql1 = "select * from vehicle where car_reg_num='$vnum'";
	$result1=$conn->query($sql1);
	if($result1->rowcount()>0)
	{
		$flag=3;
	}
	else
	{
		echo "<h1 class='alert'>Vehicle Number Does Not Exist!<h1>";
	}
}

//MOBILE NUMBER VALIDATION
if($flag==3)
{
	if((strlen($cnt)==10))
	{
		if(preg_match('/^[0-9]+$/',$cnt))
		{
			$flag = 4;
		}
		else
		{
			echo "<h1 class='alert'>Mobile Number Cannot Contain Special Symbols and Alphabets!</h1>";
		}
	}
	else
		echo "<h1 class='alert'>Mobile Number Cannot Less Than 10 Numbers!</h1>";
}


//LICENSE NUMBER VALIDATION
if($flag==4)
{
	$sql3 = "select * from owner where license='$lno'";
	$result3=$conn->query($sql3);
	if($result3->rowcount()>0)
	{
		echo "<h1 class='alert'>License Number Already Present!</h1>"."<br>";
	}
	else
	{
		$flag=5;
	}
}



//DRIVING LICENSE VALIDATION
if($flag==5)
{
	if(!preg_match("/^[A-Z]{2}[0-9]{2}[\\ ][0-9]{11}$/",$lno))
	{
		echo "<h1 class='alert'>Invalid Driving License Format!</h1>";
	}
	else
	{
		$flag = 6;
	}
}

//INSERTION OF VEHICLE INFORMATION
if($flag==6)
{
	$sql2 = "insert into owner values('$name','$vnum','$cnt','$city','$lno','$ownerno','$age')";
	$conn->query($sql2);

	echo "<h1>Registration Done Successfully!"."<br>";
	echo "Owner Registration Number=".$ownerno;
	echo"</h1>";
}
?>