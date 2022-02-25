<?php
include_once("connection/header.php");
?>

<title>Dashboard - Configs | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'><i class="fas fa-cogs"></i> GST Configs</f>
            <a href='create-gst.php' style='margin-left: 20px; text-decoration: none; font-weight: 700; color: #fff; background: #f72585; float: right; border-radius: 4px; padding: 10px;'><i class="fas fa-plus"></i> Add New</a>
            <br><a href='dashboard.php' style='text-decoration: none; color: #023e8a;'>Dasboard</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='' style='text-decoration: none; color: #023e8a;'>General</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='#' style='text-decoration: none; color: #023e8a;'>GST Config</a>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 20px 40px;'>
        <div style='background: #fff; padding: 40px; overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap; border: 1px solid #eee; border-radius: 10px; box-shadow: 13px 17px 28px -20px rgba(97,97,97,0.68);
-webkit-box-shadow: 13px 17px 28px -20px rgba(97,97,97,0.68);
-moz-box-shadow: 13px 17px 28px -20px rgba(97,97,97,0.68);'>
            <style>
                #customers {
                    font-family: "Roboto";
                    border-collapse: collapse;
                    width: 100%;
                }

                #customers td,
                #customers th {
                    padding: 15px;
                    color: #555;
                    font-weight: 300;
                }

                #customers tr:nth-child(even) {
                    background-color: #f1f1f1;
                }

                #customers tr:hover {
                    background-color: #ccc;
                }

                #customers th {
                    border: 1px solid #eee;
                    padding: 15px;
                    text-align: left;
                    border-bottom: 2px solid #eee;
                    background-color: #ffff;
                    color: #333;
                    font-weight: 700;
                }
            </style>

            <?php
            $report = @$_GET['delete_report'];
            if ($report == "1") {
                echo $report = "<p style='margin-bottom: 10px; border-radius: 4px; color: #fff; background: #52b788; padding: 10px;'><i class='fas fa-check-square'></i> GST Has Been Deleted Successfully!</p>";
            }
            ?>

            <table id="customers">
                <tr>
                    <th>Unique. ID</th>
                    <th>Title</th>
                    <th>Percent</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                $query = "SELECT * from gst";
                $result = mysqli_query($conn, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $percent = $rows['percent'];
                    $status = $rows['status'];
                    if ($status == "active") {
                        $color_status = "<f style='background: #2ec4b6; padding: 5px; border-radius 15px; color: #fff;'>$status</f>";
                    } else {
                        $color_status = "<f style='background: #eee; padding: 5px; border-radius 15px; color: #888;'>Closed</f>";
                    }
                    echo "<tr>
                    <td><b>#$id</b></td>
                    <td>$title</td>
                    <td>$percent</td>
                    <td>$color_status</td>
                    <td><a href='edit-gst.php?id=$id' style='color: #fff; background: #3a86ff; padding: 8px; margin-right: 8px; border-radius: 8px;'><i class='fas fa-edit'></i></a>
                    <a href='delete-gst.php?id=$id' style='color: #fff; background: #ff006e; padding: 8px; margin-right: 8px; border-radius: 8px;'><i class='fas fa-trash'></i></a>
                    </td>
                </tr>
                ";
                ?>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>