<?php 
include 'connectdb.php';

$id=$_POST['regno'];



if($con){
	if($id=='100010001000'){
		header('location:invalidadhaar.php');
	}
	else{
		$q="select * from patient where adhaar=$id";
		$result=mysqli_query($con,$q);
		$avail=mysqli_num_rows($result);
		if($avail==1){
			$row=mysqli_fetch_array($result);
			$_SESSION['patient']=$row['regid'];
			header('location:patientreport.php');
		}
		else{
			header('location:invalidadhaar.php');
		}
	}
}
else{
	header('location:nodatabase.php');
}
?>