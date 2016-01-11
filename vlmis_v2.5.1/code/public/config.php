<?php
error_reporting(0);

$host = 'localhost';
$user = 'vlmisr2user';
$pass = 'Q9f3GMeiP';
$db = 'vlmisr2';
$conn = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($db, $conn);