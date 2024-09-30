<?php
$servername="localhost";
$username="root";
$password="";
$dbname="pearl_drive";
$link=mysqli_connect($servername,$username,$password,$dbname);
$con=mysqli_select_db($link,$dbname);

if($con){
    echo ("Connection ok");
}
else{
    die("Connection failed because".mysqli_connect_error());
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="Rstyle.css">
</head>
<body>
    
    <div class="container">
        
        <form method="post"action="">
            <div class="form-group">
                <label for="nic"><b>NIC Number</b></label>
                <input type="text" id="nic" name="nic">
            </div>
            <div class="form-group">
                <label for="address"><b>Address</b></label>
                <input type="text" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="pick-update"><b>Pick-Up</b></label>
                <input type="date" id="pick-update" name="pickupdate">
            </div>
            <div class="form-group">
                <label for="drop-off"><b>Drop-Off Date</b></label>
                <input type="date" id="drop-off" name="dropoff">
            </div>

            <div class="button-container">
                <input type="submit" name="submit1" value="Insert">
                <input type="submit" name="submit2" value="Delete">
                <input type="submit" name="submit3" value="Update">
                <input type="submit" name="submit4" value="Display">
                <br><br>
                <button onclick="window.location.href = '../payment.php';">Go</button>
            </div>

            
        </form>
    </div>

</body>
</html>

<?php
if(isset($_POST["submit1"])) {
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $pickupdate = $_POST['pickupdate'];
    $dropoff = $_POST['dropoff'];
    
    $query = "INSERT INTO Rent_Details (NIC, Address, Pickup_date, Dropoff_date) VALUES ('$nic', '$address', '$pickupdate', '$dropoff')";
    mysqli_query($link, $query);
    
    echo "Record inserted successfully";
}

if(isset($_POST["submit4"])){
    $res = mysqli_query($link, "SELECT * FROM Rent_Details");
    echo "<table class='table-style'>";
    echo "<tr class='table-tr'>";
    echo "<th class='table-th'>NIC</th>";
    echo "<th class='table-th'>Address</th>";
    echo "<th class='table-th'>Pickup Date</th>";
    echo "<th class='table-th'>Dropoff Date</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td class='table-td'>".$row["NIC"]."</td>";
        echo "<td class='table-td'>".$row["Address"]."</td>";
        echo "<td class='table-td'>".$row["Pickup_date"]."</td>";
        echo "<td class='table-td'>".$row["Dropoff_date"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
}



if(isset($_POST["submit3"])){
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $pickupdate = $_POST['pickupdate']; 
    $dropoff = $_POST['dropoff']; 
    
    $query = "UPDATE Rent_Details SET Address='$address', Pickup_date='$pickupdate', Dropoff_date='$dropoff'  WHERE NIC='$nic'";
    mysqli_query($link, $query);
    echo '<script>alert("Record updated successfully");</script>'; //  JavaScript alert
}




if(isset($_POST["submit2"])){
    $nic = $_POST['nic'];
    $query = "DELETE FROM Rent_Details WHERE NIC='$nic'";
    mysqli_query($link, $query);
    echo '<script>alert("Record deleted successfully");</script>'; //  JavaScript alert
}

?>