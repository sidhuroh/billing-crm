<?php
include_once("connection/db.php");
if ($status == "active") {
    session_unset();
    session_destroy();
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
    exit();
} else {
    session_unset();
    session_destroy();
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php?hold=1\">";
    exit();
}
