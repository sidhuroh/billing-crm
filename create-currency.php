<?php
include_once("connection/header.php");
?>
<title>Dashboard - Edit Currency | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Create Currency</f>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 40px;'>
        <div style='background: #fff; margin-right: auto; margin-left: auto; max-width: 800px; border-radius: 8px; border: 2px solid #eee;'>
            <div style='padding: 20px;'>
                <?php
                $currency_id = @$_GET['id'];
                $sql = "SELECT * FROM currencies WHERE id='$currency_id'";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    $title = $row['title'];
                    $symbol = $row['symbol'];
                    $status = $row['status'];
                }
                ?>
                <?php
                $update_btn = @$_POST['update'];
                if ($update_btn) {
                    $currency_symbol = strip_tags(@$_POST['currency_symbol']);
                    $currency_title = strip_tags(@$_POST['currency_title']);
                    if ($currency_symbol && $currency_title) {
                        $sql = "INSERT INTO `currencies`(`id`, `title`, `symbol`, `status`) VALUES (null,'$currency_title','$currency_symbol','active')";
                        $query = mysqli_query($conn, $sql);
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=currencies-config.php\">";
                    } else {
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create-currency.php?id=$currency_id&&updated=0\">";
                    }
                }
                $report = @$_GET['updated'];
                if ($report == "1") {
                    $report = "<p style='margin-bottom: 10px; border-radius: 4px; color: #fff; background: #52b788; padding: 10px;'><i class='fas fa-check-square'></i> Currency Has Been Successfully Updated!</p>";
                } else if ($report == "0") {
                    $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> Inputs cannot be empty!</p>";
                } else {
                }
                echo $report;
                ?>
                <form action='#' method='POST'>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Currency Symbol</p>
                            <input type='text' name="currency_symbol" placeholder="e.g $" value="<?php echo $symbol; ?>" class="form_control" />
                        </div>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Currency Name</p>
                            <input type='text' name="currency_title" placeholder="e.g Dollar" value="<?php echo $title; ?>" class="form_control" />
                        </div>
                    </div>
                    <div style='padding: 10px;'>
                        <input type='submit' name="update" value="Save" class="form_control_submit" />
                    </div>
                </form>