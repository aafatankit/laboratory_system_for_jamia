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
        </div>
    </div>
    <div>
        <h1 class="text-center">Add Test Result Content</h1>
        <p class="text-center">Please provide Result Presentation Template to add Test. If Result Presentaion Template is not provided, the Test will not be added to the System.</p>
        <br>
        <h1 class="text-center"><?php echo $_SESSION['test']; ?></h1>
    </div>
    <br><br>
    <div class="container bg-light">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <form action="inserttemplate.php" method="post" id="addtest" onsubmit="return validate()">
                    <br><br>
                    <div class="form-group">
                        <label>Test Report Description:</label>
                        <textarea name="description" value="" id="txt" class="form-control" rows="20" placeholder="Please Provide Template(All Necessary Parameter and Content)"></textarea>
                        <span id="perror" class="text-danger"></span>
                    </div>
                    <br>
                </form>
            </div> 
        </div>
        <dir class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <button class="btn btn-danger float-left" id="back" onclick="move()">Cancel</button>
                <button type="submit" form="addtest" class="btn btn-success float-right">Add Template</button>
            </div>
                <br><br><br><br><br><br>
        </dir> 
    </div>
    <script type="text/javascript">
        function validate(){
            var desc=document.getElementById("txt").value;
            if(desc==""){
                document.getElementById("perror").innerHTML="*Please Enter Valid Template";
                return false;
            }
            else{
                return true;
            }
        }
        function move(){
            window.location='admin.php';
        }
    </script>
</body>
</html>