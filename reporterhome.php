<?php
include 'connectdb.php';
if(isset($_SESSION['patient'])){
    unset($_SESSION['patient']);
}
// if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='admin')){
//     header('location:index.php');
// }
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
            <a href="adhaarsearch.php" class="float-right myfont text-info btn">ADHAAR NO.</a>
            <a href="reporter.php" class="float-right myfont text-info btn">REGISTRATION ID</a>
            <a href="reporterhome.php" class="float-right myfont text-info btn">HOME</a>
        </div>
    </div>
    <div>
        <h1 class="text-center">Welcome, Report Distributor</h1>
        <p class="text-center">Here are some instructions you need to follow while using this Account. Please read carefully before moving forward.</p>
    </div>
    <br><br>
    <div class="container bg-light">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-11">
                <br>
                <h2 class="myfont">Important Instructions!!</h2><br><br>
                <ul>
                    <li>Here are many options available to manage Administrative.</li>
                    <li>You can add a new user staff in "ADD STAFF" section.</li>
                    <li>The user you add will get a mail automatically with there login credentials, so be sure about the email id of user.</li>
                    <li>You can also remove a staff, using "DELETE STAFF" section.</li>
                    <li>You can not remove a staff completely. Due to his/her working logs are present in database which can be useable in future.</li>
                    <li>After deleting a user, the details of user will be still in database, but deletion will disable the user to use the system.</li>
                    <li>You will never able to remove any staff who is also a Admin.</li>
                    <li>You can only view the list of Admins by clicking on "VIEW" in DELETE STAFF section.</li>
                    <li>If there will new Test available in Laboratory you can update the list of Tests for Registration Counter by using "NEW TEST" section.</li>
                    <li>In case if any Test will not able to perform by laboratory you can also change the status of availability in "TEST AVAILABLE" section.</li>
                    <li>The section "DATABASE" contains the information of all patients registered in our system.</li>
                    <li>The "DATABASE" section required a different password to access patient details.</li>
                    <li>It is not necessary that all admin user have access to DATABASE of Patients.</li>
                    <li>If you don't have password of DATABASE it means you don't have permissions to Access the DATABASE.</li>
                    <li>In case of any System Failure or System Recovery contact the Developer of this System (Ankit: 7503649465).</li>
                </ul>
                <br><br><br><br><br><br>
            </div>  
        </div>
    </div>
</body>
</html>