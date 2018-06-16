<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='admin')){
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
            <a href="requiredpassword.php" class="float-right myfont text-info btn">DATABASE</a>
            <a href="testavailable.php" class="float-right myfont text-info btn">TEST AVAILABLE</a>
            <a href="addtest.php" class="float-right myfont text-info btn">NEW TEST</a>
            <a href="removestaff.php" class="float-right myfont text-info btn">DELETE STAFF</a>
            <a href="addstaff.php" class="float-right myfont text-info btn">ADD STAFF</a>
            <a href="admin.php" class="float-right myfont text-info btn">HOME</a>
        </div>
    </div>
    <div>
        <h1 class="text-center">Enter Details to Add Staff</h1>
    </div>
    <br><br>
    <div class="container bg-light">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form action="insertstaff.php" method="post">
                    <br><br>
                    <div class="form-group">
                        <label>Employee Code<span class="text-danger">*</span></label>
                        <input type="text" name="empcode" class="form-control">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label>Name<span class="text-danger">*</span></label>
                        <input type="text" name="sname" class="form-control">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label>Employee As<span class="text-danger">*</span></label>
                        <select class="form-control" name="etype">
                            <option value="data">Patient Data Feeder</option>
                            <option value="sample">Sample Collector</option>
                            <option value="test">Sample Tester</option>
                            <option value="report">Report Distributer</option>
                            <option value="admin">Administrative</option>
                        </select>
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number<span class="text-danger">*</span></label>
                        <input type="text" name="smobile" class="form-control">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label>Email<span class="text-danger">*</span></label>
                        <input type="text" name="semail" class="form-control">
                        <span></span>
                    </div>
                    <br>
                    <div class="float-right">
                        <input type="submit" value="ADD" class="btn btn-danger">
                    </div>
                </form>
                <br><br><br><br><br><br>
            </div>  
        </div>
    </div>
</body>
</html>