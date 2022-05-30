<?php
/* Initialize a secure PHP session and recover any session info.

	Ensure security constraints are respected

*/
ini_set('session.use_strict_mode', 1); // ensure session security
session_start();

error_reporting(E_WARNING); // change to 0 on release

// an array of pages that do not need a valid sign in for access
$unsecuredPages = array('index.php', 'registration.php','celebrities.php', 'contact.php', 'about.php');
//pages that require admin access
$adminPages = array('admin.php', 'processStatusSwitch.php');
//pages that require sign in to be displayed
$securePages = array('ajolie.php','cher.php','nadal.php');

// determine if the session has a userName set or not
// if it has, then assign it to a variable for easy access
if (isset($_SESSION['userName'])) {
	$userName = $_SESSION['userName'];
	if (isset($_SESSION['adminLevel'])) {
		$adminLevel = $_SESSION['adminLevel'];
	}
	else {
		$adminLevel = 0;
	}
}
else {
	$userName = '';
}

// if the current page is not an unsecured page then the userName variable must 
// have a non-empty value set for access to be allowed. If it doesn't then
// redirect the browser back to the index page
$currentPage = basename($_SERVER['PHP_SELF']);
if (!in_array($currentPage, $unsecuredPages) ) {
	// if there is not userName set, redirect to the index.php
	if ($userName == '') {
		header('Location: index.php');
		exit();
	}

	// if a non-admin user tries to access an admin page
	// kill their session and redirect to the index
	if (in_array($currentPage, $adminPages) && $adminLevel < 1) {
		session_unset();
		session_destroy();
		header('Location: index.php');
		exit();
	}
}
?>