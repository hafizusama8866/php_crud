<?php
$servername="localhost";
$username= "root";
$password="";
$dbname= "c_info";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die($conn->connect_error);
}
// else{
//     echo "Connected";
// }
