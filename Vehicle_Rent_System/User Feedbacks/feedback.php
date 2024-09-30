<?php
$servername="localhost";
$username="root";
$password="";
$dbname="pearl_drive";
$link=mysqli_connect($servername,$username,$password,$dbname);
$con=mysqli_select_db($link,$dbname);

if($con){
    
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
    <title>Feedback Page</title>
    <link rel="stylesheet" href="feedbackstyle.css">
</head>
<body>
    <h1>Feedback</h1>

    <!-- Feedback Form -->
    <h2>Your Feedback</h2>
        <form action="" method="POST">
        <label for="userId">User ID:</label><br>
        <input type="text" id="userId" name="userId"><br><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="feedback">Feedback:</label><br>
        <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea><br><br>
        <input type="submit" name="Delete" value="Delete">
        <input type="submit" name="Edit" value="Edit">
        <input type="submit" name="Submit" value="Submit">
        
    </form>
    <hr>
    <h2>Customer Feedback</h2>
    
</body>
</html>

    
<?php
    // Submit Feedback

if(isset($_POST["Submit"])) {
    $fname=$_POST["name"];
    $fid=$_POST["userId"];
    $feed=$_POST["feedback"];
    
    
    $query = "INSERT INTO user_feedbacks (Name,User_ID,Feedback) VALUES ('$fname','$fid','$feed')";
    mysqli_query($link, $query);
    echo "<script>alert('Submission successful!');</script>"; // Add JavaScript alert
    
}

    // View data from database

$query = "SELECT * FROM user_feedbacks";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result) > 0) {

    echo "<table border='1'div style='color: white;'>";
    echo "<tr><th>Name</th><th>User ID</th><th>Feedback</th></tr>";
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["User_ID"] . "</td><td>" . $row["Feedback"] . "</td></tr>";
    }
    
    echo "</table>";
} else {
    echo "No feedbacks found";
}

    //Delete Feedback

if(isset($_POST["Delete"])){
    $fid=$_POST["userId"];
    $query = "DELETE FROM user_feedbacks WHERE User_ID='$fid'";
    mysqli_query($link, $query);
    echo '<script>alert("Record deleted successfully");</script>'; // Add JavaScript alert
}
    //Edit Feedback

if(isset($_POST["Edit"])){
    $fid=$_POST["userId"];
    $fname=$_POST["name"];
    $feed=$_POST["feedback"];
    $query = "UPDATE user_feedbacks SET Feedback='$feed', Name='$fname' WHERE User_ID='$fid'";
    mysqli_query($link, $query);
    echo '<script>alert("Record updated successfully");</script>'; // Add JavaScript alert
}
?>
