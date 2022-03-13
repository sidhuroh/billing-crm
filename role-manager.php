<?php
include_once("connection/header.php");
?>

<title>Dashboard - Store Admins | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>
                <?php
                if ($user_type == "superadmin") {
                ?>
                    Manage Stores
                    <a href='create-role.php' style='margin-left: 20px; text-decoration: none; font-weight: 700; color: #fff; background: #f72585; border-radius: 4px; padding: 10px; float: right;'><i class='fas fa-plus'></i> Add New</a>
                <?php
                } else if ($user_type == "storeadmin") {
                ?>
                    Manage Store Branches
                    <?php
                    $sql = "SELECT * FROM users WHERE administrator='$user'";
                    $query = mysqli_query($conn, $sql);
                    $admin_store_limit = mysqli_num_rows($query);
                    $admin_store_limit;

                    $sql = "SELECT * FROM users WHERE email='$user' AND user_type='storeadmin'";
                    $query = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($query)) {
                        $check_store_count = $rows['store_count'];
                    }

                    if ($admin_store_limit >= $check_store_count) {
                        echo "<div style='float: right; padding: 5px 10px; border-radius: 8px; border: 1px solid #FF7272; background: #FC4F4F;'><f style='font-size: 12px; font-weight: 400; color: #fff;'>Limit Reached!</f><br><f style='font-size: 10px; font-weight: 300; color: #fff;'>Please contact your administrator!</f></div>";
                    } else {
                        echo "<a href='create-role.php' style='margin-left: 20px; text-decoration: none; font-weight: 700; color: #fff; background: #f72585; border-radius: 4px; padding: 10px; float: right;'><i class='fas fa-plus'></i> Add New</a>";
                    }
                    ?>
                <?php
                }
                ?>
            </f>


            <br><a href='dashboard.php' style='text-decoration: none; color: #023e8a;'>Dasboard</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='' style='text-decoration: none; color: #023e8a;'><?php
                                                                        if ($user_type == "superadmin") {
                                                                        ?>
                    Manage Stores
                <?php
                                                                        } else if ($user_type == "storeadmin") {
                ?>
                    Manage Store Branches
                <?php
                                                                        }
                ?></a>
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
                border: 1px solid #f1f1f1;
                font-weight: 300;
            }

            #customers tr:nth-child(even) {
                border: 1px solid #f1f1f1;
            }

            #customers tr:hover {
                background-color: #eee;
            }

            #customers th {
                border: 1px solid #e3f2fd;
                padding: 15px;
                text-align: left;
                border-bottom: 2px solid #0077b6;
                background-color: #fefefe;
                color: #333;
                font-weight: 700;
                font-size: 13px;
                text-transform: uppercase;
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
                $report = "<p style='margin-bottom: 10px; border-radius: 4px; color: #fff; background: #ff006e; padding: 10px;'>Admin Role Has Been Successfully Deleted!</p>";
            }
            $report;
            ?>
            <table id="customers">
                <tr>
                    <th>ID</th>

                    <?php
                    if ($user_type == "superadmin") {
                    ?>
                        <th>Store Name</th>
                    <?php
                    } else if ($user_type == "storeadmin") {
                    ?>
                        <th>Manager Name</th>
                    <?php
                    }
                    ?>

                    <?php
                    if ($user_type == "superadmin") {
                    } else if ($user_type == "storeadmin") {
                    ?>
                        <th>Store Branch</th>
                    <?php
                    }
                    ?>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Validity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                if ($user_type == "superadmin") {
                    $query = "SELECT * from users WHERE user_type = 'storeadmin'";
                } else if ($user_type == "storeadmin") {
                    $query = "SELECT * from users WHERE user_type = 'substoreadmin' and administrator = '$user'";
                }
                $result = mysqli_query($conn, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $name = $rows['user_name'];
                    $email = $rows['email'];
                    $phone = $rows['phone'];
                    $author = $rows['author'];

                    $added_on = $rows['added_on'];
                    $status = $rows['status'];
                    if ($status == "active") {
                        $color_status = "<f style='background: #2ec4b6; padding: 5px; border-radius 15px; color: #fff;'>$status</f>";
                    } else {
                        $color_status = "<f style='background: #eee; padding: 5px; border-radius 15px; color: #888;'>Closed</f>";
                    }
                    $query = "SELECT store_name from stores WHERE id = '$author'";
                    $result = mysqli_query($conn, $query);
                    while ($rows = mysqli_fetch_array($result)) {
                        $author_final_id = $rows['id'];
                        $author_final = $rows['store_name'];
                    }
                    echo "<tr>
                    <td><b>#$id</b></td>
                    <td>$name</td>
                    ";
                    if ($user_type == "superadmin") {
                    } else if ($user_type == "storeadmin") {
                        echo "<td>$author_final</td>";
                    }

                    echo "
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$added_on</td>
                    <td>$color_status</td>
                    <td><a href='edit-role.php?id=$id' style='color: #fff; background: #3a86ff; padding: 8px; margin-right: 8px; border-radius: 8px;'><i class='fas fa-edit'></i></a>
                    <a onclick='show_alert$id();' style='color: #fff; background: #ff006e; padding: 8px; margin-right: 8px; border-radius: 8px;'><i class='fas fa-trash'></i></a>
                    <a onclick='show_alert2$id();' style='color: #fff; background: #fcbf49; padding: 8px; border-radius: 8px;'><i class='fas fa-power-off'></i></a></td>
                </tr>
                ";
                ?>
                    <script>
                        function show_alert<?php echo $id; ?>() {
                            var check = confirm("Are you sure you want to delete <?php echo $name; ?>?");
                            if (check == true) {
                                window.location = "delete-role.php?id=<?php echo $id ?>";
                            } else {
                                //Do Nothing!
                            }
                        }
                    </script>
                    <script>
                        function show_alert2<?php echo $id; ?>() {
                            var check = confirm("Are you sure you want to switch status of <?php echo $name; ?>?");
                            if (check == true) {
                                window.location = "switch-status-role.php?id=<?php echo $id ?>";
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