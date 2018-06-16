<?php
include 'connectdb.php';
$time=date('Y-m-d');
echo $time;
echo '<br>';
$cost="select * from patient where date(regdate)='$time'";
$result=mysqli_query($con,$cost);
$a=mysqli_num_rows($result);
echo '<br>';
echo $a;
echo '<br>';
	while($row=mysqli_fetch_array($result)){
		echo $row['regid'];
		echo '<br>';
	}
		

#insert into jamialab.patient(regid,name,age,sex,height,weight,mobile,email,regdate,adhaar,address,department,hospital,amount,feeder,testname) values(987,'abkdi',30,'male',150,60,987654,'ankit@gmail.com','2018-06-10 23:04:17',10000000,'addddd','depar','phospital',100,7503,'KFT');
?>




