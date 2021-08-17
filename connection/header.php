<!DOCTYPE html>
<?php include_once('db.php'); ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/main.css">
<script src="https://kit.fontawesome.com/318618787a.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="./images/logo.svg" type="image/x-icon" />
<div class="sidebar" id="sidebar_toggle">
    <button id="hide_btn2" class="desktop_hide" style="background: transparent; float: left;  border: 0px none; color: #1b3a4b; padding: 5px; margin-top: 5px; margin: 10px; float: right;" onclick="panel1()"><i class="fas fa-bars" style="font-size: 18px; "></i></button>
    <br><br><br>
    <center><img style="filter: brightness(0) invert(1);" src="images/wide-logo.svg" width="150px"></center><br><br><br>
    <button class="sidebar_link" onclick="main1()"><i class="fas fa-tachometer-alt" style="padding-right: 15px;"></i> Dashboard</button>
    <br><br>
    <p style="font-weight: 600; margin-left: 30px; font-size: 12px; color: #dee2e6;">MANAGEMENT</p><br>
    <button class="sidebar_link" onclick="main5()"><i class="fas fa-users" style="padding-right: 15px;"></i> Set Roles</button><br>
    <button class="sidebar_link" onclick="main7()"><i class="fas fa-star" style="padding-right: 15px;"></i> Membership</button>
    <br><br>
    <p style="font-weight: 600; margin-left: 30px; font-size: 12px; color: #dee2e6;">General</p><br>
    <button class="sidebar_link" onclick="main7()"><i class="fas fa-cogs" style="padding-right: 15px;"></i> Settings</button>
    <a href='logout.php'><button class="sidebar_link"><i class="fas fa-power-off" style="padding-right: 15px;"></i> Logout</button></a>
</div>
<div id="header_toggle">
    <div id="margin-setter">
        <div style="padding: 10px;">
            <button id="hide_btn" class="mobile_hide" style="background: #fff; float: left;  border: 1px solid #eee; padding: 10px; margin-top: 5px; color: #888;" onclick="panel1()"><i class="fas fa-bars"></i></button>
            <button id="show_btn" style="float: left; display: none; background: #43aa8b; border: 1px solid #eee; padding: 10px; margin-top: 5px; color: #fff;" onclick="panel2()"><i class="fas fa-bars"></i></button>
            <a href='index.php'><button class="mobile_hide" id="Home" style="background: #fff; float: left;  border: 1px solid #eee; padding: 10px; margin-top: 5px; color: #888; margin-left: 10px;"><i class="fas fa-home"></i></button></a>
            <a href='logout.php'><button id="logout" style="float: right; background: #023e8a; border: 1px solid #023e8a; border-radius: 4px; padding: 10px; margin-top: 5px; color: #fff;"><i class="fas fa-power-off"></i> Logout</button></a>
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
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>