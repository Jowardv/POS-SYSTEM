<?php
// ...existing code...
define('DB_SERVER', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_DATABASE','pointofsale');

// Use default MySQL port (omit explicit 5th argument) so mysqli uses the server default (usually 3306)
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
}
?>
// ...existing code...