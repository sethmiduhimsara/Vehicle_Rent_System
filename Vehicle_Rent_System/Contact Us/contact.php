<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $userID = $_POST['User_ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO user_contact (User_ID,name, email, message) VALUES ('userID','$name','$email', '$message')";

    $result = mysqli_query($con, $sql);
    if ($result) {
        // Redirect to a different page after successful submission
        header("Location: success.php"); // Replace success.php with your desired success page
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>



<!DOCTYPE html>
<html lang="eng">

<head>
    <title>COUNTACT US</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="stylescontact.css">


</head>

<body>

    <div class="imeg">
        <img src="whitemap.png">
    </div>


    <div class="container1">
        <nav>
            <div class="logo">
                <p>Pearl Drive</p>
            </div>
            <ul class="menu">

                <li clas="menu1"><a href="../index.php">Sign-Out</a></li>
                <li clas="menu1"><a href="../aboutus.php">About-us</a></li>
                <li clas="menu1"><a href="contact.php">Contact</a></li>
                <li clas="menu1"><a href="../vehicle.php">Vehicle</a></li>
                <li clas="menu1"><a href="../index.php">Home</a></li>

            </ul>
        </nav>



        <div class="contact2">
            <h2 style="color: azure;">Contact-Us</h2>

        </div>
        <div class="all">
            <div class="icon"><i class="fa fa-map-marker-alt"></i></div>

            <div class="location">
                <p style="color: azure;"> LOCATION </p>
                <div class="text">
                    <p style="color: azure;">NO 95,<br>MALABE,<br>SRI LANKA.</p>
                </div>
            </div>


            <div class="icon"><i class="	fa fa-phone"></i></div>

            <div class="tele">
                <p style="color: azure;">TELEPHONE</p>
                <div class="teleP">
                    <p style="color: azure;">+94 - 71 232 3445</p>
                </div>
            </div>


            <div class="icon"><i class="fa fa-envelope"></i></div>
            <div class="mail">
                <p style="color: azure;">E-mail</p>
                <div class="mailP">
                    <p style="color: azure;">Pearldrive12.info@gmail.com</p>
                </div>
            </div>

            <div class="icon-contact">
                <div class="icon"><a href=""><i class="fa-brands fa-facebook"></i></a></div>
                <div class="icon"><a href=""><i class="fa-brands fa-twitter"></i></a></div>
                <div class="icon"><a href=""><i class="fa-brands fa-whatsapp"></i></a></div>
                <div class="icon"><a href=""><i class="fa-brands fa-google"></i></a></div>
                <div class="icon"><i class="fa fa-map-pin"></i></div>
            </div>
        </div>
        <!-- form -->

        <div class="contai1">
            <form action="contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" name="email">
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message"></textarea>
                </div>
                <button type="submit" name="submit">submit</button>
            </form>
        </div>

        <?php
        include "read.php";
        ?>


        <footer>
            <div class="footerContanier">
                <div class="socialIcons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-google"></i></a>
                </div>
                <div class="footerNav">
                    <ul>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">Termes & Condition</a></li>
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">FAQs</a></li>
                    </ul>
                </div>

            </div>
            <div class="footerBottom">
                <p>&copy;2024 Rentcar.inc All rigths reserved <span class="designer"></span></p>
            </div>
        </footer>


</body>



</html>