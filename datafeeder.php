<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='data')){
    header('location:index.php');
}

if($con){
    $q="select * from test";

    $result=mysqli_query($con,$q);
    $row=mysqli_fetch_array($result);
    $available=mysqli_num_rows($result);
}
else{
    echo "Database is Not Connected";
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

        .smallfont{
            font-size: .8em;
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
        <h1 class="text-center">Add Patient</h1>
    </div>
    <br><br>
    <div class="container bg-light">
    	<div class="row">
    		<div class="col-lg-3"></div>
    		<div class="col-lg-6">
    			<form action="opdregistration.php" method="post" onsubmit="return validate()">
    				<br><br>
    				<div class="form-group">
    					<label>Name<span class="text-danger">*</span></label>
    					<input type="text" name="name" class="form-control" value="" id="pname">
    					<span class="text-danger myfont smallfont" id="checkname"></span>
    				</div>
    				<div class="row">
    					<div class="col-lg-5">
    						<div class="form-group">
    							<label>Age<span class="text-danger">*</span></label>
    							<input type="text" name="age" class="form-control" value="" id="page">
    							<span class="text-danger myfont smallfont" id="checkage"></span>
    						</div>
                            <div class="form-group">
                                <label>Sex<span class="text-danger">*</span></label>
                                <select name="sex" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
    					</div>
    					<div class="col-lg-2"></div>
    					<div class="col-lg-5">
    						<div class="form-group">
                                <label>Height</label>
                                <input type="text" name="height" class="form-control" placeholder="cm" value="" id="checkheight">
                            </div>
    						<div class="form-group">
    							<label>Weight</label>
    							<input type="text" name="weight" class="form-control" placeholder="kg(s)" value="" id="checkweight">
    						</div>
    					</div>
    				</div>
    				<div class="form-group">
    					<label>Mobile<span class="text-danger">*</span></label>
    					<input type="mobile" name="mobile" class="form-control" value="" id="pmobile">
    					<span class="text-danger myfont smallfont" id="checkmobile"></span>
    				</div>
    				<div class="form-group">
    					<label>Email:</label>
    					<input type="email" name="email" class="form-control" value="" id="checkemail" placeholder="example@jamialab.com">
    				</div>
    				<div class="form-group">
    					<label>Adhaar No.:</label>
    					<input type="text" name="adhaar" class="form-control" value="" id="checkadhaar" placeholder="XXXX-XXXX-XXXX">
    				</div>
    				<div class="form-group">
    					<label>Address Line<span class="text-danger">*</span></label>
    					<input type="text" name="address1" class="form-control" value="" id="paddress">
    					<span class="text-danger myfont smallfont" id="checkaddress"></span>
    					<br>
    					<label>Address Line 2(optional):</label>
    					<input type="text" name="address2" class="form-control">
    					<label>Address Line 3(optional):</label>
    					<input type="text" name="address3" class="form-control">
    				</div>
    				<div class="form-group">
    					<label>Department</label>
    					<input type="text" name="department" class="form-control" value="" id="checkdepartment" placeholder="department-name">
    				</div>
    				<div class="form-group">
    					<label>Hospital<span class="text-danger">*</span></label>
    					<input type="text" name="hospital" class="form-control" value="" id="phospital">
    					<span class="text-danger myfont smallfont" id="checkhospital"></span>
    				</div>
                    <div class="form-group" id="addtest">
                        <br>
                        <label>Test Name<span class="text-danger">*</span></label>
                        <!--<input type="text" name="testname" class="form-control" id="tname">-->
                        <select name="testname[]" class="form-control" id="tname">
                            <?php
                                for($i=0;$i<$available;$i++){
                                    if($row['avail']==0){
                                        echo '<option class="disable" value="'.$row['testname'].'">'.strtoupper($row['testname']).'</option>';
                                    }
                                    else{
                                        echo '<option cvalue="'.$row['testname'].'">'.strtoupper($row['testname']).'</option>';
                                    }
                                    $row=mysqli_fetch_array($result);
                                }
                            ?>
                        </select>
                        <a href="#" class="btn btn-success btn-sm float-right" id="add">Add More</a>
                    </div>
    				<br>
    				<div class="float-left">
    					<input type="submit" value="Submit" class="btn btn-info btn-lg">
    				</div>
    			</form>
    			<br><br><br><br><br><br>
    		</div>	
    	</div>
    </div>
    <script>
        $(document).ready(function(e){

            var test='<div><br><label>Test Name<span class="text-danger">*</span></label><select name="testname[]" class="form-control" id="tname"><?php include 'testlist.php';?></select><a href="#" class="btn btn-danger btn-sm float-right" id="remove"> &times; </a></div>';


            $('#add').click(function(e){
                $("#addtest").append(test);
            });

            $('#addtest').on('click','#remove',function(e){
                $(this).parent('div').remove();
            });


        });

        function validate(){
            var pname=document.getElementById("pname").value;
            var page=document.getElementById("page").value;
            var pmobile=document.getElementById("pmobile").value;
            var paddress=document.getElementById("paddress").value;
            var phospital=document.getElementById("phospital").value;

            var pheight=document.getElementById("checkheight").value;
            var pweight=document.getElementById("checkweight").value;
            var pemail=document.getElementById("checkemail").value;
            var padhaar=document.getElementById("checkadhaar").value;
            var pdepartment=document.getElementById("checkdepartment").value;

            if(pname==""){
                document.getElementById("checkname").innerHTML="* Please fill Name";
                return false;
            }
            else{
                document.getElementById("checkname").innerHTML="";
            }

            if(page==""){
                document.getElementById("checkage").innerHTML="* Please fill Age";
                return false;
            }
            else{
                document.getElementById("checkage").innerHTML="";
            }

            if(pmobile==""){
                document.getElementById("checkmobile").innerHTML="* Please fill Mobile No.";
                return false;
            }
            else{
                document.getElementById("checkmobile").innerHTML="";
            }

            if(paddress==""){
                document.getElementById("checkaddress").innerHTML="* Please fill Address";
                return false;
            }
            else{
                document.getElementById("checkaddress").innerHTML="";
            }

            if(pheight==""){
                document.getElementById("checkheight").value=0;
            }

            if(pweight==""){
                document.getElementById("checkweight").value=0;
            }

            if(pemail==""){
                document.getElementById("checkemail").value='example@jamialab.com';
            }

            if(padhaar==""){
                document.getElementById("checkadhaar").value=100010001000;
            }

            if(pdepartment==""){
                document.getElementById("checkdepartment").value='department';
            }

            if(phospital==""){
                document.getElementById("checkhospital").innerHTML="* Please fill Hospital";
                return false;
            }
            else{
                return true;
            }
        }
    </script>
</body>
</html>