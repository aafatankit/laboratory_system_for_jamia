<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='data')){
    header('location:index.php');
}
?>

<!DOCTYPE html>
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
    		font-weight: bold;
    	}

        .smallfont{
            font-size: 1.3em;
        }
    </style>
</head>
<body>
    <div class="jumbotron bg-dark">
        <div class="container">
        	<h1 class="text-white myfont" style="font-size: 45px;"><?php echo $_SESSION['staff']; ?></h1>
        	<a href="logout.php" class="float-right myfont text-info btn">LOGOUT</a>
            <a href="showpatient.php" class="float-right myfont text-info btn">VIEW PATIENT</a>
            <a href="datafeeder.php" class="float-right myfont text-info btn">HOME</a>
        </div>
    </div>
    <div>
        <h1 class="text-center myfont">ERROR</h1>
        <p class="text-center">Invalid Details Entered.</p>
    </div>
    <br><br>
    <div class="container bg-light">
    	<div class="row">
    		<div class="col-lg-1"></div>
            <div class="col-lg-10 text-center">
            	<br><br>
                <?php
                	echo $_SESSION['message'];
                ?>  
                <br><br>
                <a href="datafeeder.php" class="btn btn-danger">Go Back</a> 
    			<br><br><br><br><br><br>
    		</div>	
    	</div>
    </div>
</body>
</html>