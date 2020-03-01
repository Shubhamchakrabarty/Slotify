<?php 

class Account
{

	private $con;
	private $errorArray;
	
	public function __construct($con)
	{
		$this->con = $con;
		$this->errorArray = array(); # code...
	}

	
    public function login($un, $pw)
	{
		$pw = md5($pw);
		$query = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$un' AND password = '$pw'");
		if (mysqli_num_rows($query) == 1) {
			return true; # code...
		}
		else {
			array_push($this->errorArray, Constants::$loginFailed);
			return false;
		}
	}
	
	public function register($un, $fn, $ln, $em, $em2, $pw, $pw2)
	{
		$this->validateUsername($un);
		$this->validateFirstName($fn);
		$this->validateLastName($ln);
		$this->validateEmails($em, $em2);
		$this->validatePasswords($pw, $pw2);

		if (empty($this->errorArray)) {
			//Insert into Db
			return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
		}
		else {
			return false;
		}
	}

	public function getError($error)
	{
		if (!in_array($error, $this->errorArray)) {
		 	$error = "";# code...
		 } 

		 return "<span class = 'errorMessage'>$error</span>";# code...
	}

	private function insertUserDetails($un, $fn, $ln, $em, $pw) {
		$encryptedPw = md5($pw);
		$profilePic = "assets/images/profile-pics/koalaprofilepic";
		$date = date("Y-m-d");
		$result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
		return $result;
	}

	private function validateUsername($un) {
		if (strlen($un) > 25 || strlen($un) < 5) {
			array_push($this->errorArray, Constants::$usernameCharacters);
			return; # code...

		}

		$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username = '$un'");
		if (mysqli_num_rows($checkUsernameQuery) != 0) {
			array_push($this->errorArray, Constants::$usernameTaken);
			return;
		}
		
		//TODO: Check if username already exists
	}

	private function validateFirstName($fn) {

		if (strlen($fn) > 25 || strlen($fn) < 2) {
			array_push($this->errorArray, Constants::$firstNameCharacters);
			return; # code...

		}

	}

	private function validateLastName($ln) {
		if (strlen($ln) > 25 || strlen($ln) < 2) {
			array_push($this->errorArray, Constants::$lastNameCharacters);
			return; # code...

		}
	
	}

	private function validateEmails($em, $em2) {

		if ($em != $em2) {
			array_push($this->errorArray, Constants::$emailsDoNotMatch);# code...
			return;
		}

		if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, Constants::$emailInvalid);# code...
			return;
		}

		$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email = '$em'");
		if (mysqli_num_rows($checkEmailQuery) != 0) {
			array_push($this->errorArray, Constants::$emailTaken);
			return;
		} //Check that email hasn't already been used
    }

	private function validatePasswords($pw, $pw2) {

		if ($pw != $pw2) {
			array_push($this->errorArray, Constants::$passwordsDoNotMatch);# code...
			return;
		}

		if (preg_match('/[^A-Za-z0-9]/', $pw)) {
			array_push($this->errorArray, Constants::$passwordNotAlphanumeric);# code...
		}

		if (strlen($pw) > 30 || strlen($pw) < 5) {
			array_push($this->errorArray, Constants::$passwordCharacters);
			return; # code...

		}
	
	}
}

?>