<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_users";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, "3308");

// Check connection
if ($conn) {

}
else {
   die("Connection Failed <br>");
}

?>