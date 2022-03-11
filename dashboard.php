<?php
include_once("connection/header.php");
?>
<title>Dashboard - Home | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Dashboard</f>
            <?php
            if (isset($_POST['new_invoice'])) {
                $rand = sprintf("%06d", mt_rand(1, 999999));
                $date = date("d/m/Y");
                $sql = "INSERT INTO invoice (id, invoice_rand, invoice_for, invoice_date, admin, saved, discount_amt, theme) VALUES (null, '$rand', '', '$date', '$user', '0', '', '#0E185F')";
                $query = mysqli_query($conn, $sql);
                echo "<meta http-equiv=\"refresh\" content=\"0; url=generate.php?id=$rand\">";
            }
            ?>
            <form action="dashboard.php" method="POST" style="display: inline;">
                <input type="submit" name="new_invoice" value="Create Invoice+" style='margin-left: 20px; float: right; text-decoration: none; font-weight: 700; color: #fff; background: #f72585; border-radius: 4px; padding: 10px; border: 1px solid #f72585;'>
            </form>
            <br><a href='#' style='text-decoration: none; color: #023e8a;'>Welcome to the dashboard</a>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<?php
if ($user_type == "superadmin") {
?>
    <div id="margin-setter3">
        <div style='padding: 20px;'>
            <div class='flex-container'>
                <div>
                    <div style='padding: 15px;'>
                        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:80px;height:80px; float: left;">
                        </lord-icon>
                        <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Menu Items</f><br>
                        <p style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'>0</p>
                    </div>
                </div>
                <div>
                    <div style='padding: 15px;'>
                        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/lthhecik.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:80px;height:80px; float: left;">
                        </lord-icon>
                        <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Orders</f><br>
                        <p style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'>0</p>
                    </div>
                </div>
            </div>
            <div class='flex-container'>
                <div>
                    <div style='padding: 15px;'>
                        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/uqpazftn.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:80px;height:80px; float: left;">
                        </lord-icon>
                        <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Subscriptions</f><br>
                        <p style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'>0</p>
                    </div>
                </div>
                <div>
                    <div style='padding: 15px;'>
                        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/soseozvi.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:80px;height:80px; float: left;">
                        </lord-icon>
                        <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Subscribers</f><br>
                        <p style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'>
                            <?php
                            $sql = "SELECT * FROM users";
                            $query = mysqli_query($conn, $sql);
                            $rowcount = mysqli_num_rows($query);
                            echo $rowcount;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class='flex-container'>
                <div>
                    <div style="padding: 40px;">
                        <center>
                            <h2 style='color: #333; font-size: 20px;'>Total Sales Today</h2><br>
                        </center>
                        <div class="circular" style="margin-left: auto; margin-right: auto;">
                            <div class="inner"></div>
                            <div class="number">0</div>
                            <div class="circle">
                                <div class="bar left">
                                    <div class="progress"></div>
                                </div>
                                <div class="bar right">
                                    <div class="progress"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                </div>
                <div>

                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
<?php
} else if ($user_type == "storeadmin") {
?>
    <div id="margin-setter3">
        <div style='padding: 20px;'>
            <div class='flex-container'>
                <div>
                    <div style='padding: 15px;'>
                        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:80px;height:80px; float: left;">
                        </lord-icon>
                        <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Today Sales</f><br>
                        <p id="total_sales_sm" style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'>₹<?php
                                                                                                                                    $sql2 = "SELECT * FROM items WHERE admin='$user'";
                                                                                                                                    $query2 = mysqli_query($conn, $sql2);
                                                                                                                                    while ($rows = mysqli_fetch_assoc($query2)) {
                                                                                                                                        $price2 += $rows['amount'];
                                                                                                                                    }
                                                                                                                                    $price2
                                                                                                                                    ?>
                            <br><br>
                            <script>
                                document.getElementById('total_sales_sm').innerHTML = numeral(<?php echo $price2; ?>).format('0.0a');
                            </script>
                        </p>
                    </div>
                </div>
                <div>
                    <div style='padding: 15px;'>
                        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/dqkyqxlp.json" trigger="loop" colors="primary:#121331,secondary:#D82148" style="width:80px;height:80px; float: left;">
                        </lord-icon>
                        <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Number Of Store's</f><br>
                        <p style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'>
                            <?php
                            $sql = "SELECT * FROM stores WHERE store_by='$user'";
                            $query = mysqli_query($conn, $sql);
                            $rowcount = mysqli_num_rows($query);
                            echo $rowcount;
                            ?></p>
                    </div>
                </div>
            </div>
            <div class='flex-container'>
                <div>
                    <div style='padding: 15px;'>
                        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/rgyftmhc.json" trigger="loop" colors="primary:#121331,secondary:#9ADCFF" style="width:80px;height:80px; float: left;">
                        </lord-icon>
                        <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Stocks</f><br>
                        <p style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'><?php
                                                                                                                $sql = "SELECT * FROM stocks WHERE admin='$user'";
                                                                                                                $query = mysqli_query($conn, $sql);
                                                                                                                $rowcount = mysqli_num_rows($query);
                                                                                                                echo $rowcount;
                                                                                                                ?></p>
                    </div>
                </div>
                <div>
                    <div style='padding: 15px;'>
                        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="loop" colors="primary:#121331,secondary:#FFD32D" style="width:80px;height:80px; float: left;">
                        </lord-icon>
                        <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Customers</f><br>
                        <p style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'>
                            <?php
                            $sql = "SELECT * FROM customers WHERE admin='$user'";
                            $query = mysqli_query($conn, $sql);
                            $rowcount = mysqli_num_rows($query);
                            echo $rowcount;
                            ?>

                        </p>
                    </div>
                </div>
            </div>
            <div class='flex-container'>
                <div>
                    <div style="padding: 40px; border-bottom: 5px solid #019267;">
                        <center>
                            <h2 style='color: #333; font-size: 20px;'>Sales Today</h2><br>
                        </center>
                        <div class="circular" style="margin-left: auto; margin-right: auto;">
                            <div class="inner"></div>
                            <div class="number">0</div>
                            <div class="circle">
                                <div class="bar left">
                                    <div class="progress" style="background: #019267;"></div>
                                </div>
                                <div class="bar right">
                                    <div class="progress" style="background: #019267;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div style="padding: 40px; border-bottom: 5px solid #FFD32D;">
                        <center>
                            <h2 style='color: #333; font-size: 20px;'>Weekly</h2><br>
                        </center>
                        <div class="circular" style="margin-left: auto; margin-right: auto;">
                            <div class="inner"></div>
                            <div class="number2">0</div>
                            <div class="circle">
                                <div class="bar left">
                                    <div class="progress" style="background: #FFD32D;"></div>
                                </div>
                                <div class="bar right">
                                    <div class="progress" style="background: #FFD32D;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div style="padding: 40px;  border-bottom: 5px solid #F76E11;">
                        <center>
                            <h2 style='color: #333; font-size: 20px;'>Month</h2><br>
                        </center>
                        <div class="circular" style="margin-left: auto; margin-right: auto;">
                            <div class="inner"></div>
                            <div class="number">0</div>
                            <div class="circle">
                                <div class="bar left">
                                    <div class="progress" style="background: #F76E11;"></div>
                                </div>
                                <div class="bar right">
                                    <div class="progress" style="background: #F76E11;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div style="padding: 40px; border-bottom: 5px solid #D82148;">
                        <center>
                            <h2 style='color: #333; font-size: 20px;'>Yearly</h2><br>
                        </center>
                        <div class="circular" style="margin-left: auto; margin-right: auto;">
                            <div class="inner"></div>
                            <div class="number">0</div>
                            <div class="circle">
                                <div class="bar left">
                                    <div class="progress" style="background: #D82148;"></div>
                                </div>
                                <div class="bar right">
                                    <div class="progress" style="background: #D82148;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <script>
            $(document).ready(function() {
                var count = 0;
                var counting = setInterval(function() {
                    if (count < 101) {
                        $('.number').text(count);
                        count++
                    } else {
                        clearInterval(counting)
                    }
                }, 10);
            });
            $(document).ready(function() {
                var count = 0;
                var counting = setInterval(function() {
                    if (count < 101) {
                        $('.number2').text(count + '%');
                        count++
                    } else {
                        clearInterval(counting)
                    }
                }, 10);
            });
            $(document).ready(function() {
                var count = 0;
                var counting = setInterval(function() {
                    if (count < 101) {
                        $('.number').text(count + '%');
                        count++
                    } else {
                        clearInterval(counting)
                    }
                }, 10);
            });
            $(document).ready(function() {
                var count = 0;
                var counting = setInterval(function() {
                    if (count < 101) {
                        $('.number').text(count + '%');
                        count++
                    } else {
                        clearInterval(counting)
                    }
                }, 10);
            });
        </script>