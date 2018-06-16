<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
    
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
    <div class="row">
    <div class="container-fluid col-lg-12">
        <div class="carousel slide" id="showslide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/1.jpg" class="img-fluid">
                    <div class="carousel-caption">
                    	<h1 style="font-size: 100px; font-family: Lucida Grande;">JAMIA LABORATORY</h1>
                    	<br>
                    	<button type="button" class="btn btn-danger" data-target="#input-form" data-toggle="modal">Login To Your Account</button>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="images/2.jpg" class="img-fluid">
                    <div class="carousel-caption">
                    	<h1 style="font-size: 100px; font-family: Lucida Grande;">JAMIA LABORATORY</h1>
                    	<br>
                    	<button type="button" class="btn btn-danger" data-target="#input-form" data-toggle="modal">Login To Your Account</button>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="images/3.jpg" class="img-fluid">
                    <div class="carousel-caption">
                    	<h1 style="font-size: 100px; font-family: Lucida Grande;">JAMIA LABORATORY</h1>
                    	<br>
                    	<button type="button" class="btn btn-danger" data-target="#input-form" data-toggle="modal" data-target="#input-form" data-toggle="modal">Login To Your Account</button>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="images/4.jpg" class="img-fluid">
                    <div class="carousel-caption">
                    	<h1 style="font-size: 100px; font-family: Lucida Grande;">JAMIA LABORATORY</h1>
                    	<br>
                    	<button type="button" class="btn btn-danger" data-target="#input-form" data-toggle="modal">Login To Your Account</button>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="images/5.jpg" class="img-fluid">
                    <div class="carousel-caption">
                    	<h1 style="font-size: 100px; font-family: Lucida Grande;" class="text-danger">JAMIA LABORATORY</h1>
                    	<br>
                    	<button type="button" class="btn btn-success" data-target="#input-form" data-toggle="modal">Login To Your Account</button>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="images/6.jpg" class="img-fluid">
                    <div class="carousel-caption">
                    	<h1 style="font-size: 100px; font-family: Lucida Grande;">JAMIA LABORATORY</h1>
                    	<br>
                    	<button type="button" class="btn btn-danger" data-target="#input-form" data-toggle="modal">Login To Your Account</button>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    	<br><br><br><br>
                    </div>
                </div>
                
            </div>
            
            <ul class="carousel-indicators">
                <li data-target="#showslide" data-slide-to="0" class="active"></li>
                <li data-target="#showslide" data-slide-to="1" class=" "></li>
                <li data-target="#showslide" data-slide-to="2" class=""></li>
                <li data-target="#showslide" data-slide-to="3" class=""></li>
                <li data-target="#showslide" data-slide-to="4" class=""></li>
                <li data-target="#showslide" data-slide-to="5" class=""></li>
            </ul>
            
            <a href="#showslide" data-slide="prev" class="carousel-control-prev"><span class="carousel-control-prev-icon"></span></a>
            
            <a href="#showslide" data-slide="next" class="carousel-control-next"><span class="carousel-control-next-icon"></span></a>
        </div> 
    </div>
    <div class="modal fade" id="input-form">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h3>Login</h3>
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    			</div>
    			<br>
    			<div class="modal-body">
    				<form action="login.php" method="post" onsubmit="return validate()">
    					<div class="form-group">
    						<label>User ID</label>
    						<input type="text" name="uname" class="form-control" value="" id="userid">
                            <span class="text-danger myfont smallfont" id="checkuser"></span>
    					</div>
    					<div class="form-group">
    						<label>Password</label>
    						<input type="password" name="pword" class="form-control" value="" id="userpd">
                            <span class="text-danger myfont smallfont" id="checkpass"></span>
    					</div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Login">
                        </div>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    </div>

    <script type="text/javascript">
        function validate(){
            var usr=document.getElementById("userid").value;
            var pwd=document.getElementById("userpd").value;
            if(usr==""){
                document.getElementById("checkuser").innerHTML="*Please Fill User ID";
                return false;
            }
            if(pwd==""){
                document.getElementById("checkpass").innerHTML="*Please Fill Password";
                return false;
            }
            else{
                return true;
            }
        }

    </script>
</body>
</html>