<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||(($_SESSION['usertype']!='sample')&&($_SESSION['usertype']!='report')&&($_SESSION['usertype']!='test'))){
    header('location:index.php');
}
$code=$_POST['regno'];

$q="select * from patient where regid=$code";

$getdata=mysqli_query($con,$q);
$row=mysqli_fetch_array($getdata);
$available=mysqli_num_rows($getdata);

if($available!=0){
    
    $_SESSION['patient']=$code;
        switch ($_SESSION['usertype']) {
            // case 'admin':
            //     echo "admin";
            //     break;
            // case 'data':
            //     header('location:showpatient.php');
            //     break;
            case 'sample':
                header('location:inputcollection.php');
                break;
            case 'report':
                header('location:patientreport.php');
                break;
            case 'test':
                header('location:inputtest.php');
                break;
            default:
                header('location:index.php');
                break;
        }
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

            <?php
                if($_SESSION['usertype']=='test'){
                    $link="tester.php";
                }
                if($_SESSION['usertype']=='admin'){
                    $link="admin.php";
                }
                if($_SESSION['usertype']=='report'){
                    $link="reporter.php";
                }
                if($_SESSION['usertype']=='sample'){
                    $link="samplecollector.php";
                }
                if($_SESSION['usertype']=='data'){
                    $link="datafeeder.php";
                }
            ?>

        	<a href="logout.php" class="float-right myfont text-info btn">LOGOUT</a>
            <a <?php echo 'href="'.$link.'"' ?> class="float-right myfont text-info btn">HOME</a>
        </div>
    </div>
    <br><br>
    <div>
        <h1 class="text-center">PATIENT NOT FOUND !!!</h1>
    </div>
    <br><br>
    
</body>
</html>