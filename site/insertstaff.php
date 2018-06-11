<?php
include 'connectdb.php';

function password_generator($length = 8) {
    $characters = '123456789abcdefghijklmnpqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$empid=$_POST['empcode'];
$empname=$_POST['sname'];
$emptype=$_POST['etype'];
$empmobile=$_POST['smobile'];
$empemail=$_POST['semail'];
$emppassword=password_generator();

if($con){
	$q="insert into employee(name,mobile,email,emp_code,pswd,type) values('$empname',$empmobile,'$empemail',$empid,'$emppassword','$emptype')";
	mysqli_query($con,$q);
	header('location:admin.php');
}

?>