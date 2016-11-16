<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Frog Technical Test</title>
    </head>
    <body>
        <h1>Frog Technical Test</h1>
        <div>
            <input type="button" value="Add User" onclick="location='add_user.php'" />
        </div>
        
        <div>
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

    $sql = "SELECT user_id, username, first_name, last_name, email, user_role_id, enabled, role_name FROM user u INNER JOIN role r WHERE u.user_role_id = r.role_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        echo "<table border=1  style=\"width:50%\"><tr>"
                . "<th>USER ID</th>"
                . "<th>Username</th>"
                . "<th>First Name</th>"
                . "<th>Last Name</th>"
                . "<th>Email</th>"
                . "<th>Role</th>"
                . "<th>Status</th>"                
                . "</tr>";
        
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr align=\"center\">"
                    . "<td>".$row["user_id"]."</td>"
                    . "<td>".$row["username"]."</td>"
                    . "<td>".$row["first_name"]."</td>"
                    . "<td>".$row["last_name"]."</td>"
                    . "<td>".$row["email"]."</td>"
                    . "<td>".$row["role_name"]."</td>"
                    . "<td>".convert_enabled($row["enabled"])."</td>"
                    . "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();

    function convert_enabled($enabled){
        if($enabled==1){
            return "<font color=\"green\">Enabled</font>";
        }else{
            return "<font color=\"red\">Disabled</font>";
        }
    }

?>
        </div>
            
        
        
    </body>
</html>
