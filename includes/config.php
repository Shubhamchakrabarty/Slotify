<?php

ob_start();
session_start();
$timezone = date_default_timezone_set("Asia/Kolkata");
// $con = mysqli_connect("localhost", "root", "", "slotify");
$con = mysqli_connect("sql12.freemysqlhosting.net", "sql12384993", "lMzxgxl4xc", "sql12384993");
if (mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}
?>
