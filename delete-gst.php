<?php
include_once("connection/db.php");
$gst_id = @$_GET['id']; // get id through query string
$query = "DELETE FROM `gst` WHERE `id` = '$gst_id'";
$del = mysqli_query($conn, $query); // delete query
if ($del) {
    mysqli_close($conn); // Close connection
    echo "<meta http-equiv=\"refresh\" content=\"0; url=gst-config.php?delete_report=1\">"; // redirects to all records page
    exit;
} else {
    echo "Error deleting record"; // display error message if not delete
}
