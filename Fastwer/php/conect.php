<?php

define('DB_NAME', 'fastwer_db');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);


if(!$con){
    die('Could not connect : ' . mysqli_error());
}

$db_selected = mysqli_select_db($con,DB_NAME);

if(!$db_selected){
    die('Can\'t use' . DB_NAME . ': ' . mysqli_error());
}

?>