<?php 

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '';
$db['db_name'] = 'cms';

foreach($db as $key => $value){
	define(strtoupper($key),$value);
}

$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)or die ("could not connect to mysql");
if(!$connect){
	echo "Error in connecting to database";
}

?>