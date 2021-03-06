<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='test')){
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
    		$q="select * from patient where regid=$code and collect_status=1";
    		$result=mysqli_query($con,$q);
			$row=mysqli_fetch_array($result);
			$available=mysqli_num_rows($result);
    	}
    	else{
    		header('location:nodatabase.php');
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
            echo '<h2 class="text-center"><strong>Test List</strong></h2>';
            echo '<br>';
            echo '<form action="gettemplate.php" method="post">';
                echo '<div>';
                    echo '<table class="table">';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<td> &#465; </td>';
                                echo '<td class="text-center">Test Name</td>';
                                echo '<td class="text-center">Result</td>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                            do{
                            echo '<tr>';
                                echo '<td><input type="radio" name="test" value="'.$row['testname'].'"></td>';
                                echo '<td>'.$row['testname'].'</td>';
                                echo '<td class="text-center">';
                                    if($row['test_status']==0)
                                        echo '-';
                                    else
                                        echo 'Updated';
                                echo '</td>';
                            echo '</tr>';
                            }while($row=mysqli_fetch_array($result));
                        echo '</tbody>';
                    echo '</table>';
                echo '</div>';
                echo '<br>';
                echo '<input type="submit" value="Update Result" class="btn btn-dark float-right">';
            echo '</form>';
            echo '<br><br><br><br><br>';
        echo '</div>';
    echo '</div>';
    }
    ?>
</body>
</html>