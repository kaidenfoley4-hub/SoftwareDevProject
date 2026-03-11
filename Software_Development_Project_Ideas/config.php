<?php
$servername = "sql210.infinityfree.com";
$username   = "if0_41315523";
$password   = "trqOsxZSKf28";
$dbname     = "if0_41315523_faf";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>