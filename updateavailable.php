<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='admin')){
    header('location:index.php');
}

$testno=$_POST['changetest'];

if($con){
	$q="select * from test where sno=$testno";
	$result=mysqli_query($con,$q);
	$row=mysqli_fetch_array($result);
	if($row['avail']==1){
		$set="update test set avail=0 where sno=$testno";
		mysqli_query($con,$set);
		header('location:testavailable.php');
	}
	else{
		$set="update test set avail=1 where sno=$testno";
		mysqli_query($con,$set);
		header('location:testavailable.php');
	}
}
else{
	header('location:nodatabase.php');
}

?>