<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='data')){
    header('location:index.php');
}

if(!isset($_POST['height'])){
	$pheight=150;
}
else{
	$pheight=$_POST['height'];
}

if(!isset($_POST['weight'])){
	$pweight=60;
}
else{
	$pweight=$_POST['weight'];
}

if(!isset($_POST['email'])){
	$pemail="no_email@jamialab.com";
}
else{
	$pemail=$_POST['email'];
}

if(!isset($_POST['adhaar'])){
	$padhaar=100000000000;
}
else{
	$padhaar=$_POST['adhaar'];
}

if(!isset($_POST['department'])){
	$pdepartment="no-department";
}
else{
	$pdepartment=$_POST['department'];
}
$pname=$_POST['name'];
$page=$_POST['age'];
$psex=$_POST['sex'];
$pmobile=$_POST['mobile'];
$paddress1=$_POST['address1'];
$paddress2=$_POST['address2'];
$paddress3=$_POST['address3'];
$phospital=$_POST['hospital'];
$ptestname=$_POST['testname'];
$total=count($ptestname);
$paddress=$paddress1.' '.$paddress2.' '.$paddress3;



if($con){
	$q="select max(sno) from patient";
	$result=mysqli_query($con,$q);
	$row=mysqli_fetch_array($result);
	$id=$row[0]+8239427;
	$feeder=$_SESSION['ecode'];
	$time=date('Y-m-d H:i:s');
	for($i=0;$i<$total;$i++){
		$cost="select amount from test where testname='$ptestname[$i]'";
		$result=mysqli_query($con,$cost);
		$row=mysqli_fetch_array($result);
		$tamount=$row[0];
		$input="insert into patient(regid,name,age,sex,height,weight,mobile,email,regdate,adhaar,address,department,hospital,amount,feeder,testname) values($id,'$pname',$page,'$psex',$pheight,$pweight,$pmobile,'$pemail','$time',$padhaar,'$paddress','$pdepartment','$phospital',$tamount,$feeder,'$ptestname[$i]')";
		mysqli_query($con,$input);
	}
	header('location:datafeeder.php');
}
else{
	echo "Database Not Connected";
}
?>