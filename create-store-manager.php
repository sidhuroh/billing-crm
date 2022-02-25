<?php
include_once("connection/header.php");
?>

<title>Dashboard - Create Store | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Store Admins > Create Store</f>
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
                    $name_input = strip_tags(@$_POST['user_name']);
                    $store_desc = strip_tags(@$_POST['store_desc']);
                    if ($name_input && $store_desc) {
                        $store_name_check = "SELECT store_name from stores WHERE store_name='$name_input'";
                        $result2 = mysqli_query($conn, $store_name_check);
                        $result_check2 = mysqli_num_rows($result2);
                        if (!$result_check2 > 0) {
                            $query = "INSERT INTO `stores` (`id`, `store_name`, `store_desc`, `status`, `store_by`) VALUES (null,'$name_input','$store_desc','active','$user')";
                            $result = mysqli_query($conn, $query);
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=store-manager.php\">";
                        } else {
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=create-store-manager.php?id=$id&&updated=3\">";
                        }
                    } else {
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create-store-manager.php?id=$id&&updated=0\">";
                    }
                }
                $report = @$_GET['updated'];
                if ($report == "0") {
                    $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> You Cannot Leave Store Name, Store Description Input Empty!</p>";
                } else if ($report == "3") {
                    $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> Store Already Exist!</p>";
                } else {
                }
                echo $report;
                ?>
                <p style='font-weight: 600; font-size: 18px; color: #555;'>Create Profile</p><br>
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
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Store Username</p>
                            <input id="username" type='text' name="user_name" placeholder="Enter Store Name" value="<?php echo $name; ?>" class="form_control" />
                        </div>
                    </div>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Store Address</p>
                            <textarea name="store_desc" class="form_control" placeholder='Where is the store located?' style="resize: none; height: 90px;" /></textarea>
                        </div>
                    </div>
                    <div style='padding: 10px;'>
                        <input type='submit' name="update" value="Generate Store" class="form_control_submit" />
                    </div>
                </form>
                <script type="text/javascript">
                    $(document).ready(function() {
                        // do not allow users to enter spaces:
                        $("#username").on({
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
                <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
            </div>
        </div>
    </div>