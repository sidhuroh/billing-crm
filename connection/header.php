<?php include_once('db.php'); ?>

<!DOCTYPE html>
<?php
if (isset($_SESSION['username'])) {
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
    exit();
}
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/jquery-ui.theme.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://kit.fontawesome.com/318618787a.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="./images/logo.svg" type="image/x-icon" />
<div class="sidebar" id="sidebar_toggle">
    <button id="hide_btn2" class="desktop_hide" style="background: transparent; float: left;  border: 0px none; color: #1b3a4b; padding: 5px; margin-top: 5px; margin: 10px; float: right;" onclick="panel1()"><i class="fas fa-bars" style="font-size: 18px; "></i></button>
    <br><br>
    <?php
    if ($user_type == "superadmin") {
    ?>
        <div style="margin-left: auto; margin-right: auto; width: 80%; padding: 20px;">
            <img src="images/logo.svg" style="background: #fff; border: 1px solid #eee; border-radius: 8px; float: left; margin-right: 10px;" width="40px">
            <p style="font-weight: 700; float: left; margin-top: 5px;"><?php echo $user_name; ?></p><br>
            <p style="font-weight: 400; text-transform: capitalize; margin-top: 5px; color: #888; "><?php echo $user_type; ?></p>
            <br>
            <br>
            <form action="#" method="GET">
                <!-- <input type="text" name="q" placeholder="Search" class="search_sidebar"> -->
            </form>
            <center>
                <?php
                $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
                if ($curPageName == 'dashboard.php') {
                    echo '<a href="dashboard.php"><button class="sidebar_link" style="color: #fff; background: #0874f0; color: #fff; padding-left: 10px; border-radius: 10px;"><i class="fas fa-tachometer-alt" style="padding-right: 15px; color: #fff;"></i> Dashboard</button></a>';
                } else {
                    echo '<a href="dashboard.php"><button class="sidebar_link"><i class="fas fa-tachometer-alt" style="padding-right: 15px; color: #888;"></i> Dashboard</button></a>';
                }
                ?>

                <br>
                <hr style="background: #eee; border: 0 none; height: 1px; margin-top: 10px; margin-bottom: 10px;">
                <br>
            </center>
            <p style="font-weight: 400; font-size: 12px; color: #888;">Management</p><br>
            <center>
                <a href='role-manager.php'><button class="sidebar_link"><i class="fas fa-users" style="padding-right: 15px;"></i> Set Roles</button><br></a>
                <button class="sidebar_link" onclick="panel3()"><i class="fas fa-star" style="padding-right: 15px;"></i> Membership</button>
                <br>
                <hr style="background: #eee; border: 0 none; height: 1px; margin-top: 10px; margin-bottom: 10px;">
                <br>
            </center>
            <p style="font-weight: 400; font-size: 12px; color: #888;">General</p><br>
            <center>
                <button class="sidebar_link" onclick="sidebar()"><i class="fas fa-cogs" style="padding-right: 15px;"></i> Settings</button>
                <div id="more_settings" style="display: none;">
                    <a href='edit-role.php?id=<?php echo $user_id; ?>'><button class="sidebar_link2"><i class="fas fa-arrow-right"></i> Profile Update</button></a>
                    <a href='currencies-config.php'><button class="sidebar_link2"><i class="fas fa-arrow-right"></i> Currencies</button></a>
                    <a href='units-config.php'><button class="sidebar_link2"><i class="fas fa-arrow-right"></i> Units</button></a>
                    <a href='gst-config.php'><button class="sidebar_link2"><i class="fas fa-arrow-right"></i> GST</button></a>
                    <a href='taxes-config.php'><button class="sidebar_link2"><i class="fas fa-arrow-right"></i> Taxes</button></a>
                    <a href='states-config.php'><button class="sidebar_link2"><i class="fas fa-arrow-right"></i> States</button></a>
                </div>
                <a href='logout.php'><button class="sidebar_link"><i class="fas fa-power-off" style="padding-right: 15px;"></i> Logout</button></a>
                <center>
        </div>

    <?php
    } else if ($user_type == "storeadmin") {
    ?>
        <div style="margin-left: auto; margin-right: auto; width: 80%; padding: 20px;">
            <img src="images/logo.svg" style="background: #fff; border: 1px solid #eee; border-radius: 8px; float: left; margin-right: 10px;" width="40px">
            <p style="font-weight: 700; float: left; margin-top: 5px;"><?php echo $user_name; ?></p><br>
            <p style="font-weight: 400; text-transform: capitalize; margin-top: 5px; color: #888; "><?php echo $user_type; ?></p>
            <br>
            <br>
            <form action="#" method="GET">
                <!-- <input type="text" name="q" placeholder="Search" class="search_sidebar"> -->
            </form>
            <center>
                <?php
                $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
                if ($curPageName == 'dashboard.php') {
                    echo '<a href="dashboard.php"><button class="sidebar_link" style="color: #fff; background: #0874f0; color: #fff; padding-left: 10px; border-radius: 10px;"><i class="fas fa-tachometer-alt" style="padding-right: 15px; color: #fff;"></i> Dashboard</button></a>';
                } else {
                    echo '<a href="dashboard.php"><button class="sidebar_link"><i class="fas fa-tachometer-alt" style="padding-right: 15px; color: #888;"></i> Dashboard</button></a>';
                }
                ?>

            </center>
            <br>
            <hr style="background: #eee; border: 0 none; height: 1px; margin-top: 10px; margin-bottom: 10px;">
            <br>
            <p style="font-weight: 400; font-size: 12px; color: #888;">Management</p><br>
            <center>
                <a href='store-manager.php'><button class="sidebar_link"><i class="fas fa-store" style="padding-right: 15px;"></i> Stores</button><br></a>
                <a href='role-manager.php'><button class="sidebar_link"><i class="fas fa-tasks" style="padding-right: 15px;"></i> Stores Managers</button><br></a>
                <a href='stocks-manager.php'><button class="sidebar_link"><i class="fas fa-box" style="padding-right: 15px;"></i> Stocks</button><br></a>
                <a href='customers.php'><button class="sidebar_link"><i class="fas fa-address-card" style="padding-right: 15px;"></i> Customers</button><br></a>
                <a href='invoice-manager.php'><button class="sidebar_link"><i class="fas fa-receipt" style=" padding-right: 15px;"></i> Invoices</button><br></a>
                <a href='coupon-manager.php'><button class="sidebar_link"><i class="fab fa-buffer" style="padding-right: 15px;"></i> Coupon Code</button><br></a>
                <br>
                <hr style="background: #eee; border: 0 none; height: 1px; margin-top: 10px; margin-bottom: 10px;">
                <br>

            </center>
            <p style="font-weight: 400; font-size: 12px; color: #888;">General</p><br>
            <center>
                <button class="sidebar_link" onclick="sidebar()"><i class="fas fa-cogs" style="padding-right: 15px;"></i> Settings</button>
                <div id="more_settings" style="display: none;">
                    <a href='#'><button class="sidebar_link2"><i class="fas fa-arrow-right"></i> Store Details</button></a>
                    <a href='edit-role.php?id=<?php echo $user_id; ?>'><button class="sidebar_link2"><i class="fas fa-arrow-right"></i> Profile Update</button></a>
                </div>
                <a href='logout.php'><button class="sidebar_link"><i class="fas fa-power-off" style="padding-right: 15px;"></i> Logout</button></a>
                <br><br>
        </div>
    <?php
    }
    ?>
