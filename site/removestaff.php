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
            <a href="showdb.php" class="float-right myfont text-info btn">DATABASE</a>
            <a href="testavailable.php" class="float-right myfont text-info btn">TEST AVAILABLE</a>
            <a href="addtest.php" class="float-right myfont text-info btn">NEW TEST</a>
            <a href="removestaff.php" class="float-right myfont text-info btn">DELETE STAFF</a>
            <a href="addstaff.php" class="float-right myfont text-info btn">ADD STAFF</a>
            <a href="admin.php" class="float-right myfont text-info btn">HOME</a>
        </div>
    </div>
    <div>
        <h1 class="text-center">Select Employee to Remove</h1>
        <p class="text-center">You cannot Remove a Administrative Employee, Click Here to View.</p>
    </div>
    <br><br>
    <div class="container bg-light">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                
                    <?php
                        $q="select * from employee where type!='admin'";
                        $result=mysqli_query($con,$q);
                        $available=mysqli_num_rows($result);
                        if($available!=0){
                            echo '<form action="deletestaff.php" method="post">';
                                echo '<br><br>';
                                echo '<div>';
                                    echo '<table class="table">';
                                        echo '<thead>';
                                        echo '<tr>';
                                            echo '<th> &times; </th>';
                                            echo '<th>Employee ID</th>';
                                            echo '<th>Name</th>';
                                            echo '<th>Mobile No.</th>';
                                            echo '<th>Email</th>';
                                            echo '<th>Designation</th>';
                                        echo '</tr>';
                                        echo '</thead>';
                                        echo '<tbody>';
                                        $row=mysqli_fetch_array($result);
                                    for($i=0;$i<$available;$i++){
                                        if($row['type']!="notemp"){
                                            if($row['type']=="data")
                                                $deg="Data Feeder";
                                            if($row['type']=="sample")
                                                $deg="Sample Collector";
                                            if($row['type']=="test")
                                                $deg="Sample Tester";
                                            if($row['type']=="report")
                                                $deg="Report Distributor";

                                            echo '<tr>';
                                                echo '<td><input type="radio" name="delete" value='.$row['sno'].'></td>';
                                                echo '<th>'.$row['emp_code'].'</th>';
                                                echo '<th>'.$row['name'].'</th>';
                                                echo '<th>'.$row['mobile'].'</th>';
                                                echo '<th>'.$row['email'].'</th>';
                                                echo '<th>'.$deg.'</th>';
                                            echo '</tr>';
                                        }
                                        $row=mysqli_fetch_array($result);
                                    }
                                        echo '</tbody>';
                                    echo '</table>';
                                    echo '<div class="float-right">';
                                    echo '<input type="submit" value="Remove" class="btn btn-danger">';
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