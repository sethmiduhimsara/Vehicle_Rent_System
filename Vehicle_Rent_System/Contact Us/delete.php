<?php
require 'connect.php';

if (isset($_GET['id'])) {
    $message_id = $_GET['id'];

    // Sanitize the ID to prevent SQL injection
    $message_id = mysqli_real_escape_string($con, $message_id);

    // Construct the SQL query to delete the message
    $sql = "DELETE FROM user_contact WHERE User_ID = '$message_id'";

    // Execute the query
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Redirect back to the page where messages are displayed
        header("Location: delete-m.php"); // Replace messages.php with the appropriate page
        exit();
    } else {
        echo "Error deleting message: " . mysqli_error($con);
    }
} else {
    // If message ID is not provided in the URL, display an error message
    echo "Message ID not provided";
}
?>