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



function allsafe($safeheight,$safeweight,$safeadhaar,$safedepartment,$safename,$safeage,$safemobile,$safehospital,$safeemail,$safesex,$safeaddress,$safetestname){
	$wrong=0;
	$error='';
	if(!ctype_digit($safeheight)||!ctype_digit($safeweight)){
		$error .= '<br><span class="smallfont">Invalid Height/Weight. <br>Height: '.$safeheight.'<br>Weight: '.$safeweight.'</span><br><span class="text-danger">**Height and Weight should only have Numerical Digits</span><br>';
		$wrong++;
	}
	if(!ctype_digit($safeadhaar)){
		$error .= '<br><span class="smallfont">Invalid Adhaar Number: '.$safeadhaar.'</span><br><span class="text-danger">**Adhaar Number should have only Numerical Digits</span><br>';
		$wrong++;
	}
	if(!ctype_alpha($safedepartment)){
		$error .= '<br><span class="smallfont">Invalid Department Name: '.$safedepartment.'</span><br><span class="text-danger">**Department Name should have only Alphabets</span><br>';
		$wrong++;
	}
	if(!ctype_alpha($safename)){
		$yes=0;
		$n=strlen($safename);
		for($i=0;$i<$n;$i++){
			if(!ctype_alpha($safename[$i])){
				if($safename[$i]!=' '){
					$yes++;
				}
			}
		}
		if($yes!=0){
			$error .= '<br><span class="smallfont">Invalid Name: '.$safename.'</span><br><span class="text-danger">**Name should have only Alphabets</span><br>';
			$wrong++;
		}
	}
	if(!ctype_digit($safeage)){
		$error .= '<br><span class="smallfont">Invalid Age: '.$safeage.'</span><br><span class="text-danger">**Age should have only Numerical Digits</span><br>';
		$wrong++;
	}
	if(!ctype_digit($safemobile)){
		$error .= '<br><span class="smallfont">Invalid Mobile No: '.$safemobile.'</span><br><span class="text-danger">**Mobile No should have only Numerical Digits</span><br>';
		$wrong++;
	}
	if(strlen($safemobile)<8||strlen($safemobile)>10){
		$error .= '<br><span class="smallfont">Invalid Mobile No: '.$safemobile.'</span><br><span class="text-danger">**Mobile No should have only 8 to 10 Digits</span><br>';
		$wrong++;
	}
	if(!ctype_alpha($safehospital)){
		$hyes=0;
		$m=strlen($safehospital);
		for($i=0;$i<$m;$i++){
			if(!ctype_alpha($safehospital[$i])){
				if($safehospital[$i]!=' '){
					$hyes++;
				}
			}
		}
		if($hyes!=0){
			$error .= '<br><span class="smallfont">Invalid Hospital Name: '.$safehospital.'</span><br><span class="text-danger">**Hospital Name should have only Alphabets</span><br>';
			$wrong++;
		}
	}


	if($wrong!=0){
		$_SESSION['message']=$error;
		header('location:errordata.php');
	}
	else{
		$_SESSION['height']=$safeheight;
		$_SESSION['weight']=$safeweight;
		$_SESSION['email']=$safeemail;
		$_SESSION['adhaar']=$safeadhaar;
		$_SESSION['department']=$safedepartment;
		$_SESSION['name']=$safename;
		$_SESSION['age']=$safeage;
		$_SESSION['sex']=$safesex;
		$_SESSION['mobile']=$safemobile;
		$_SESSION['hospital']=$safehospital;
		$_SESSION['testname']=$safetestname;
		$_SESSION['paddress']=$safeaddress;
		header('location:opdregistration.php');
	}
}

allsafe($pheight,$pweight,$padhaar,$pdepartment,$pname,$page,$pmobile,$phospital,$pemail,$psex,$paddress,$ptestname);


?>