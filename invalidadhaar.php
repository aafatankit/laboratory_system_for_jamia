<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='report')){
    header('location:index.php');
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
            <a <?php echo 'href="adhaarsearch.php"' ?> class="float-right myfont text-info btn">HOME</a>
        </div>
    </div>
    <br><br>
    <div>
        <h1 class="text-center">PATIENT NOT FOUND !!!</h1>
        <h1 class="text-center">Invalid Adhaar Number !!!</h1>
    </div>
    <br><br>
    
</body>
</html>