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
if(mysqli_num_rows($sql)>0){
$arr=['id'=>"",'name'=>"","barcode"=>"","P_Unit_Price"=>"","GST"=>"","stock_id"=>"","total"=>"","stname"=>""];
while ($row = mysqli_fetch_assoc($sql)) {
    $id = $row['id'];
    $name = $row['name'];
    $barcode = $row['barcode'];
    $punitprice = $row['P_Unit_Price'];
    $gstprice = $row['GST'];
    $total = $punitprice + $gstprice;
    $stockid = $row['stock_id'];

        $q2 = "SELECT * FROM stocks WHERE admin='$user' AND id='$stockid'";
        $sq2 = mysqli_query($conn, $q2);

        while ($row2 = mysqli_fetch_assoc($sq2)) {

            $stname = $row2['name'];
        }

        $arr=['id'=>$row['id'],'name'=>$row['name'],"barcode"=>$row['barcode'],"P_Unit_Price"=>$row['P_Unit_Price'],"GST"=>$row['GST'],"stock_id"=>$stockid,"total"=>$total,"stname"=>$stname];

    //echo $punitprice."-".$gstprice."-".$total."-".$id."-".$name."-".$barcode."-".$stname;
}
}
echo json_encode($arr);