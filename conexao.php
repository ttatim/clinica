<?php
$servername = "localhost";
$username = "root";
$password = "passwd";
$dbname = "dbclinica";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
