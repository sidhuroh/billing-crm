<?php
include_once("connection/db.php");
$role_id = @$_GET['id']; // get id through query string
$query = "SELECT * from stores WHERE id = '$role_id'";
$result = mysqli_query($conn, $query);

while ($rows = mysqli_fetch_assoc($result)) {
    $status = $rows['status'];
}
if ($status == "inactive") {
    $query = "UPDATE `stores` SET `status`='active' WHERE `id`='$role_id'";
    $switch = mysqli_query($conn, $query); // switch query
    if ($switch) {
        mysqli_close($conn); // Close connection
        echo "<meta http-equiv=\"refresh\" content=\"0; url=store-manager.php?delete_report=2\">"; // redirects to all records page
        exit;
    } else {
        echo "Error Switching record"; // display error message if not delete
    }
} else {
    $query = "UPDATE `stores` SET `status`='inactive' WHERE `id`='$role_id'";
    $switch = mysqli_query($conn, $query); // switch query
    if ($switch) {
        mysqli_close($conn); // Close connection
        echo "<meta http-equiv=\"refresh\" content=\"0; url=store-manager.php?delete_report=2\">"; // redirects to all records page
        exit;
    } else {
        echo "Error Switching record"; // display error message if not delete
    }
}
