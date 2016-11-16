<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frog_db";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uname = $_POST["username"];
  $firstname = $_POST["first_name"];
  $lastname = $_POST["last_name"];
  $email = test_mail($_POST["email"]);
  $user_role_id=$_POST["user_role_id"];
  $enabled = test_enabled($_POST["enabled"]);
}

/*
$uname = 'uname test';
$firstname = 'firstname test';
$lastname = 'last_name';
$email = 'email';
$enabled = true;//$_POST["enabled"];
$user_role_id=000;
*/

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "INSERT INTO frog_db.user (username, first_name, last_name, email, user_role_id, enabled) "
        . "VALUES ('".($uname) ."','"
        . ($firstname)."','"
        . ($lastname)."','"
        . ($email)."','"
        . ($user_role_id)."','"
        . ($enabled)."')";


//$sql = "INSERT INTO frog_db.user (username, first_name, last_name, email, user_role_id, enabled) VALUES('un','na','su','em','0','1') ";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


function test_mail($input){
    
    if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
    return "False email!!!";
    }
    return $input;
}
 
function test_enabled($enabled){
    if($enabled==="on"){  
        return 1;
    } else {
        return 0;
    }
}