<?php
include_once("connection/header.php");
?>

<title>Dashboard - Home | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Dashboard</f>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
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
                    <p style='font-size: 40px; text-align: center; margin-left: 20px; font-weight: 700;'>0</p>
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
                        <div class="number">50%</div>
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
<script>
    const numb = document.querySelector(".number");
    let counter = 0;
    setInterval(() => {
        if (counter == 50) {
            clearInterval();
        } else {
            counter += 2;
            numb.textContent = counter + "%";
        }
    }, 120);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>