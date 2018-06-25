<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='admin')){
    header('location:index.php');
}

$tname=$_SESSION['test'];
$template=$_POST['description'];

if($con){
	$q="insert into template(testname,template) values('$tname','$template')";
	mysqli_query($con,$q);
	$w="update test set template=1 where testname='$tname'";
	mysqli_query($con,$w);
	unset($_SESSION['test']);
	header('location:admin.php');
}
else{
	header('location:nodatabase.php');
}

?>