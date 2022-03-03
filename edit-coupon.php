<?php
include_once("connection/header.php");
?>

<title>Dashboard - Edit Role | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555; padding-right: 10px;'>Edit Coupon</f><br>
            <a href='dashboard.php' style='text-decoration: none; color: #023e8a;'>Dasboard</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='#' style='text-decoration: none; color: #023e8a;'>General</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='coupon-manager.php' style='text-decoration: none; color: #023e8a;'>Coupons</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='#' style='text-decoration: none; color: #023e8a;'>Edit Coupon</a>
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
                $query = "SELECT * from coupon WHERE id = '$role_id'";
                $result = mysqli_query($conn, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $code = $rows['code'];
                    $coupon_type = $rows['coupon_type'];
                    $start_date = $rows['start_date'];
                    $end_date = $rows['end_date'];
                    $value = $rows['coupon_value'];
                }
                ?>
                <?php
                $update_btn = @$_POST['update'];
                if ($update_btn) {
                    $code_input = strip_tags(@$_POST['code']);
                    $type_input = strip_tags(@$_POST['type']);
                    $start_input = strip_tags(@$_POST['start']);
                    $end_input = strip_tags(@$_POST['end']);
                    $value_input = strip_tags(@$_POST['value']);

                    if ($code_input && $type_input && $value_input) {
                        $query = "UPDATE `coupon` SET `code`='$code_input',`coupon_type`='$type_input',`coupon_value`='$value_input',`start_date`='$start_input',`end_date`='$end_input' WHERE id = '$role_id'";
                        $result = mysqli_query($conn, $query);
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-coupon.php?id=$id&&updated=1\">";
                    } else {
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-coupon.php?id=$id&&updated=0\">";
                    }
                }
                ?>
                <p style='font-weight: 600; font-size: 18px; color: #555;'>Edit Coupon Code</p><br>
                <form action='#' method='POST'>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Coupon Coude</p>
                            <input type='text' name="code" placeholder="ABC123" value="<?php echo $code; ?>" class="form_control" />
                        </div>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Coupon Coude</p>
                            <select name="type" class="form_control">
                                <option value="<?php echo $coupon_type; ?>"><?php echo $coupon_type; ?> ✓</option>
                                <option value="Fixed">Fixed</option>
                                <option value="percentage">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333; float: left;'>Start Date</p>
                            <p style='font-weight: 500; font-size: 14px; color: #333; float: right;'><?php echo $start_date; ?></p>
                            <input type='date' name="start" placeholder="ABC123" value="" class="form_control" />
                        </div>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333; float: left;'>End Date</p>
                            <p style='font-weight: 500; font-size: 14px; color: #333; float: right;'><?php echo $end_date; ?></p>
                            <input type='date' name="end" placeholder="ABC123" value="" class="form_control" />
                        </div>
                    </div>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Coupon Value</p>
                            <input type='text' name="value" placeholder="e.g. 1000" value="<?php echo $value; ?>" class="form_control" />
                        </div>
                    </div>

                    <div style='padding: 10px;'>
                        <input type='submit' name="update" value="Update" class="form_control_submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>