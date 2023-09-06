<?php
	
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$km = $_POST['km'];
	$km = (int)$km;
	$t = $km*15;
}
if(empty($t))
	{
		echo "15";
	}
	else
		echo $t;
?>