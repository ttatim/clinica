<?php
$servername = "localhost";
$username = "fgacarla_dra";
$password = "@@FgaN0v4P3tr0p0l1s##";
$dbname = "fgacarla_clinica";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
