<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='data')){
    header('location:index.php');
}

$id=$_SESSION['patient_id'];
$feeder=$_SESSION['ecode'];
$paid=$_POST['amount'];
$total=$_SESSION['total_amount'];

if($con){
	$getdata="select * from temp_patient where regid=$id";
	$result=mysqli_query($con,$getdata);
	while ($row=mysqli_fetch_array($result)) {
		$pheight=$row['height'];
		$pweight=$row['weight'];
		$pemail=$row['email'];
		$padhaar=$row['adhaar'];
		$pdepartment=$row['department'];
		$pname=$row['name'];
		$page=$row['age'];
		$psex=$row['sex'];
		$pmobile=$row['mobile'];
		$phospital=$row['hospital'];
		$ptestname=$row['testname'];
		$paddress=$row['address'];
		$time=$row['regdate'];
		$tamount=$row['amount'];

		$input="insert into patient(regid,name,age,sex,height,weight,mobile,email,regdate,adhaar,address,department,hospital,amount,feeder,testname) values($id,'$pname',$page,'$psex',$pheight,$pweight,$pmobile,'$pemail','$time',$padhaar,'$paddress','$pdepartment','$phospital',$tamount,$feeder,'$ptestname')";
		mysqli_query($con,$input);
	}

	$balance=$total-$paid;


	$q="insert into bills(regid,name,total,paid,balance) values($id,'$pname',$total,$paid,$balance)";
	mysqli_query($con,$q);
	unset($_SESSION['$total_amount']);
	header('location:patient.php');
}
else{
	echo "Database Not Connected";
}
?>