<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'techspec');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>