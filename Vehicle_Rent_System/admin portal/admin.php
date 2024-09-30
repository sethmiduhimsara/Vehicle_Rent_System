<?php
include '../connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="admin1.css">
</head>

<body>

    <div class="btn" onclick="location.href='../pre_index.php'"><button class="lgout">Log out</button></div>

    <div class="admin-portal">
        <h1>Registered User Details</h1>
        <table class="user-table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>NIC</th>
                    <th>Date of Birth</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Control Panel</th>
                    
                </tr>
            </thead>

            <tbody>


            <?php
            
            $sql="SELECT * FROM reg_user";
            $result=mysqli_query($con, $sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['user_id'];
                    $email=$row['email'];
                    $password=$row['password'];
                    $f_name=$row['f_name'];
                    $l_name=$row['l_name'];
                    $NIC=$row['NIC'];
                    $DOB=$row['DOB'];
                    $mobile=$row['mobile'];
                    $address=$row['address'];

                    echo '<tr>
                    <th> '.$id.' </th>
                    <td> '.$email.' </td>
                    <td> '.$password.' </td>
                    <td> '.$f_name.' </td>
                    <td> '.$l_name.' </td>
                    <td> '.$NIC.' </td>
                    <td> '.$DOB.' </td>
                    <td> '.$mobile.' </td>
                    <td> '.$address.' </td>
                    <td>
                    <button><a href="update.php?updateid='.$id.'"> Edit </a></button>
                    <button><a href="delete.php?deleteid='.$id.'"> Delete </a></button>
                    </td>
                </tr>';
                }
            }
            
            
            ?>

                
            </tbody>


        </table>
        

    </div>
</body>
</html>
