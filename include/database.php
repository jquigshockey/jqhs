<?php
//Connect to Database
$db_host = 'localhost';
$db_name = 'jqhs';
$db_user = 'jqhs';
$db_pass = 'cXTfwmxHqiBenQQJ';

//Create mysqli Object
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);

//Error Handler
if(mysqli_connect_errno()){
	echo 'This Connection Failed'. mysqli1_connect_error();
	die();
}
?>