<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='admin')){
    header('location:index.php');
}
$pswd=$_POST['password'];
$check='kMt6uYk9gDk9bRh1tMd6mJh9';

if($con){
	if($pswd==$check){
		$_SESSION['db']='on';
		header('location:showdb.php');
	}
	else
		header('location:permissiondenied.php');
}
else{
	echo "Database is not connected";
}

?>