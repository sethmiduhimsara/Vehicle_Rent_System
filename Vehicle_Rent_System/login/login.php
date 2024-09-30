<?php
require '../connect.php';

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($con, "SELECT * FROM reg_user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: ../index.php");
        }
        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }
    else{
    echo
    "<script> alert('User Not Registered'); </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- link the css file -->
    <link rel="stylesheet" href="login_styles.css">
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

        <!----- Login form ----->
        <div class="form-box login">
            <h2>Lo
            <form action="#" id="form" method="post">

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="text" id="email" name="email" required>
                    <label>Email</label>

                    <span style="color:red" id="email_error"></span>

                </div>

                <div class="input-box">
                    
                    <span class="icon">
                        <ion-icon name="lock"></ion-icon>
                    </span>
                    <input type="password" id="password" name="password" required>  
                    
                    <label>Password</label>

                    <span style="color:red" id="password_error"></span>

                </div>
                
                <div class="remember_forgot_pw">
                    <!-- remember me check box -->
                    <label> <input type="checkbox">Remember me</label>
                    <!-- forgot password link -->
                    <a href="forgotPassword.php">Forgot Password?</a>
                </div>

                <!-- Login submit button  -->
                <button type="submit" name="submit" class="btn">Login</button>

                <div class="login-reg">
                    
                    <p>Don't have an account? <a href="../terms&cond/terms&cond.php" class="register-link">Register</a></p>
                </div>

                <div class="admin_portal">
                    <a href="../admin portal/admin_login.php">Admin</a>
                </div>

            </form>
        </div>
        <!-- End Login  -->

    </div>

    <script src="../login_reg.js"></script>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

</body>
</html>