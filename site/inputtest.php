<?php
include 'connectdb.php';
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
        <h3 class="container text-left">Patient Details:</h3>
    </div>
    <br><br>
    <?php
    	if($con){
    		$code=$_SESSION['patient'];
    		$q="select * from patient where regid=$code";
    		$result=mysqli_query($con,$q);
			$row=mysqli_fetch_array($result);
			$available=mysqli_num_rows($result);
    	}
    	else{
    		echo "database not connected";
    	}
    ?>

    <div>
        <h4 class="container text-left">Registration No: <?php echo $code; ?></h4>
    </div>
    <div>
        <h4 class="container text-left">Name: <?php echo $row['name']; ?></h4>
    </div>
    <div>
        <h4 class="container text-left">Age: <?php echo $row['age']; ?></h4>
    </div>
    <div>
        <h4 class="container text-left">Sex: <?php echo $row['sex']; ?></h4>
    </div>
    <div>
        <h4 class="container text-left">Mobile No: +91 <?php echo $row['mobile']; ?></h4>
    </div>
    <div class="container bg-light">
    	<div class="row">
    		<div class="col-lg-3"></div>
    		<div class="col-lg-6">
    			<form action="submit.php" method="post">
    				<br><br>
    				<div class="form-group">
    				<?php
    				$check=0;
    					for($i=0;$i<$available;$i++){
    						if($row['collect_status']==0){
    							echo '<li class="form-control"><input type="checkbox" name="test[]" value="'.$row['testname'].'"> '.$row['testname'].'</li>';
    							$check++;
    						}
    						$row=mysqli_fetch_array($result);
    					}
    				if($check==0){
    					echo '<br>';
    					echo '<div class="test-center">';
    						echo '<h3>All Samples are Collected for this Patient!!</h3>';
    					echo '</div>';
    				}
    				else{
    					echo '<br>';
    					echo '<div class="float-right">';
    						echo '<input type="submit" value="Submit" class="btn btn-info">';
    					echo '</div>';
    				}
    				?>
    			</form>
    			<br><br><br>
    		</div>	
    	</div>
    </div>
</body>
</html>