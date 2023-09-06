<?php
if($_SERVER['REQUEST_METHOD']=='GET')
{
	$a = $_GET['km'];
}
	$a = (int)$a;
	$t = $a*15;
	if(empty($t))
	{
		echo "15";
	}
	else
		echo $t;
?>