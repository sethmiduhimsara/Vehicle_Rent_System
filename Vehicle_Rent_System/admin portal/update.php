
<?php
require '../connect.php';
// include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from `reg_user` where user_id=$id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$email = $row['email'];
$password = $row['password'];
$f_name = $row['f_name'];
$l_name = $row['l_name'];
$NIC = $row['NIC'];
$DOB = $row['DOB'];
$mobile = $row['mobile'];
$address = $row['address'];


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $NIC = $_POST['NIC'] ?? '';
    $DOB = $_POST['DOB'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $address = $_POST['address'] ?? '';
    
    $sql="update `reg_user` set user_id=$id, email='$email', password='$password', f_name='$f_name', l_name='$l_name', gender='$gender', NIC='$NIC', DOB='$DOB', mobile='$mobile', address='$address' where user_id=$id";
    $result=mysqli_query($con, $sql);
    if($result){
        // echo "Updated Successfully";
        header('location: admin.php');
    }else{
        die(mysqli_error($con));
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <!-- link the css file -->
    <link rel="stylesheet" href="update.css">
</head>

<body>

    
    <div class="wrapper">
  
        <div class="form-box register">
            <h2>User Profile</h2>

            <form class="form" action="#" id="form" method="post" >

                <div class="form1">
    
                    <div class="input-box">
                        <input type="email" id="email" name="email" autocomplete="off" value=<?php echo $email;?>>
                        <label>Email</label>

                        <span style="color:red" id="email_error"></span>

                    </div>
    
                    <div class="input-box">
                        <input type="password" id="password" name="password" autocomplete="off" value=<?php echo $password;?>>
                        <label>Password</label>

                        <span style="color:red" id="password_error"></span>

                    </div>

                </div>
                

                <div class="form2">

                    <div class="first-last">

                        <div class="input-box">
                            <input type="text" name="f_name" autocomplete="off" value=<?php echo $f_name;?>>
                            <label>First Name</label>
                        </div>
                        <div class="input-box">
                            <input type="text" name="l_name" autocomplete="off" value=<?php echo $l_name;?>>
                            <label>Last Name</label>
                        </div>

                    </div>


                    <div class="NIC-DOB">

                        <div class="input-box">
                            <input type="text" name="NIC" autocomplete="off" value=<?php echo $NIC;?>>
                            <label>NIC</label>
                        </div>
    
                        <div class="DOB">
                            <label> DOB </label>
                            <input type="date" name="DOB" autocomplete="off" value=<?php echo $DOB;?>>
                            
                        </div>

                    </div>

                    <div class="input-box">
                        <input type="text" name="mobile" autocomplete="off" value=<?php echo $mobile;?>>
                    
                        <label>Mobile</label>
                    </div>

                    <div class="input-box">
                        <input type="text" name="address" autocomplete="off" value=<?php echo $address;?>>
                    
                        <label>Address</label>
                    </div>

                </div>

                <button type="submit" name="submit" class="btn">Update</button>

            </form>
            
        </div>

    </div>

    <script src="../login_reg.js"></script>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>