<?php
include 'connectdb.php';
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='admin')){
    header('location:index.php');
}


$empdelete=$_POST['delete'];

if($con){
    $q="update employee set type='notemp' where sno=$empdelete";
    mysqli_query($con,$q);
    header('location:admin.php');
}

?>