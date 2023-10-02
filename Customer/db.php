<?php

$connection = mysqli_connect("localhost",'root','','bms');

if(!$connection) {
	die("Unable to connect" . mysqli_error($connection));
}

?>