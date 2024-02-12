<?php

define("HOSTNAME","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_NAME","blog");

$conn = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn){
    echo mysqli_connect_errno();
}


// <?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "blog";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// //echo "Connected successfully";
?>