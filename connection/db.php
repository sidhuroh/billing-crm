<?php
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "billbuss";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
if (isset($_SESSION['username'])) {
    $user = $_SESSION["username"];
    //Fetch User Details
    $query = "SELECT * FROM users WHERE email='$user'";
    $sql = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($sql)) {
        $user_id = $row['id'];
        $user_name = $row['user_name'];
        $user_type = $row['user_type'];
    }
} else {
    $user = "No User";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>