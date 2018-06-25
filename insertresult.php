<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='test')){
    header('location:index.php');
}

$regid=$_SESSION['patient'];
$tname=$_SESSION['tname'];
$tester=$_SESSION['ecode'];

$check="select * from patient where regid=$regid and testname='$tname'";
$checkdata=mysqli_query($con,$check);
$row=mysqli_fetch_array($checkdata);

echo $row['test_status'];

if($row['test_status']==0){
$report=$_POST['patientresult'].'


Recommendation:
'.$_POST['recommend'];

	if($con){
		$q="insert into result(rid,tname,report,tester) values($regid,'$tname','$report',$tester)";
		mysqli_query($con,$q);
		$q="update patient set test_status=1 where regid=$regid and testname='$tname'";
		mysqli_query($con,$q);
		unset($_SESSION['tname']);
		//echo $report;
		header('location:inputtest.php');
	}
	else{
    	header('location:nodatabase.php');
	}

}
else{
	$report=$_POST['patientresult'];
	if($con){
		$w="delete from result where rid=$regid and tname='$tname'";
		mysqli_query($con,$w);
		$q="insert into result(rid,tname,report,tester) values($regid,'$tname','$report',$tester)";
		mysqli_query($con,$q);
		unset($_SESSION['tname']);
		//echo $report;
		header('location:inputtest.php');
	}
	else{
    	echo "database is not connected";
	}
}
?>