</div>
<div id="header_toggle">
    <div id="margin-setter">
        <div style="padding: 10px;">
            <button id="hide_btn" class="mobile_hide" style="background: #fff; float: left;  border: 1px solid #eee; padding: 10px; margin-top: 5px; color: #888;" onclick="panel1()"><i class="fas fa-bars"></i></button>
            <button id="show_btn" style="float: left; display: none; background: #43aa8b; border: 1px solid #eee; padding: 10px; margin-top: 5px; color: #fff;" onclick="panel2()"><i class="fas fa-bars"></i></button>
            <a href='index.php'><button class="mobile_hide" id="Home" style="background: #fff; float: left;  border: 1px solid #eee; padding: 10px; margin-top: 5px; color: #888; margin-left: 10px;"><i class="fas fa-home"></i></button></a>
            <div style='float: right; width: 150px; height: 20px;'>
                <img src='images/default.png' width='40px' height='40px' style='border-radius: 100%; float: left;'>
                <a href='index.php' style='text-transform: capitalize; text-decoration: none; font-weight: 300; margin-left: 10px; font-size: 15px; color: #333; float:left; margin-top: 5px;'><?php echo $user_name; ?><br>
                    <a style='font-weight: 400; margin-left: 10px;'><?php echo $user_type; ?></a></a>
            </div>
        </div>
    </div>
</div>
<script>
    function panel1() {
        document.getElementById("sidebar_toggle").style.display = 'none';
        document.getElementById("show_btn").style.display = 'block';
        document.getElementById("hide_btn").style.display = 'none';
        document.getElementById("header_toggle").style.width = '100%';
        document.getElementById("margin-setter").style.width = '100%';
        document.getElementById("margin-setter2").style.width = '100%';
        document.getElementById("margin-setter3").style.width = '100%';
    }

    function panel2() {
        document.getElementById("sidebar_toggle").style.display = 'block';
        document.getElementById("show_btn").style.display = 'none';
        document.getElementById("hide_btn").style.display = 'block';
        document.getElementById("header_toggle").style.width = '100%';
        document.getElementById("margin-setter").style.width = '80%';
        document.getElementById("margin-setter2").style.width = '80%';
        document.getElementById("margin-setter3").style.width = '80%';
    }

    function sidebar() {
        $("#more_settings").toggle();
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>