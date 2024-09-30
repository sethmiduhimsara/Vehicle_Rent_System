
<?php
require '../connect.php';
// include '../connect.php';

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $gender = $_POST["gender"];
    $NIC = $_POST["NIC"];
    $DOB = $_POST["DOB"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $confirmpassword = $_POST["confirm_password"];
    $duplicate = mysqli_query($con, "SELECT * FROM reg_user WHERE email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Email is Alreaady Taken'); </scrip>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO reg_user VALUES('','$email','$password','$f_name','$l_name','$gender','$NIC','$DOB','$mobile','$address')";
            mysqli_query($con,$query);
            echo
            "<script> alert('Registration Successful'); </script>";
            header("Location: ../index.php");
        }
        else{ 
            echo
            "<script> alert('Passwords Do Not Match'); </script>";
        }
    }


}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <!-- link the css file -->
    <link rel="stylesheet" href="reg_styles.css">
</head>

<body>

    <!-- login, register, terms box  -->
    <div class="wrapper">

        <a href="../pre_index.php">
            <!-- close button  -->
            <span class="icon-close">
                <ion-icon name="close"></ion-icon> 
            </span>
        </a>


        <!----- Register form ----->
        <div class="form-box register">
            <h2>Registration</h2>
            
            <form class="form" action="#" id="form" method="post" >

                <div class="form1">
    
                    <div class="input-box">                
                        <span class="icon">
                            <ion-icon name="mail"></ion-icon>
                        </span>
                        <input type="email" id="email" name="email" required autocomplete="off">
                    
                        <label>Email</label>

                        <span style="color:red" id="email_error"></span>

                    </div>
    
                    <div class="input-box">
                    
                        <span class="icon">
                            <ion-icon name="lock"></ion-icon>
                        </span>
                        <input type="password" id="password" name="password" required autocomplete="off">
                    
                        <label>Password</label>

                        <span style="color:red" id="password_error"></span>

                    </div>

                    <div class="input-box">
                    
                        <span class="icon">
                            <ion-icon name="lock"></ion-icon>
                        </span>
                        <input type="password" required id="conf_password" name="confirm_password" autocomplete="off">
                    
                        <label>Confirm Password</label>
                    </div>

                </div>
                

                <div class="form2">

                    <div class="first-last">

                        <div class="input-box">                 
                            <span class="icon">
                                <ion-icon name="person"></ion-icon>
                            </span>
                            <input type="text" required name="f_name" autocomplete="off">
                            
                            <label>First Name</label>
                        </div>
                        <div class="input-box">                
                            <span class="icon">
                                <ion-icon name="person"></ion-icon>
                            </span>
                            <input type="text" required name="l_name" autocomplete="off">
                             
                            <label>Last Name</label>
                        </div>

                    </div>

                    <div class="gender">
                        Gender:
                        <input type="radio" required name="gender" value="male"> <label>Male</label>
                        <input type="radio" required name="gender" value="female"> <label>Female</label>
                    </div>

                    <div class="NIC-DOB">

                        <div class="input-box">               
                            <span class="icon">
                                <ion-icon name="card"></ion-icon>
                            </span>
                            <input type="text" required name="NIC" autocomplete="off">
                            <!-- ??  -->
                            <label>NIC</label>
                        </div>
    
                        <div class="DOB">
                            DOB:
                            <input type="date" required name="DOB" autocomplete="off">
                            
                            <!-- <label>DOB</label> -->
                        </div>

                    </div>

                    <div class="input-box">               
                        <span class="icon">
                            <ion-icon name="call"></ion-icon>
                        </span>
                        <input type="text" required name="mobile" autocomplete="off">
                        <!-- ??  -->
                        <label>Mobile</label>
                    </div>

                    <div class="input-box">               
                        <span class="icon">
                            <ion-icon name="home"></ion-icon>
                        </span>
                        <input type="text" required name="address" autocomplete="off">
                    
                        <label>Address</label>
                    </div>

                </div>


                <!-- Register submit button  -->
                <button type="submit" name="submit" class="btn">Register</button>

                <div class="login-reg">
                
                    <p>Already have an account? <a href="../login/login.php" class="login-link">Login</a></p>
                </div>

            </form>
            
        </div>
        <!-- End Register  -->

    </div>

    <script src="../login_reg.js"></script>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>