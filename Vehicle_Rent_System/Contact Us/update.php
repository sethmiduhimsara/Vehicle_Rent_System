<?php
require 'connects.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['User_ID'] ?? '';
    $message = $_POST['message'] ?? '';

    // Check if required fields are empty
    if(empty($userID) || empty($message)) {
        echo "User ID and message are required";
    } else {
        // connection to the database
        $con = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        // Prepare SQL statement
        $sql = "UPDATE user_contact SET message=? WHERE User_ID=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $message, $userID);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Message updated successfully";
        } else {
            echo "Error updating message: " . $con->error;
        }

        // Close statement and connection
        $stmt->close();
        $con->close();
    }
}
?>

<!-- HTML form to submit the User_ID and new message -->

<form method="post" class="form-1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="User_ID">User ID:</label><br>
    <input type="text" id="User_ID" name="User_ID"><br>
    <label for="message">New Message:</label><br>
    <textarea id="message" name="message"></textarea><br>
    <input type="submit" value="Update Message">
</form>


<style>
 .form-1 {
        margin: 50px auto;
        max-width: 400px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    /* Style for form labels */
    .form-1 label {
        font-weight: bold;
    }
    /* Style for form inputs */
    .form-1 input[type="text"],
    .form-1 textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    /* Style for form submit button */
    .form-1 input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    /* Style for form submit button on hover */
    .form-1 input[type="submit"]:hover {
        background-color: #45a049;
    }

</style>