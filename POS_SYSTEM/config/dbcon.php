<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_DATABASE','pointofsale');

// Create connection (use variable name $conn so other files can use global $conn)
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE, 3307);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>