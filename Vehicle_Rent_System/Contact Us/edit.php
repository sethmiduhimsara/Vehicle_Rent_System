<?php
$con = new mysqli('localhost', 'root', '', 'pearl_drive');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    // Update process
    $user_id = $_POST['user_id'];
    $new_message = $_POST['message'];

    // Update the message in the database
    $sql = "UPDATE user_contact SET message='$new_message' WHERE User_ID=$user_id";

    if ($con->query($sql) === TRUE) {
        echo "Message updated successfully!";
    } else {
        echo "Error updating message: " . $con->error;
    }
} elseif (isset($_GET['id'])) {
    // Fetch the message based on User_ID
    $user_id = $_GET['id'];
    $sql = "SELECT User_ID, name, email, message FROM user_contact WHERE User_ID = $user_id";
    $result = $con->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $message = $row['message'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Message</title>
    <style>
        /* Your CSS Styles Here */
    </style>
</head>
<body>
    <h2>Edit Message</h2>
    <form method="post" action="">
        <input type="hidden" name="user_id" value="<?php echo $row['User_ID']; ?>">
        <textarea name="message" rows="4" cols="50"><?php echo $message; ?></textarea><br><br>
        <input type="submit" value="Update Message">
    </form>
</body>
</html>
<?php
        } else {
            echo "Message not found!";
        }
    } else {
        echo "Error fetching message: " . $con->error;
    }
} else {
    echo "Invalid request!";
}

$con->close();
?>
