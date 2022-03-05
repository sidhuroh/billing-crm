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
        $store_count = $row['store_count'];
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
<?php

$id = $_GET['value'];

$query = "SELECT * FROM brands WHERE admin='$user' AND id='$id'";
$sql = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($sql)) {
    $id = $row['id'];
    $name = $row['name'];
    $barcode = $row['barcode'];
    echo $barcode;
}
