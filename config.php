<?php
// you can use sesssion too there is no different output appears in browser
session_start();
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname ="gamestore";
// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword,$dbname);
// Check connection
echo "Connected";

if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}



?>