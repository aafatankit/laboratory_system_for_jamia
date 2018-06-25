<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='admin')){
    header('location:index.php');
}

$tname=strtoupper($_POST['name']);
$tdepartment=strtoupper($_POST['depname']);
$tcost=$_POST['amt'];

if($con){
	$q="insert into test(testname,amount,department,avail) values('$tname',$tcost,'$tdepartment',1)";
	mysqli_query($con,$q);
	$_SESSION['test']=$tname;
	header('location:addcontent.php');
}
else{
	header('location:nodatabase.php');
}

?>