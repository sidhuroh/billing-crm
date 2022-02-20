<?php
include_once("connection/db.php");
$inv_id = @$_GET['id']; // get id through query string
$inv_no = @$_GET['inv'];
$query = "DELETE FROM `items` WHERE `id` = '$inv_id'";
$del = mysqli_query($conn, $query); // delete query
if ($del) {
    mysqli_close($conn); // Close connection
    echo "<meta http-equiv=\"refresh\" content=\"0; url=invoice-engine.php?id=$inv_no\">"; // redirects to all records page
    exit;
} else {
    echo "Error deleting record"; // display error message if not delete
}
