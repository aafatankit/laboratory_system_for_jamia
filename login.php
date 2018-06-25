<?php
include 'connectdb.php';
$username=$_POST['uname'];
$password=$_POST['pword'];

if($con){
	$q="select * from employee where emp_code='$username' and pswd='$password'";

	$result=mysqli_query($con,$q);
	$row=mysqli_fetch_array($result);
	$available=mysqli_num_rows($result);

	if($available==1){
		$_SESSION['ecode']=$row['emp_code'];
		$_SESSION['staff']=strtoupper($row['name']);
		$_SESSION['usertype']=$row['type'];
		switch ($_SESSION['usertype']) {
			case 'admin':
				header('location:admin.php');
				break;
			case 'data':
				header('location:datafeeder.php');
				break;
			case 'sample':
				header('location:samplecollector.php');
				break;
			case 'report':
				header('location:reporterhome.php');
				break;
			case 'test':
				header('location:tester.php');
				break;
			default:
				header('location:index.php');
				break;
		}
	}
	else{
		header('location:notexist.php');
	}
}
else{
	header('location:nodatabase.php');
}
?>