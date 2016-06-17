<?php

$db_serverType = $_GET['server'];
$db_serverIP = $_GET['otherServerIP'];
$db_username = $_GET['db_username'];
$db_password = $_GET['db_password'];
$db_name = $_GET['db_name'];

$filePath = '../application/configs/application.ini';

if(file_exists($filePath))
{
	if(!unlink($filePath))
	{
		echo "Unable to delete file\nPlease check write permission of the application foler";
	}
}

if($db_serverType == "localhost")
{
	$db_serverIP = 'localhost';
}

$configFile = fopen("application.ini", "r") or die("Unable to open file!");
$newConfigFile = fopen($filePath, "w+") or die("Unable to open file!");
$templine = '';
while(!feof($configFile))
{
	$templine = fgets($configFile);
	if(strpos($templine,"doctrine.db.host"))
	{
		$templine = "doctrine.db.host = \"".$db_serverIP."\"" . PHP_EOL;
	}
	elseif(strpos($templine,"doctrine.db.user"))
	{
		$templine = "doctrine.db.user = \"".$db_username."\"". PHP_EOL;
	}
	elseif(strpos($templine,"doctrine.db.password"))
	{
		$templine = "doctrine.db.password = \"".$db_password."\"". PHP_EOL;
	}
	elseif(strpos($templine, "doctrine.db.dbname"))
	{
		$templine = "doctrine.db.dbname = \"".$db_name."\"". PHP_EOL;
	} elseif(strpos($templine,"doctrine_read.db.host"))
	{
                $templine = "doctrine_read.db.host = \"".$db_serverIP."\"" . PHP_EOL;
	}
	elseif(strpos($templine,"doctrine_read.db.user"))
	{
                $templine = "doctrine_read.db.user = \"".$db_username."\"". PHP_EOL;
	}
	elseif(strpos($templine,"doctrine_read.db.password"))
	{
                $templine = "doctrine_read.db.password = \"".$db_password."\"". PHP_EOL;
	}
	elseif(strpos($templine, "doctrine_read.db.dbname"))
	{
                $templine = "doctrine_read.db.dbname = \"".$db_name."\"". PHP_EOL;
	}	
	fwrite($newConfigFile, $templine);
	$templine = '';
}

fclose($configFile);
fclose($newConfigFile);
echo "Application File created successfully"

?>