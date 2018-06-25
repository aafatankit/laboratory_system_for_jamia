<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='sample')){
    header('location:index.php');
}
$test=$_POST['test'];
$total=count($test);

if($con){
	$code=$_SESSION['patient'];
	for($i=0;$i<$total;$i++){
		$q="update patient set collect_status=1 where regid=$code and testname='$test[$i]'";
		mysqli_query($con,$q);
	}
    header('location:inputcollection.php');
}
else{
	header('location:nodatabase.php');
}
?>