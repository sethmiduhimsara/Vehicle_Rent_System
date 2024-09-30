<?php

// $con=new mysqli('localhost','root','','pearl_drive');
$con = new \MySQLi('localhost', 'root', '', 'pearl_drive');
if($con){
    // echo "Connection Successful";
}
else{
    die(mysqli_error($con));
}

?>