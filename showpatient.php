<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='data')){
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
            <a href="showpatient.php" class="float-right myfont text-info btn">VIEW PATIENT</a>
            <a href="datafeeder.php" class="float-right myfont text-info btn">HOME</a>
        </div>
    </div>
    <div>
        <h1 class="text-center">Recently Registed Patients</h1>
        <p class="text-center">Here is the List of Patients Registered Today.</p>
    </div>
    <br><br>
    <div class="container bg-light">
    	<div class="row">
    		<div class="col-lg-1"></div>
            <div class="col-lg-10">
                <span></span>
                    <?php
                        $time=date('Y-m-d');
                        $q="select * from patient where date(regdate)='$time'";
                        $result=mysqli_query($con,$q);
                        $available=mysqli_num_rows($result);
                        $date=date('d/m/Y');
                        if($available!=0){
                            echo '<form action="patient.php" method="post">';
                                echo '<br><br>';
                                echo '<div>';
                                    echo '<table class="table">';
                                        echo '<thead>';
                                        echo '<tr>';
                                            echo '<th> &#465; </th>';
                                            echo '<th>Reg. ID</th>';
                                            echo '<th>Name</th>';
                                            echo '<th>Age</th>';
                                            echo '<th>Sex</th>';
                                            echo '<th>Date</th>';
                                        echo '</tr>'; 
                                        echo '</thead>';
                                        echo '<tbody>';
                                        $row=mysqli_fetch_array($result);
                                        $num=1;
                                    for($i=0;$i<$available;$i++){
                                        if($num==$row['regid']){
                                            $row=mysqli_fetch_array($result);
                                        }

                                        else{
                                            echo '<tr>';
                                                echo '<td><input type="radio" name="pid" value='.$row['regid'].'></td>';
                                                echo '<th>'.$row['regid'].'</th>';
                                                echo '<th>'.$row['name'].'</th>';
                                                echo '<th>'.$row['age'].'</th>';
                                                echo '<th>'.$row['sex'].'</th>';
                                                echo '<th>'.$date.'</th>';
                                            echo '</tr>';
                                            $num=$row['regid'];
                                            $row=mysqli_fetch_array($result);
                                        }
                                    }
                                        echo '</tbody>';
                                    echo '</table>';
                                    echo '<div class="float-right">';
                                    echo '<input type="submit" value="Show Details" class="btn btn-primary">';
                                    echo '</div>';
                                echo '</div>';
                            echo '</form>';
                        }
                    ?>
                    
    			<br><br><br><br><br><br>
    		</div>	
    	</div>
    </div>
</body>
</html>