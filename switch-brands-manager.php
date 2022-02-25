<?php
include_once("connection/db.php");
$role_id = @$_GET['id']; // get id through query string
$stock_id = @$_GET['stock_id'];
$query = "SELECT * from brands WHERE id = '$role_id'";
$result = mysqli_query($conn, $query);

while ($rows = mysqli_fetch_assoc($result)) {
    $status = $rows['status'];
}
if ($status == "inactive") {
    $query = "UPDATE `brands` SET `status`='active' WHERE `id`='$role_id'";
    $switch = mysqli_query($conn, $query); // switch query
    if ($switch) {
        mysqli_close($conn); // Close connection
        echo "<meta http-equiv=\"refresh\" content=\"0; url=brands-manager.php?id=$stock_id\">"; // redirects to all records page
        exit;
    } else {
        echo "Error Switching record"; // display error message if not delete
    }
} else {
    $query = "UPDATE `brands` SET `status`='inactive' WHERE `id`='$role_id'";
    $switch = mysqli_query($conn, $query); // switch query
    if ($switch) {
        mysqli_close($conn); // Close connection
        echo "<meta http-equiv=\"refresh\" content=\"0; url=brands-manager.php?id=$stock_id\">"; // redirects to all records page
        exit;
    } else {
        echo "Error Switching record"; // display error message if not delete
    }
}
