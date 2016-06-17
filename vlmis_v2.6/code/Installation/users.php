<?php
$db_serverType = $_GET['server'];
$db_serverIP = $_GET['otherServerIP'];
$db_username = $_GET['db_username'];
$db_password = $_GET['db_password'];
$db_name = $_GET['db_name'];

if($db_serverType == "localhost")
{
	$con = mysqli_connect("127.0.0.1",$db_username,$db_password,$db_name);
}
else
{
	$con = mysqli_connect($db_serverIP,$db_username,$db_password,$db_name);
	
}

$users_file = 'scripts/users.sql';

$templine = '';
$lines = file($users_file);

foreach ($lines as $line)
{
	if(substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 2) == '/*')
		continue;
	
	$templine .= $line;
	
	if(substr(trim($line), -1, 1) == ';')
	{
		mysqli_query($con,$templine) or print ('Error performing query \'<strong>'.$templine . '\': ' . mysql_error() . '</strong><br/><br/>');
		$templine = '';
	}
}

mysqli_close($con);
echo "Database Established Successfully!";
?>