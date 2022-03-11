<?php
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "billbuss";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
$res=['status'=>0];
if (isset($_SESSION['username'])) {
    $user = $_SESSION["username"];
    //Fetch User Details
    $code=$_POST['code'];
    $query = "SELECT * FROM coupon WHERE code='$code' AND status='active' LIMIT 1";
    $sql = mysqli_query($conn, $query);
    if(mysqli_num_rows($sql)>0){
        $row = mysqli_fetch_assoc($sql);
        $res['row']=$row;
        $res['status']=1;
    }
}
echo json_encode($res);
?>
