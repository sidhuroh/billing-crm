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
        $user_phone = $row['phone'];
        $author = $row['author'];
        $store_count = $row['store_count'];
        $status = $row['status'];
        if ($store_count == "") {
            $store_count = "0";
        }
        $img = $row['logo_img'];
        if ($img == "") {
            $img_final = "images/wide-logo.svg";
        } else {
            $img_final = "data/" . $img;
        }
    }
} else {
    $user = "No User";
}
?>
<script src="https://unpkg.com/darkreader@4.9.44/darkreader.js"></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>