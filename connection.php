<?php
//Database configuration
$servername = "localhost";
$username = "root";
$password = "HirbRWCPj75UF[zE";
$dbname = "root_dobu";

//connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);


//if commands to run if connection failed or successful
if ($conn->connect_error) {
    die("Connection Failed:" .$conn->connect_error);
}
else {
    echo "Connected Successfully:";
}
?>