<?php
include_once("connection/header.php");
$stock_id = $_GET['id'];
?>

<title>Dashboard - Brands Manager | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Brands Manager
            </f>
            <a href='create-brands-manager.php?id=<?php echo $stock_id; ?>' style='margin-left: 20px; text-decoration: none; font-weight: 700; color: #fff; background: #f72585; border-radius: 4px; padding: 10px;'><i class="fas fa-plus"></i> Add New</a>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 20px 40px;'>
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
                background-color: #f2f2f2;
            }

            #customers tr:hover {
                background-color: #ddd;
            }

            #customers th {
                border: 1px solid #e3f2fd;
                padding: 15px;
                text-align: left;
                border-bottom: 2px solid #0077b6;
                background-color: #e3f2fd;
                color: #333;
                font-weight: 700;
            }
        </style>
        <div style='background: #fff; padding: 40px; overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap; border: 1px solid #eee; border-radius: 10px; box-shadow: 13px 17px 28px -20px rgba(97,97,97,0.68);
-webkit-box-shadow: 13px 17px 28px -20px rgba(97,97,97,0.68);
-moz-box-shadow: 13px 17px 28px -20px rgba(97,97,97,0.68);'>
            <?php
            $report = @$_GET['delete_report'];
            if ($report == "1") {
                echo $report = "<p style='margin-bottom: 10px; border-radius: 4px; color: #fff; background: #ff006e; padding: 10px;'>Brand Has Been Successfully Deleted!</p>";
            }
            $report;
            ?>
            <table id="customers">
                <tr>
                    <th>ID</th>
                    <th>Brands Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                $query = "SELECT * from brands WHERE admin = '$user' AND stock_id='$stock_id'";
                $result = mysqli_query($conn, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $brands_name = $rows['name'];
                    $status = $rows['status'];
                    if ($status == "active") {
                        $color_status = "<f style='background: #2ec4b6; padding: 5px; border-radius 15px; color: #fff;'>$status</f>";
                    } else {
                        $color_status = "<f style='background: #eee; padding: 5px; border-radius 15px; color: #888;'>Closed</f>";
                    }
                    echo "<tr>
                    <td><b>#$id</b></td>
                    <a href=''><td>$brands_name</td></a>
                    <td>$color_status</td>
                    <td><a href='edit-brands-manager.php?id=$id' style='color: #fff; background: #3a86ff; padding: 8px; margin-right: 8px; border-radius: 8px;'><i class='fas fa-edit'></i></a>
                    <a onclick='show_alert$id();' style='color: #fff; background: #ff006e; padding: 8px; margin-right: 8px; border-radius: 8px;'><i class='fas fa-trash'></i></a>
                    <a onclick='show_alert2$id();' style='color: #fff; background: #fcbf49; padding: 8px; border-radius: 8px;'><i class='fas fa-power-off'></i></a></td>
                </tr>
                ";
                ?>
                    <script>
                        function show_alert<?php echo $id; ?>() {
                            var check = confirm("Are you sure you want to delete <?php echo $brands_name; ?>?");
                            if (check == true) {
                                window.location = "delete-brands-manager.php?id=<?php echo $id ?>&&stock_id=<?php echo $stock_id ?>";
                            } else {
                                //Do Nothing!
                            }
                        }
                    </script>
                    <script>
                        function show_alert2<?php echo $id; ?>() {
                            var check = confirm("Are you sure you want to switch status of <?php echo $brands_name; ?>?");
                            if (check == true) {
                                window.location = "switch-brands-manager.php?id=<?php echo $id ?>&&stock_id<?php echo $stock_id ?>";
                            } else {
                                //Do Nothing!
                            }
                        }
                    </script>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<script>
    function show_alert() {
        return confirm('Are you sure?');
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>