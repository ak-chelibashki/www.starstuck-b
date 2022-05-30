<?php
/* 
	Process a sign in request, checking a user's password.
*/
ini_set('session.use_strict_mode', 1);
session_start();

require 'database.php';

// if there is an existing session user, remove it
if (isset($_SESSION['userName'])) {
	unset($_SESSION['userName']);
	unset($_SESSION['adminLevel']);
}

// unset any previous error message
unset($_SESSION['errorMsg']);

// check the form contains all the post data
if (!(isset($_POST['userName']) &&
	  isset($_POST['pw']))) {
	header('location:index.php');
	exit();
}

// recover the form data
$userName = trim($_POST['userName']);
$password = trim($_POST['pw']);

// validate the username
if (!preg_match('/^[A-Z][A-Za-z]{1,29}$/', $userName)) {
	$_SESSION['errorMsg'] = "Unexpectedly illegal username!";
	header('location:index.php');
	exit();
}

// all the data is present and valid

// connect to the database
if (!connectToDb('starstuck')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:index.php');
	exit();
}

// after this point we have an open DB connection

// check the user exists and is unique
$userName = sanitizeString($userName);
$sqlQuery = "SELECT Password, AdminLevel, Status FROM Users WHERE UserName='$userName'";
$result = $dbConnection->query($sqlQuery);
if ($result->num_rows != 1) {
	closeConnection();
	if ($result->num_rows == 0) {
		$_SESSION['errorMsg'] = "User name not recognized";
	}
	else {
		$_SESSION['errorMsg'] = "Sorry - unexpected problem with the database";
	}
	header('location:index.php');
	exit();
}

// we have a unique user

// get the expected answer from the db
$row = $result->fetch_assoc();

// check the account status
$status = $row['Status'];
if ($status < 1) {
	closeConnection();
	$_SESSION['errorMsg'] = "This account is disabled";
	header('location:index.php');
	exit();
}

// recover the account data
$pwHash = $row['Password'];
$adminLevel = $row['AdminLevel'];
closeConnection();

// check the supplied password is correct
if (!password_verify($password, $pwHash)) {
	$_SESSION['errorMsg'] = "Incorrect password! Please try again...";
	$adminLevel = 0;
}
else {
	// valid user name with a correct password
	$_SESSION['userName'] = $userName;
	$_SESSION['adminLevel'] = $adminLevel;
	unset($_SESSION['errorMsg']);
}

// everything worked, update the session info
header('Location:index.php');
?>