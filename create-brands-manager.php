<?php
include_once("connection/header.php");
$stock_id = $_GET['id'];
?>

<title>Dashboard - Create Brands | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Store Admins > Add Brands</f>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 40px;'>
        <div style='background: #fff; margin-right: auto; margin-left: auto; max-width: 800px; border-radius: 8px; border: 2px solid #eee;'>
            <div style='padding: 20px;'>
                <?php
                $update_btn = @$_POST['update'];
                if ($update_btn) {
                    $name_input = strip_tags(@$_POST['name']);
                    if ($name_input) {
                        $store_name_check = "SELECT name from stocks WHERE name='$name_input' AND admin='$user'";
                        $result2 = mysqli_query($conn, $store_name_check);
                        $result_check2 = mysqli_num_rows($result2);
                        if (!$result_check2 > 0) {
                            $query = "INSERT INTO `brands` (`id`, `name`, `status`, `admin`, `stock_id`) VALUES (null,'$name_input','active','$user','$stock_id')";
                            $result = mysqli_query($conn, $query);
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=brands-manager.php?id=$stock_id\">";
                        } else {
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=create-brands-manager.php?id=$id&&updated=3\">";
                        }
                    } else {
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create-brands-manager.php?id=$id&&updated=0\">";
                    }
                }
                $report = @$_GET['updated'];
                if ($report == "0") {
                    $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> You Leave Stock Name Input Empty!</p>";
                } else if ($report == "3") {
                    $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> Stock for $user Already Exist!</p>";
                } else {
                }
                echo $report;
                ?>
                <p style='font-weight: 600; font-size: 18px; color: #555;'>Create Stock</p><br>
                <script type="text/javascript">
                    $(document).ready(function() {
                        // do not allow users to enter spaces:
                        $(".username").on({
                            keydown: function(event) {
                                if (event.which === 32)
                                    return false;
                            },
                            // if a space copied and pasted in the input field, replace it (remove it):
                            change: function() {
                                this.value = this.value.replace(/\s/g, "");
                            }
                        });
                    });
                </script>
                <form action='#' method='POST'>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Stock Name</p>
                            <input id="username" type='text' name="name" placeholder="Enter Stock Name" value="<?php echo $name; ?>" class="form_control" />
                        </div>
                    </div>
                    <div style='padding: 10px;'>
                        <input type='submit' name="update" value="Generate Stock" class="form_control_submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>