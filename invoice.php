<?php include_once('connection/db.php'); ?>
<?php
$rand_id = $_GET['id'];
$sql = "SELECT * FROM invoice WHERE invoice_rand='$rand_id' AND admin='$user'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    $invoice_for = $row['invoice_for'];
    $invoice_number = $row['invoice_rand'];
    $date = $row['invoice_date'];
}
?>
<?php
//Get Customer Details
$sql = "SELECT * FROM customers WHERE id='$invoice_for'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    $invoice_fn_customer = $row['first_name'];
    $invoice_ln_customer = $row['last_name'];
    $invoice_address = $row['address'];
    $invoice_district = $row['district'];
    $invoice_state = $row['state'];
}
?>
<?php
$sql2 = "SELECT * FROM items WHERE invoice_id='$invoice_number'";
$query2 = mysqli_query($conn, $sql2);
while ($rows = mysqli_fetch_assoc($query2)) {
    $price2 += $rows['price'];
    $main2 = $rows['price'];
}
$final2 = $price2;
$final2 . "/-";
?>

<!DOCTYPE html>
<!-- saved from url=(0046)https://ivonne.vercel.app/general-invoice.html -->
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta Tags -->

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <!-- Site Title -->
    <title>General Invoice</title>
    <link rel="stylesheet" href="css/invoice.css">
</head>

<body data-new-gr-c-s-check-loaded="14.1052.0" data-gr-ext-installed="">
    <div class="cs-container">
        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in" id="download_section">
                <div class="cs-invoice_head cs-type1 cs-mb25">
                    <div class="cs-invoice_left">
                        <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16"><b class="cs-primary_color">Invoice No:</b> #<?php echo $rand_id; ?></p>
                        <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date: </b><?php echo $date; ?></p>
                    </div>
                    <div class="cs-invoice_right cs-text_right">
                        <div class="cs-logo cs-mb5"><img src="images/wide-logo.svg" alt="Logo" width="180px"></div>
                    </div>
                </div>
                <div class="cs-invoice_head cs-mb10">
                    <div class="cs-invoice_left">
                        <b class="cs-primary_color">Invoice To:</b>
                        <p>
                            <?php echo $user_name; ?><br>
                            <?php echo $user ?> <br>
                            +91 <?php echo $user_phone; ?>
                        </p>
                    </div>
                    <div class="cs-invoice_right cs-text_right">
                        <b class="cs-primary_color">Pay To:</b>
                        <p>
                            <?php echo $invoice_fn_customer . " " . $invoice_ln_customer; ?> <br>
                            <?php echo $invoice_district; ?>, <?php echo $invoice_state; ?><br>
                            <?php echo $invoice_address; ?><br>
                        </p>
                    </div>
                </div>
                <hr style="height: 1px; background: #eee; border: 0 none;"><br>
                <div class="cs-table cs-style1">
                    <div class="cs-round_border">
                        <div class="cs-table_responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Item</th>
                                        <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Qty</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Value</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Gst</th>
                                        <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg cs-text_right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM items WHERE invoice_id='$invoice_number' AND admin='$user'";
                                    $query = mysqli_query($conn, $sql);
                                    while ($rows = mysqli_fetch_assoc($query)) {
                                        $id = $rows['id'];
                                        $item = $rows['item'];
                                        $qty = $rows['qty'];
                                        $price = $rows['price'];
                                        $discount = $rows['discount'];
                                        $tax = $rows['tax'];
                                        $amount = $rows['amount'];
                                        $admin = $rows['admin'];
                                        echo "<tr>
                            <td class='cs-width_4'>$item</td>
                            <td class='cs-width_2'>$qty</td>
                            <td class='cs-width_3'>Rs. $price</td>
                            <td class='cs-width_1'>$tax</td>
                            <td class='cs-width_2 cs-text_right'>Rs. $amount</td>
                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cs-invoice_footer cs-border_top">
                            <div class="cs-left_footer">
                                <p class="cs-mb0"><b class="cs-primary_color">Additional Information:</b></p>
                                <p class="cs-m0">At check in you may need to present the credit.</p>
                            </div>
                            <div class="cs-right_footer">
                                <table>
                                    <tbody>
                                        <tr class="cs-border_left">
                                            <td class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Subtoal</td>
                                            <td class="cs-width_2 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">Rs. <?php echo $final2; ?>/-</td>
                                        </tr>
                                        <tr class="cs-border_left">
                                            <td class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Discount</td>
                                            <td class="cs-width_2 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">0</td>
                                        </tr>
                                        <tr class="cs-border_left">
                                            <td class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">GST</td>
                                            <td class="cs-width_2 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">5%</td>
                                        </tr>
                                        <tr class="cs-border_left">
                                            <td class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Due Amount</td>
                                            <td class="cs-width_2 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">Rs. 0/-</td>
                                        </tr>
                                        <tr class="cs-border_left">
                                            <td class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Total Amount</td>
                                            <td class="cs-width_2 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">Rs. <?php
                                                                                                                                $sql3 = "SELECT * FROM items WHERE invoice_id='$invoice_number'";
                                                                                                                                $query3 = mysqli_query($conn, $sql3);
                                                                                                                                while ($rows = mysqli_fetch_assoc($query3)) {
                                                                                                                                    $price3 += $rows['price'];
                                                                                                                                    $main3 = $rows['price'];
                                                                                                                                }
                                                                                                                                echo $percentage = $price3 * 1.05;

                                                                                                                                ?>/-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="cs-invoice_footer">
                        <div class="cs-left_footer cs-mobile_hide"></div>
                        <div class="cs-right_footer">
                            <table>
                                <tbody>
                                    <tr class="cs-border_none">
                                        <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Amount Paid</td>
                                        <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">Rs. <?php echo $percentage; ?>/-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="cs-note">
                    <div class="cs-note_left">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path>
                            <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                        </svg>
                    </div>
                    <div class="cs-note_right">
                        <p class="cs-mb0"><b class="cs-primary_color cs-bold">Note:</b></p>
                        <p class="cs-m0">Here we can write a additional notes for the client to get a better understanding of this invoice.</p>
                    </div>
                    <br><br>
                </div>
                <br><br>
                <center>
                    <p style='font-size: 13.5; color: #333;'>Powered By <a href="#" style="color: #666666; text-decoration: none; font-weight: 400;">BILLBUSS.COM</a></p>
                </center>

                <!-- .cs-note -->
            </div>
            <div class="cs-invoice_btns cs-hide_print">
                <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path>
                        <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></rect>
                        <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></path>
                        <circle cx="392" cy="184" r="24"></circle>
                    </svg>
                    <span>Print</span>
                </a>
                <button id="download_btn" class="cs-invoice_btn cs-color2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <title>Download</title>
                        <path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path>
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M176 272l80 80 80-80M256 48v288"></path>
                    </svg>
                    <span>Download</span>
                </button>
            </div>
        </div>
    </div>
    <script src="./General Invoice_files/jquery.min.js"></script>
    <script src="./General Invoice_files/jspdf.min.js"></script>
    <script src="./General Invoice_files/html2canvas.min.js"></script>
    <script src="./General Invoice_files/main.js"></script>

</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>