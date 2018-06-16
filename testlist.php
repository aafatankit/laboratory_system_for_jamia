<?php
if((!isset($_SESSION['staff']))||($_SESSION['usertype']!='data')){
    header('location:index.php');
}

    $result=mysqli_query($con,$q);
    $row=mysqli_fetch_array($result);
    $available=mysqli_num_rows($result);


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