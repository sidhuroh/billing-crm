<?php
include_once("connection/header.php");
?>

<title>Dashboard - Edit Role | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Store Admins > Edit Role</f>
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
                $query = "SELECT * from users WHERE id = '$role_id'";
                $result = mysqli_query($conn, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $name = $rows['user_name'];
                    $email = $rows['email'];
                    $phone = $rows['phone'];
                    $store_count = $rows['store_count'];
                }
                ?>
                <?php
                $update_btn = @$_POST['update'];
                if ($update_btn) {
                    $name_input = strip_tags(@$_POST['user_name']);
                    $email_input = strip_tags(@$_POST['email']);
                    $phone_input = strip_tags(@$_POST['phone']);
                    $store_count_input = strip_tags(@$_POST['store_count']);
                    $password_input = strip_tags(@$_POST['password']);
                    $confirm_password_input = strip_tags(@$_POST['confirm_password']);
                    if ($name_input && $email_input && $phone_input && $store_count_input) {
                        if ($password_input && $confirm_password_input) {
                            if ($password_input == $confirm_password_input) {
                                $query = "UPDATE `users` SET `user_name`='$name_input',`email`='$email_input',`store_count`='$store_count_input',`phone`='$phone_input',`password`='$password_input' WHERE id='$id'";
                                $result = mysqli_query($conn, $query);
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-role.php?id=$id&&updated=1\">";
                            } else {
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-role.php?id=$id&&updated=2\">";
                            }
                        } else {
                            $query = "UPDATE `users` SET `user_name`='$name_input',`email`='$email_input',`store_count`='$store_count_input',`phone`='$phone_input' WHERE id='$id'";
                            $result = mysqli_query($conn, $query);
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-role.php?id=$id&&updated=1\">";
                        }
                    } else {
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=edit-role.php?id=$id&&updated=0\">";
                    }
                }
                $report = @$_GET['updated'];
                if ($report == "1") {
                    $report = "<p style='margin-bottom: 10px; border-radius: 4px; color: #fff; background: #52b788; padding: 10px;'><i class='fas fa-check-square'></i> Profile Has Been Successfully Updated!</p>";
                } else if ($report == "0") {
                    $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> You Cannot Leave Name, Email, Phone, Store Input Empty!</p>";
                } else if ($report == "2") {
                    $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> Both Passwords Dont Match!</p>";
                } else {
                }
                echo $report;
                ?>
                <p style='font-weight: 600; font-size: 18px; color: #555;'>Edit Profile</p><br>
                <form action='#' method='POST'>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>First Name</p>
                            <input type='text' name="user_name" placeholder="John Doe" value="<?php echo $name; ?>" class="form_control" />
                        </div>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Email</p>
                            <input type='email' name="email" placeholder="info@exmple.com" value="<?php echo $email; ?>" class="form_control" />
                        </div>
                    </div>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Phone</p>
                            <input type='tel' name="phone" placeholder="+91 9988776655" value="<?php echo $phone; ?>" class="form_control" />
                        </div>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>No. Of Stores</p>
                            <input type='number' name="store_count" placeholder="10 - 50" value="<?php echo $store_count; ?>" class="form_control" />
                        </div>
                    </div>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Password</p>
                            <input type='password' name="password" value="" class="form_control" />
                        </div>
                        <div style='flex-grow: 1;'>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Confirm Password</p>
                            <input type='confirm_password' name="confirm_password" class="form_control" />
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