<?php
include_once("connection/header.php");
?>

<title>Dashboard - Edit Role | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Store Admins > Create Role</f>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 40px;'>
        <div style='background: #fff; margin-right: auto; margin-left: auto; max-width: 800px; border-radius: 8px; border: 2px solid #eee;'>
            <div style='padding: 20px;'>
                <?php
                if ($user_type == "superadmin") {
                ?>
                    <?php
                    $update_btn = @$_POST['update'];
                    if ($update_btn) {
                        $added_on = date('Y-m-d');
                        $name_input = strip_tags(@$_POST['user_name']);
                        $email_input = strip_tags(@$_POST['email']);
                        $phone_input = strip_tags(@$_POST['phone']);
                        $store_count_input = strip_tags(@$_POST['store_count']);
                        $password_input = strip_tags(@$_POST['password']);
                        $confirm_password_input = strip_tags(@$_POST['confirm_password']);
                        if ($name_input && $email_input && $phone_input && $store_count_input && $password_input && $confirm_password_input) {
                            if ($password_input && $confirm_password_input) {
                                if ($password_input == $confirm_password_input) {
                                    $user_check2 = "SELECT email from users WHERE email='$email_input'";
                                    $result2 = mysqli_query($conn, $user_check2);
                                    $result_check2 = mysqli_num_rows($result2);
                                    if (!$result_check2 > 0) {
                                        $query = "INSERT INTO `users`(`id`, `user_name`, `email`, `password`, `logo_img`, `user_type`, `added_on`, `added_to`, `store_count`, `status`, `phone`, `author`, `administrator`) VALUES (null,'$name_input','$email_input','$password_input','','storeadmin','$added_on','','$store_count_input','active','$phone_input', '', '$user')";
                                        $result = mysqli_query($conn, $query);
                                        echo "<meta http-equiv=\"refresh\" content=\"0; url=role-manager.php\">";
                                    } else {
                                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create-role.php?id=$id&&updated=3\">";
                                    }
                                } else {
                                    echo "<meta http-equiv=\"refresh\" content=\"0; url=create-role.php?id=$id&&updated=2\">";
                                }
                            } else {
                                $query = "";
                                $result = mysqli_query($conn, $query);
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=create-role.php?id=$id&&updated=1\">";
                            }
                        } else {
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=create-role.php?id=$id&&updated=0\">";
                        }
                    }
                    $report = @$_GET['updated'];
                    if ($report == "1") {
                        $report = "<p style='margin-bottom: 10px; border-radius: 4px; color: #fff; background: #52b788; padding: 10px;'><i class='fas fa-check-square'></i> Profile Has Been Successfully Updated!</p>";
                    } else if ($report == "0") {
                        $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> You Cannot Leave Name, Email, Phone, Store Input Empty!</p>";
                    } else if ($report == "2") {
                        $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> Both Passwords Dont Match!</p>";
                    } else if ($report == "3") {
                        $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> E-Mail Already Exist!</p>";
                    } else {
                    }
                    echo $report;
                    ?>
                <?php
                } else if ($user_type == "storeadmin") {
                ?>
                    <?php
                    $update_btn = @$_POST['update'];
                    if ($update_btn) {
                        $added_on = date('Y-m-d');
                        $name_input = strip_tags(@$_POST['user_name']);
                        $email_input = strip_tags(@$_POST['email']);
                        $phone_input = strip_tags(@$_POST['phone']);
                        $author = strip_tags(@$_POST['author']);
                        $password_input = strip_tags(@$_POST['password']);
                        $confirm_password_input = strip_tags(@$_POST['confirm_password']);
                        if ($name_input && $email_input && $phone_input && $password_input && $confirm_password_input) {
                            if ($password_input && $confirm_password_input) {
                                if ($password_input == $confirm_password_input) {
                                    $user_check2 = "SELECT email from users WHERE email='$email_input'";
                                    $result2 = mysqli_query($conn, $user_check2);
                                    $result_check2 = mysqli_num_rows($result2);
                                    if (!$result_check2 > 0) {
                                        $query = "INSERT INTO `users`(`id`, `user_name`, `email`, `password`, `user_type`, `added_on`, `added_to`, `store_count`, `status`, `phone`, `author`, `administrator`) VALUES (null,'$name_input','$email_input','$password_input','substoreadmin','$added_on','','','active','$phone_input', '$author', '$user')";
                                        $result = mysqli_query($conn, $query);
                                        echo "<meta http-equiv=\"refresh\" content=\"0; url=role-manager.php\">";
                                    } else {
                                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create-role.php?id=$id&&updated=3\">";
                                    }
                                } else {
                                    echo "<meta http-equiv=\"refresh\" content=\"0; url=create-role.php?id=$id&&updated=2\">";
                                }
                            } else {
                                $query = "";
                                $result = mysqli_query($conn, $query);
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=create-role.php?id=$id&&updated=1\">";
                            }
                        } else {
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=create-role.php?id=$id&&updated=0\">";
                        }
                    }
                    $report = @$_GET['updated'];
                    if ($report == "1") {
                        $report = "<p style='margin-bottom: 10px; border-radius: 4px; color: #fff; background: #52b788; padding: 10px;'><i class='fas fa-check-square'></i> Profile Has Been Successfully Updated!</p>";
                    } else if ($report == "0") {
                        $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> You Cannot Leave Name, Email, Phone, Store Input Empty!</p>";
                    } else if ($report == "2") {
                        $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> Both Passwords Dont Match!</p>";
                    } else if ($report == "3") {
                        $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> E-Mail Already Exist!</p>";
                    } else {
                    }
                    echo $report;
                    ?>
                <?php
                }
                ?>
                <p style='font-weight: 600; font-size: 18px; color: #555;'>Create Profile</p><br>
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
                            <?php
                            if ($user_type == "superadmin") {
                            ?>
                                <p style='font-weight: 300; font-size: 14px; color: #333;'>No. Of Stores</p>
                                <input type='number' name="store_count" placeholder="10 - 50" value="<?php echo $store_count; ?>" class="form_control" />
                            <?php
                            } else if ($user_type == "storeadmin") {
                            ?>
                                <p style='font-weight: 300; font-size: 14px; color: #333;'>Choose One Store</p>
                                <select name="author" class="form_control">
                                    <option value='$author'><?php echo $author ?></option>
                                    <?php
                                    $sql = "SELECT * FROM stores WHERE store_by = '$user'";
                                    $query = mysqli_query($conn, $sql);
                                    while ($rows = mysqli_fetch_assoc($query)) {
                                        $store_name = $rows['store_name'];
                                        echo "<option value='$store_name'>$store_name</option>";
                                    }
                                    ?>
                                </select>
                            <?php
                            }
                            ?>
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
                        <input type='submit' name="update" value="Create Role" class="form_control_submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>