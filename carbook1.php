<style>
h1
{
	color: red;
	margin-left: 400px;
	width: 500px;
}
.book
{
	color: green;
	margin-left: 400px;
	width: 500px;
}
</style>
<?php
			
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$cname= $_POST['cname'];
	$onum= $_POST['onum'];
	$date= $_POST['date'];
	$cnum= $_POST['cnum'];
	$city= $_POST['city'];
	$cnt= $_POST['cnt'];
	$km = $_POST['km'];
	$km = (int)$km;
	$t = $km*15;

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

$flag = 0;
if(!preg_match("/^([A-Za-z' ])+$/",$cname))
{
	echo "<h1 class='alert'>Invalid Name Format!</h1>";
}
else
{
	$flag = 1;
}

if($flag==1)
{
	$sql1 = "select * from owner where own_no='$onum'";
	$result1=$conn->query($sql1);
	if($result1->rowcount()>0)
	{
		$flag=2;
	}
	else
	{
		echo "<h1 class='alert'>Owner Number Does Not Exist!<h1>";
	}
}

if($flag==2)
{
	$sql1 = "select * from owner where vnum='$cnum'";
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
		echo "<h1 class='alert'>Mobile Number Cannot Be Less Than 10 Numbers!</h1>";
}

if($flag==4)
{
		if(preg_match('/^[0-9]*$/',$km))
		{
			$flag = 5;
		}
		else
		{
			echo "<h1 class='alert'>Invalid Kilometer Format!</h1>";
		}
}

if($flag==5)
{
	$d = date("Y-m-d");
	$date3=date_create($d);
	$date1=date_create($date);
	$date2=date_diff($date1,$date3);
	if($date2->invert==1)
	{
		$flag=6;
	}
	else
		echo "<h1>Please Select Futute Date!Past Dates Are Not Allowed!</h1>";
}


if($flag==6)
{
	$sql5 = "select * from owner where own_no='$onum' and vnum='$cnum' and city='$city'";
	$result5=$conn->query($sql5);
	if($result5->rowcount()>0)
	{
		$sql3 = "select * from booking where ownno='$onum' and carno='$cnum' and date='$date' and status='booked'";
		$result3=$conn->query($sql3);
		if($result3->rowcount()>0)
		{
			echo "<h1>Car Is Already Booked On This Date!</h1>";
		}
		else
		{
			$sql2 = "insert into booking (cname,ownno,date,carno,city,contact,amount,kilometers,status) values('$cname','$onum','$date','$cnum','$city','$cnt','$t','$km','booked')";
			$result2=$conn->query($sql2);
			if($result2->rowcount()>0)
			{
				echo "<h1 class='book'>Car Booked Successfully!<h1>";
				$flag=7;
			}
		}
	}
	else
	{
		echo "<h1>This Car Is Not Available On This Location!Please Select Another Car!";
	}
}


if($flag==7)
{
	$sql4= "select * from booking where cname='$cname'";
	$result4=$conn->query($sql4);
	foreach($result4 as $row)
	{
		echo "<h1 class='book'>Booking ID:<td>$row[9]</td></h1>";
	}
}
}	
?>