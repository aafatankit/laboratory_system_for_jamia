<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='data')){
    header('location:index.php');
}

$pheight=$_POST['height'];
$pweight=$_POST['weight'];
$pemail=$_POST['email'];
$padhaar=$_POST['adhaar'];
$pdepartment=$_POST['department'];	
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
	$q="select max(sno) from temp_patient";
	$result=mysqli_query($con,$q);
	$row=mysqli_fetch_array($result);
	$id=$row[0]+8239427;
	//$feeder=$_SESSION['ecode'];
	$time=date('Y-m-d H:i:s');
	for($i=0;$i<$total;$i++){
		$cost="select amount from test where testname='$ptestname[$i]'";
		$result=mysqli_query($con,$cost);
		$row=mysqli_fetch_array($result);
		$tamount=$row[0];
		
		$input="insert into temp_patient(regid,name,age,sex,height,weight,mobile,email,regdate,adhaar,address,department,hospital,amount,testname) values($id,'$pname',$page,'$psex',$pheight,$pweight,$pmobile,'$pemail','$time',$padhaar,'$paddress','$pdepartment','$phospital',$tamount,'$ptestname[$i]')";

		mysqli_query($con,$input);
	}
	$_SESSION['patient_id']=$id;
	header('location:bill.php');
}
else{
	echo "Database Not Connected";
}
?>