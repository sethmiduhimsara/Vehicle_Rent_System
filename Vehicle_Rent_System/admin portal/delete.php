<?php
include '../connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `reg_user` where user_id=$id";
    // $sql="DELETE FROM reg_user WHERE user_id = '$id'";
    $result=mysqli_query($con, $sql);
    if($result){
        // echo "Delete Successful";
        header('location: admin.php');
    }
    else{
        die(mysqli_error($con));
    }

}

?>