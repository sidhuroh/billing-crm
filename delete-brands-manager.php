<?php
include_once("connection/db.php");
$role_id = @$_GET['id']; // get id through query string
$stock_id = @$_GET['stock_id'];
$query = "DELETE FROM `brands` WHERE `id` = '$role_id'";
$del = mysqli_query($conn, $query); // delete query
if ($del) {
    mysqli_close($conn); // Close connection
    echo "<meta http-equiv=\"refresh\" content=\"0; url=brands-manager.php?id=$stock_id&&delete_report=1\">"; // redirects to all records page
    exit;
} else {
    echo "Error deleting record"; // display error message if not delete
}
