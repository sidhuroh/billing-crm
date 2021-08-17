<?php
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "billbuss";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
if (isset($_SESSION['username'])) {
    $user = $_SESSION["username"];
} else {
    $user = "No User";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>