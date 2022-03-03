<?php
include_once("connection/header.php");
?>
<title>Dashboard - Home | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Dashboard</f>
            <a href='invoice-manager.php' style='float: right; margin-left: 20px; text-decoration: none; font-weight: 700; color: #fff; background: #0092ff; border-radius: 4px; padding: 10px;'><i class="fas fa-file-invoice"></i> &nbsp; Create Invoice</a>
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
                        <f style='font-size: 16px; margin-left: 20px; font-weight: 700;'>Total Sales</f><br>
                        <p style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'></p>
                    </div>
                </div>
                <div>
                    <div style='padding: 15px;'>
                        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/dqkyqxlp.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:80px;height:80px; float: left;">
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
                        <lord-icon src="https://cdn.lordicon.com/rgyftmhc.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:80px;height:80px; float: left;">
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
                        <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:80px;height:80px; float: left;">
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
                    <div style="padding: 40px;">
                        <center>
                            <h2 style='color: #333; font-size: 20px;'>Sales Today</h2><br>
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
                    <div style="padding: 40px;">
                        <center>
                            <h2 style='color: #333; font-size: 20px;'>Weekly</h2><br>
                        </center>
                        <div class="circular" style="margin-left: auto; margin-right: auto;">
                            <div class="inner"></div>
                            <div class="number2">0</div>
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
                    <div style="padding: 40px;">
                        <center>
                            <h2 style='color: #333; font-size: 20px;'>Month</h2><br>
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
                    <div style="padding: 40px;">
                        <center>
                            <h2 style='color: #333; font-size: 20px;'>Yearly</h2><br>
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
            </div>
        <?php
    }
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <script>
            const numb = document.querySelector(".number");
            let counter = 0;
            setInterval(() => {
                if (counter == 0) {
                    clearInterval();
                } else {
                    counter += 50;
                    numb.textContent = counter + "₹";
                }
            }, 120);

            const numb2 = document.querySelector(".number2");
            let counter2 = 0;
            setInterval(() => {
                if (counter2 == 0) {
                    clearInterval();
                } else {
                    counter2 += 200;
                    numb.textContent = counter + "₹";
                }
            }, 120);
        </script>