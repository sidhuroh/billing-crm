<?php
include_once("connection/header.php");
?>

<title>Dashboard - Create Store | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Store Admins > Edit Store Branch</f>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 40px;'>
        <div style='background: #fff; margin-right: auto; margin-left: auto; max-width: 800px; border-radius: 8px; border: 2px solid #eee;'>
            <div style='padding: 20px;'>
                <?php
                $role_id = @$_GET['id'];
                $query = "SELECT * from stores WHERE id = '$role_id'";
                $result = mysqli_query($conn, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $name = $rows['store_name'];
                    $store_address = $rows['store_desc'];
                }
                ?>
                <?php
                $update_btn = @$_POST['update'];
                if ($update_btn) {
                    $name_input = strip_tags(@$_POST['user_name']);
                    $store_desc = strip_tags(@$_POST['store_desc']);
                    if ($store_desc) {
                        $query = "UPDATE `stores` SET `store_name`='$name_input',`store_desc`='$store_desc' WHERE id='$id'";
                        $result = mysqli_query($conn, $query);
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-store-manager.php?id=$id\">";
                    } else {
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-store-manager.php?id=$id&&updated=0\">";
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
                <p style='font-weight: 600; font-size: 18px; color: #555;'>Create Another Branch</p><br>
                <form action='#' method='POST'>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Store Branch</p>
                            <input type='name' name="user_name" value="<?php echo $name; ?>" class="form_control">
                        </div>
                    </div>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Store Address</p>
                            <textarea name="store_desc" class="form_control" placeholder='Where is the store located?' style="resize: none; height: 90px;" /><?php echo $store_address ?></textarea>
                        </div>
                    </div>
                    <div style='padding: 10px;'>
                        <input type='submit' name="update" value="Save Store" class="form_control_submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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