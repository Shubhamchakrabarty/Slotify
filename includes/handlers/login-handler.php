<?php

if (isset($_POST['loginButton'])) {
	//echo "The login button was pressed"; # code...
    $username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	//CALL LOGIN FUNCTION
	$result = $account->login($username, $password);
	if ($result) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: index.php"); # code...
	} 
}

?>
