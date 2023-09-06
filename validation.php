<?php
$a = $_POST['t1'];
if(isset($_POST['submit']))
{
if(strlen($a)<=8)
{
	echo "PLEASE ENTER THE USERNAME";
}
if(empty($_POST['t2']))
{
	echo "PLEASE ENTER THE PASSWORD";
}
}
?>
