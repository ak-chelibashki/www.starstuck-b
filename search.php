<?php

ini_set('session.use_strict_mode', 1);
session_start();

require 'database.php';

//recover search data
$search = trim($_GET['query']);

//validate search query
if (!preg_match('/^[A-Z][A-Za-z]{1,29}$/', $search)) {
    $_SESSION['errorMsg'] = "Unexpectedly illegal username!";
    header('location:index.php');
    exit();
}
$search = sanitizeString($search);
$pSearch= '%' . $search . '%';
//prepare search statement
$sql = "SELECT * FROM celebrities WHERE name LIKE ?";

// connect to the database
if (!connectToDb('starstuck')) {
    $_SESSION['errorMsg'] = "Sorry, we could not connect to the database.";
    header('location:index.php');
    exit();
}

$prepared_stmt = $dbConnection -> prepare($sql);

$prepared_stmt -> bind_param('s',$pSearch);
$prepared_stmt -> execute();

$result = $prepared_stmt ->get_result();

if($result -> num_rows == 0){
    echo 'No match found';
    closeConnection();
}else{
    while($row = $result ->fetch_assoc()){
        echo"<b>Name</b>: " .$row['name']."<br/>";
        echo"<b>Membership Start</b>: " .$row['membership_start']."<br/>";
    }//end while
}//end else



