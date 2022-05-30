<?php
/* Register for an account on the site.

   This page expects to receive a registration form via a post request. 
   
*/
ini_set('session.use_strict_mode', 1);
session_start();

require 'database.php';

// if there is an existing session user, remove it
if (isset($_SESSION['userName'])) {
	unset($_SESSION['userName']);
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
$name = trim($_POST['name']);
$celeb_type = trim($_POST['celeb_type']);
$service = filter_input(INPUT_POST,'service', FILTER_SANITIZE_STRING);

// validate the username
if (!preg_match('/^[A-Z][A-Za-z]{1,29}$/', $userName)) {
	$_SESSION['errorMsg'] = "Your chosen username '$userName' is illegal";
	header('location:registration.php');
	exit();
}

if ($password == '') {
	$_SESSION['errorMsg'] = "You must supply a password";
	header('location:registration.php');
	exit();
}

if(isset($_POST['service'])){
    $service = trim($_POST['service']);
}

// at this point all the data is present and correct

// connect to the database
if (!connectToDb('starstuck')) {
	$_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
	header('location:registration.php');
	exit();
}

// after this point we have an open DB connection

// check if the username is already in use
$userName = sanitizeString($userName);
$sqlQuery = "SELECT * FROM users WHERE UserName='$userName'";
$result = $dbConnection->query($sqlQuery);
if ($result->num_rows > 0) {
	closeConnection();
	$_SESSION['errorMsg'] = "Your chosen username '$userName' is already taken";
	header('location:registration.php');
	exit();
}

// add the new user details to the database
$pwHash = password_hash($password, PASSWORD_BCRYPT);
$sqlQuery = "INSERT INTO users (UserName, Password) VALUES ('$userName', '$pwHash')";
$result = $dbConnection->query($sqlQuery);
if (!$result) {
	$_SESSION['errorMsg'] = "There was a problem with the database: " . $dbConnection->error;
	closeConnection();
	header('location:registration.php');
	exit();
}


$sqlQuery = "INSERT INTO celebrities (id,name, membership_start, celebrity_type, service_id)
values((SELECT UserId FROM users WHERE UserName = '$userName'),'$name',SYSDATE(),'$celeb_type',$service)";
$result = $dbConnection -> query($sqlQuery);
if(!$result){
    $_SESSION['errorMsg'] = "There was a problem with the database: " . $dbConnection->error;
    closeConnection();
    header('location:registration.php');
    exit();
}
// everything worked, update the session info
closeConnection();
$_SESSION['userName'] = $userName;
header('Location:index.php');
?>