<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='test')){
    header('location:index.php');
}
if($con){
    $testname=$_POST['test'];
    $q="select * from template where testname='$testname'";
    $result=mysqli_query($con,$q);
    $data=mysqli_fetch_array($result);
    $report=$data['template'];
    $_SESSION['tname']=$testname;
}
else{
    header('location:nodatabase.php');
}
?>

<!DOCTYPE html>
<html>
<head> 
	<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style type="text/css">
    	.myfont{
    		font-family: Lucida Grande;
    	}
    </style>
</head>
<body>
    <div class="jumbotron bg-dark">
        <div class="container">
        	<h1 class="text-white myfont" style="font-size: 45px;"><?php echo $_SESSION['staff']; ?></h1>
        	<a href="logout.php" class="float-right myfont text-info btn">LOGOUT</a>
        	<a href="tester.php" class="float-right myfont text-info btn">HOME</a>
        </div>
    </div>
    <div>
        <h3 class="container text-center">Patient Details:</h3>
    </div>
    <br><br>
    <?php
    	if($con){
    		$code=$_SESSION['patient'];
    		$q="select * from patient where regid=$code and collect_status=1 and testname='$testname'";
    		$result=mysqli_query($con,$q);
			$row=mysqli_fetch_array($result);
			$available=mysqli_num_rows($result);
    	}
    	else{
    		echo "database not connected";
    	}
    ?>


    <?php

    if($available==0){
        echo '<div class="container bg-light">';
            echo '<div>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<h2 class="text-center"><strong>Please Wait... Sample is Not Yet Collected</strong></h2>';
                echo '<br>';
            echo '</div>';
            echo '<br><br><br><br><br>';
        echo '</div>';
    }
    else{
    echo '<div>';
        echo '<h4 class="container text-left">Registration No: '.$code.'</h4>';
    echo '</div>';
    echo '<div>';
        echo '<h4 class="container text-left">Name: '.$row['name'].'</h4>';
    echo '</div>';
    echo '<div>';
        echo '<h4 class="container text-left">Age: '.$row['age'].'</h4>';
    echo '</div>';
    echo '<div>';
        echo '<h4 class="container text-left">Sex: '.$row['sex'].'</h4>';
    echo '</div>';
    echo '<div>';
        echo '<h4 class="container text-left">Mobile No: +91 '.$row['mobile'].'</h4>';
    echo '</div>';
    echo '<div class="container bg-light">';
    	echo '<div>';
            echo '<br>';
            //echo '<h2 class="text-center"><strong>'.$testname.'</strong></h2>';
            echo '<h2 class="text-center"><strong>'.$row['testname'].'</strong></h2>';
            echo '<p class="text-center">Here is the Template to Update Result. Please Edit only those values which are necessary.<br><span class="text-danger">**If you want to undo all change you made in Template, Please REFRESH the page to reload Template.</span></p>';
            echo '<br>';
            echo '<form action="insertresult.php" method="post">';
                echo '<div class="row">';
                    echo '<div class="col-lg-1"></div>';
                    echo '<div class="col-lg-10">';
                    if($row['test_status']==0){
                        echo '<textarea name="patientresult" class="form-control" rows="20">'.$report.'</textarea>';
                        echo '<br>';
                        echo '<h4>Any Recommendation</h4>';
                        echo '<textarea name="recommend" class="form-control" rows="8" placeholder="You can specify any Recommendation/Precautions for Patient/Doctor"></textarea>';
                    }
                    else{
                        $getting="select * from result where rid=$code and tname='$testname'";
                        $found=mysqli_query($con,$getting);
                        $rdata=mysqli_fetch_array($found);
                        echo '<textarea name="patientresult" class="form-control" rows="20">'.$rdata['report'].'</textarea>';
                        echo '<input type="hidden" name="recommend" value=".">';
                    }
                        
                    echo '</div>';
                echo '</div>';
                echo '<br>';
                echo '<a href="inputtest.php" class="btn btn-secondary">Back</a>';
                echo '<input type="submit" value="Update Result" class="btn btn-success float-right">';
            echo '</form>';
            echo '<br><br><br><br><br>';
        echo '</div>';
    echo '</div>';
    }
    ?>
</body>
</html>