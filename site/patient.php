<?php
include 'connectdb.php';
$patient=$_POST['pid'];
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
                if($_SESSION['usertype']=='data'){
                    echo '<a href="logout.php" class="float-right myfont text-info btn">LOGOUT</a>';
                    echo '<a href="showpatient.php" class="float-right myfont text-info btn">VIEW PATIENT</a>';
                    echo '<a href="datafeeder.php" class="float-right myfont text-info btn">HOME</a>';
                }
                if($_SESSION['usertype']=='admin'){
                    echo '<a href="logout.php" class="float-right myfont text-info btn">LOGOUT</a>';
                    echo '<a href="showdb.php" class="float-right myfont text-info btn">DATABASE</a>';
                    echo '<a href="testavailable.php" class="float-right myfont text-info btn">TEST AVAILABLE</a>';
                    echo '<a href="addtest.php" class="float-right myfont text-info btn">NEW TEST</a>';
                    echo '<a href="removestaff.php" class="float-right myfont text-info btn">DELETE STAFF</a>';
                    echo '<a href="addstaff.php" class="float-right myfont text-info btn">ADD STAFF</a>';
                    echo '<a href="admin.php" class="float-right myfont text-info btn">HOME</a>';
                }

            ?>
        	<!-- <a href="logout.php" class="float-right myfont text-info btn">LOGOUT</a> -->
        </div>
    </div>
    <div>
        <h1 class="text-center">Patient Details</h1>
    </div>
    <br><br>
    <div class="container bg-light">
    	<?php
        if($con){
            $q="select * from patient where regid=$patient";
            $result=mysqli_query($con,$q);
            $row=mysqli_fetch_array($result);
            echo '<div class="row">';
                echo '<div class="col-lg-6">';
                        echo '<br><br><br>';
                        echo '<h5>Reg No. '.$row['regid'].'</h5>';
                        echo '<br>';
                        echo '<h5>Name: '.$row['name'].'</h5>';
                echo '</div>';echo '<div class="col-lg-6">';
                        echo '<br><br>';
                        echo '<h5 class="text-right">Date: '.$row['regdate'].'</h5>';
                echo '</div>';
            echo '</div>';
            echo '<div class="row">';
                echo '<div class="col-lg-6">';
                        echo '<br>';
                        echo '<h5>Address: '.$row['address'].'</h5>';
                echo '</div>';
                echo '<div class="col-lg-6">';
                        echo '<br>';
                        echo '<h5>Adhaar No. '.$row['adhaar'].'</h5>';
                echo '</div>';
            echo '</div>';
            echo '<div class="row">';
                echo '<div class="col-lg-3">';
                        echo '<br>';
                        echo '<h5>Age: '.$row['age'].'</h5>';
                echo '</div>';
                echo '<div class="col-lg-3">';
                        echo '<br>';
                        echo '<h5>Sex: '.$row['sex'].'</h5>';
                echo '</div>';
                echo '<div class="col-lg-3">';
                        echo '<br>';
                        echo '<h5>Height: '.$row['height'].'</h5>';
                echo '</div>';
                echo '<div class="col-lg-3">';
                        echo '<br>';
                        echo '<h5>Weight: '.$row['weight'].'</h5>';
                echo '</div>';
            echo '</div>';
            echo '<div class="row">';
                echo '<div class="col-lg-6">';
                        echo '<br>';
                        echo '<h5>Mobile No. '.$row['mobile'].'</h5>';
                echo '</div>';
                echo '<div class="col-lg-6">';
                        echo '<br>';
                        echo '<h5>Email: '.$row['email'].'</h5>';
                echo '</div>';
            echo '</div>';
            echo '<div class="row">';
                echo '<div class="col-lg-6">';
                        echo '<br>';
                        echo '<h5>Department: '.strtoupper($row['department']).'</h5>';
                echo '</div>';
                echo '<div class="col-lg-6">';
                        echo '<br>';
                        echo '<h5>Hospital: '.strtoupper($row['hospital']).'</h5>';
                echo '</div>';
            echo '</div>';
            echo '<br>';
            echo '<div class="row">';
                echo '<div class="col-lg-12">';
                    $s=1;
                    $total=0;
                    echo '<table class="table">';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th>#</th>';
                                echo '<th>Test Name</th>';
                                echo '<th>Amount</th>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        do{
                            echo '<tr>';
                                echo '<td>'.$s.'</td>';
                                echo '<td>'.$row['testname'].'</td>';
                                echo '<td>&#8377;'.$row['amount'].'</td>';
                            echo '</tr>';
                            $s++;
                            $total=$total+$row['amount'];
                        }while($row=mysqli_fetch_array($result));
                            echo '<tr>';
                                echo '<td>*</td>';
                                echo '<td>Total Amount</td>';
                                echo '<td>&#8377;'.$total.'/-</td>';
                            echo '</tr>';  
                        echo '</tbody>';
                    echo '</table>';
                echo '</div>';
            echo '</div>';
            echo '<br><br><br><br><br><br>';
        }
        else{
            echo "Database is not Connected";
        }
        	        
    			?>
    </div>
</body>
</html>