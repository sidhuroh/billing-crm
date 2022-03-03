<?php
include_once("connection/header.php");
?>

<title>Dashboard - Add New Contact | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Add New Contact</f>
            <br>
            <a href='stocks-manager.php' style='text-decoration: none; color: #023e8a;'>Dashboard</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='customers.php' style='text-decoration: none; color: #023e8a;'>Customers</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='#' style='text-decoration: none; color: #023e8a;'>Create Contact</a>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 40px;'>
        <div style='background: #fff; margin-right: auto; margin-left: auto; max-width: 800px; border-radius: 8px; border: 2px solid #eee;'>
            <div class="custom_flex_50">
                <div class="centered-element">
                    <img src="images/contact.svg" width="60%">
                    <br><br>
                </div>
            </div>
            <div class="custom_flex_50">
                <div style="padding: 40px;">
                    <?php
                    $save = @$_POST['save'];
                    if ($save) {
                        $first_name = strip_tags(@$_POST['first_name']);
                        $last_name = strip_tags(@$_POST['last_name']);
                        $email = strip_tags(@$_POST['email']);
                        $mobile = strip_tags(@$_POST['mobile']);
                        $state = strip_tags(@$_POST['state']);
                        $district = strip_tags(@$_POST['district']);
                        $address = strip_tags(@$_POST['address']);
                        if ($first_name && $email && $mobile && $state && $address) {
                            $query = "INSERT INTO `customers`(`id`, `first_name`, `last_name`, `email`, `phone`, `state`, `district`, `address`, `admin`) VALUES (null, '$first_name', '$last_name', '$email', '$mobile', '$state', '$district', '$address', '$user')";
                            $result = mysqli_query($conn, $query);
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=customers.php\">";
                        } else {
                            echo "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> You Cannot Leave Input fields Empty!</p>";
                        }
                    }
                    ?>
                    <form action="#" method="POST">

                        <p style='font-weight: 300; font-size: 14px; color: #333;'><i class="fas fa-user"></i> First Name<f style='color: red;'>*</f>
                        </p>
                        <input id="first_name" type='text' name="first_name" placeholder="John" value="<?php echo $first_name; ?>" class="form_control" />
                        <br><br>
                        <p style='font-weight: 300; font-size: 14px; color: #333;'><i class="fas fa-user"></i> Last Name</p>
                        <input id="last_name" type='text' name="last_name" placeholder="Doe" value="<?php echo $last_name; ?>" class="form_control" />
                        <br><br>
                        <p style='font-weight: 300; font-size: 14px; color: #333;'><i class="fas fa-envelope"></i> Email<f style='color: red;'>*</f>
                        </p>
                        <input id="email" type='email' name="email" placeholder="email" value="<?php echo $email; ?>" class="form_control" />
                        <br><br>
                        <p style='font-weight: 300; font-size: 14px; color: #333;'><i class="fas fa-phone-alt"></i> Phone<f style='color: red;'>*</f>
                        </p>
                        <input id="mobile" type='tel' name="mobile" placeholder="+91 8888888888" value="<?php echo $mobile; ?>" class="form_control" />
                        <br><br>
                        <p style='font-weight: 300; font-size: 14px; color: #333;'><i class="fas fa-map-pin"></i> State<f style='color: red;'>*</f>
                        </p>
                        <input id="state" type='text' name="state" placeholder="State" value="<?php echo $state; ?>" class="form_control" />
                        <br><br>
                        <p style='font-weight: 300; font-size: 14px; color: #333;'><i class="fas fa-location-arrow"></i> District</p>
                        <input id="district" type='text' name="district" placeholder="district" value="<?php echo $district; ?>" class="form_control" />
                        <br><br>
                        <p style='font-weight: 300; font-size: 14px; color: #333;'><i class="fas fa-compass"></i> Address<f style='color: red;'>*</f>
                        </p>
                        <textarea name="address" class="form_control1"><?php echo $address; ?></textarea>
                        <br><br>
                        <input type='submit' name="save" value="Save" class="form_control_submit" />
                    </form>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
</div>