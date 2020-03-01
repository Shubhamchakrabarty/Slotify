<?php

ob_start();
session_start();
$timezone = date_default_timezone_set("Asia/Kolkata");
// $con = mysqli_connect("localhost", "root", "", "slotify");
$con = mysqli_connect("ec2-18-213-176-229.compute-1.amazonaws.com", "pydtmzcnfiyxma", "448dd48361c31d79afa238b5dd539aba7fa08415b41625fa4f27c8bb2459b2fb", "d70duhgtd7sk7k");
if (mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect_errno();
}
?>