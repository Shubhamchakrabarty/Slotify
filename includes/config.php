<?php

ob_start();
session_start();
$timezone = date_default_timezone_set("Asia/Kolkata");
// $con = mysqli_connect("localhost", "root", "", "slotify");
$con = mysqli_connect("remotemysql.com", "47TgZdCgwP", "pdk2bdzAri", "47TgZdCgwP");
if (mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}
?>