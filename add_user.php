<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Frog Technical Test - Add User</title>
    </head>
    <body>
        <h1>Add new user</h1>
        <?php 
                                
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "frog_db";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    $sql = "SELECT role_id,role_name FROM role";
                    $result = $conn->query($sql);
        ?>
        
        <form action="insert_into_user.php" method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $username='';?>"></td>
                </tr>

                <tr>
                    <td>First name</td>
                    <td><input type="text" name="first_name" value="<?php echo $first_name='';?>"></td>
                </tr>

                <tr>
                    <td>Last name</td>
                    <td><input type="text" name="last_name" value="<?php echo $last_name='';?>"></td>
                </tr>

                <tr>
                    <td>E-Mail</td>
                    <td><input type="text" name="email" value="<?php echo $email='';?>"></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                    <?php
//halifax 564
                    //echo "testovic";

                    if ($result->num_rows > 0) {
                        echo "<select name=\"user_role_id\">";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['role_id'] . "'>" . $row['role_name'] . "</option>";
                        }
                        echo "</select>";
                    }

                    $conn->close();

                        ?>                    
                    
                    </td>
                </tr>

                <tr>
                    <td>Enabled</td>
                    <td><input type="checkbox" name="enabled" /></td>
                </tr>
                <tr>
                    <td><input type="submit"></td>
                    <td><input type="button" value="Cancel" onclick="history.back();" /></td>
                </tr>
            </table>
            
        </form>
        
    </body>
</html>
