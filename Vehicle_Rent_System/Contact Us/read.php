<?php
require 'connect.php';

$sql = "SELECT User_ID, name, email, message FROM user_contact";
$result = $con->query($sql);

if ($result->num_rows > 0) {

    echo "<table class='table-1' border='1'>";
    echo"<tr><th>Uesr_ID</th><th>Name</th><th>E-mail</th><th>message</th><th>Action</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["User_ID"] . "</td>" .
            "<td>" . $row["name"] . "</td>" .
            "<td>" . $row["email"] . "</td>" .
            "<td>" . $row["message"] . "</td>" .
            "<td><a href='update.php?id=" . $row["User_ID"] . "'>EDIT</a></td>" .
            "<td><a href='delete.php?id=" . $row["User_ID"] . "'>DELETE</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "NO RESULTS";
}
?>

<style>
.table-1 {
    margin-left: auto;
    margin-right: auto;
    width: 80%;
    border-collapse: collapse;
    border: 2px solid #ddd;
}

/* Style for table rows */
.table-1 tr {
    background-color: #f2f2f2;
}

/* Style for table header cells */
.table-1 th {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
    background-color: #032684;
    color: white;
}

/* Style for table data cells */
.table-1 td {
    border: 1px solid #ddd;
    padding: 12px;
    color: #032684;
}

/* Style for table links */
.table-1 a {
    color: #032684;
    text-decoration: none;
}
</style>