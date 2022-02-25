<?php
include_once("connection/header.php");
?>
<?php
$rand_id = $_GET['id'];
$sql = "SELECT * FROM invoice WHERE invoice_rand='$rand_id' AND admin='$user'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    $invoice_number = $row['invoice_rand'];
    $date = $row['invoice_date'];
}
?>
<title>Dashboard - Invoice | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>
                <?php
                if ($user_type == "superadmin") {
                ?>
                    Super Admins
                <?php
                } else if ($user_type == "storeadmin") {
                ?>
                    Create Invoice
                <?php
                }
                ?>
            </f>
        </div>
    </div>
    <div style='clear: both;'></div>
    <div id="margin-setter3">
        <div style='padding: 20px 40px;'>
            <div style='background: #fff; padding: 20px; overflow-x: auto; border-radius: 4px;'>
                <div class='flex-container2'>
                    <div style='flex: 33.3%;'>
                        <p style='font-size: 21px; font-weight: 700; color: #444;'>From,</p><br>
                        <img src='images/wide-logo.svg' width='150px'>
                        <br><br>
                        <p style='font-size: 14px; color: #333;'><?php echo $user_name; ?></p>
                        <p style='font-size: 14px; color: #333;'><?php echo $user; ?></p>
                        <p style='font-size: 14px; color: #333;'>+91 <?php echo $user_phone; ?></p>
                    </div>
                    <div style='flex: 33.3%; border-left: 1px solid #eee;'>
                        <div style='padding-left: 20px;'>
                            <p style='font-size: 21px; font-weight: 700; color: #444;'>To,</p><br>
                            <label style='font-size: 12px;'>Select Customer
                                <?php
                                $sql = "SELECT * FROM customers WHERE admin='$user'";
                                $query = mysqli_query($conn, $sql);
                                while ($rows = mysqli_fetch_assoc($query)) {
                                    $first_name = $rows['first_name'];
                                    $last_name = $rows['last_name'];
                                }
                                ?>
                                <select name="customer" class='input_inv_style'>
                                    <?php
                                    $sql = "SELECT * FROM customers WHERE admin='$user'";
                                    $query = mysqli_query($conn, $sql);
                                    while ($rows = mysqli_fetch_assoc($query)) {
                                        $id = $rows['id'];
                                        $first_name = $rows['first_name'];
                                        $last_name = $rows['last_name'];
                                        echo '<option vaue="' . $id . '">' . $first_name . ' ' . $last_name . '</option>';
                                    }
                                    ?>
                                </select></label>

                            <a href='add-customer.php' style='color: #023e8a; float: right; padding: 5px; text-decoration: none; font-size: 12px;'>+New Customer</a>
                        </div>
                    </div>
                    <div style='flex: 33.3%; border-left: 1px solid #eee;'>
                        <div style='padding: 15px; text-align: center;'>
                            <p style='font-size: 12.5px; font-weight: 500; color: #888;'>Purchase Inv No.
                            <p style='font-size: 18px; font-weight: 500; color: #333;'><?php echo $invoice_number; ?></p>
                            </p>
                            <br>
                            <p style='font-size: 12.5px; font-weight: 500; color: #888;'>Purchase Inv Date.
                            <p style='font-size: 12.5px; font-weight: 500; color: #333;'><?php echo $date; ?></p>
                            </p>
                        </div>
                    </div>
                </div><br>
                <hr style='height: 1px; background: #eee; border: 0 none;'>
                <style>
                    #customers {
                        font-family: "Roboto";
                        border-collapse: collapse;
                        width: 100%;
                    }

                    #customers td,
                    #customers th {
                        padding: 10px 5px;
                        color: #555;
                        font-weight: 300;
                        font-size: 12px;
                    }

                    #customers tr:nth-child(even) {
                        background-color: #fff;
                    }

                    #customers tr:hover {
                        background-color: #ddd;
                    }

                    #customers th {
                        border: 1px solid #e3f2fd;
                        padding: 10px 5px;
                        text-align: left;
                        border-bottom: 2px solid #0077b6;
                        background-color: #e3f2fd;
                        color: #333;
                        font-weight: 700;

                    }
                </style>
                <br>
                <form action="invoice-engine.php?id=<?php echo $rand_id; ?>" method="POST" style="display: inline;">
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var html = '<tr><td><select name="item[]" class="invoice_input">' +
                                '<?php $query = "SELECT * FROM stocks";
                                    $sql = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                        $name = $row['name'];
                                        echo "<option value=$name>$name</option>";
                                    } ?>' +
                                '</select></td><td><input type="text" name="qty[]" class="invoice_input" value="1"></td><td><input type="text" name="price[]" class="invoice_input" value="250"></td><td><input type="text" name="discount[]" class="invoice_input" value="5%"></td><td><input type="text" name="tax[]" class="invoice_input" value="5%"></td><td><input type="text" name="amount[]" class="invoice_input" value="100"></td><td><input type="button" id="remove" class="invoice_input_times" value="Remove"></td>';

                            var max = 5;
                            var x = 1;

                            $('#add_more').click(function() {
                                $("#customers").append(html);
                                x++;
                            });
                            $('#add_more2').click(function() {
                                if (x <= max) {
                                    $("#customers").append(html);
                                    x++;
                                }
                            });
                            $('#customers').on('click', '#remove', function() {
                                $(this).closest('tr').remove();
                                x--;
                            });
                        });
                    </script>
                    <table id="customers">
                        <tr>
                            <th>ITEMS</th>
                            <th>QTY</th>
                            <th>PRICE/ITEM(₹)</th>
                            <th>DISCOUNT</th>
                            <th>TAX</th>
                            <th>AMOUNT</th>
                            <th>ACTION</th>
                        </tr>
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
                            <td>$item</td>
                            <td>$qty</td>
                            <td>$price</td>
                            <td>$discount</td>
                            <td>$tax</td>
                            <td>$amount</td>
                            <td><a href='delete-invoice-item.php?id=$id&&inv=$invoice_number' style='text-decoration: none;' class='invoice_input_times'>Remove</td>
                        </tr>";
                        }
                        ?>
                        <?php
                        if (isset($_POST['save'])) {
                            $txtItem = $_POST['item'];
                            $txtQty = $_POST['qty'];
                            $txtPrice = $_POST['price'];
                            $txtDiscount = $_POST['discount'];
                            $txtTax = $_POST['tax'];
                            $txtAmount = $_POST['amount'];
                            foreach ($txtItem as $key => $value) {
                                $save = "INSERT INTO items(id,item,qty,price,discount,tax,amount,invoice_id,admin)Values(null,'" . $value . "','" . $txtQty[$key] . "','" . $txtPrice[$key] . "','" . $txtDiscount[$key] . "','" . $txtTax[$key] . "','" . $txtAmount[$key] . "','" . $invoice_number . "','" . $user . "')";
                                $query = mysqli_query($conn, $save);
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=#\">";
                            }
                        }
                        ?>
                    </table>
                    <input type="submit" name="save" value="Save" style="font-size: 12px; cursor: pointer; float: right; background: #0F2C67; margin: 10px; border: 1px solid #0F2C67; padding: 10px; border-radius: 8px; color: #fff;">
                </form>
                <button id="add_more2" style="font-size: 12px; cursor: pointer; float: right; background: transparent; margin: 10px; border: 1px solid #eee; padding: 10px; border-radius: 8px; color: #888;">Add More Items+</button>
                <br><br>
                <br><br>
                <hr style='height: 1px; background: #eee; border: 0 none;'>
                <br>
                <div style='float: right; width: 250px; border-radius: 8px;'>
                    <br>

                    <p style='padding: 5px; color: #333; font-weight: 300;'>Sub Total Amount <?php
                                                                                                $sql2 = "SELECT * FROM items WHERE invoice_id='$invoice_number'";
                                                                                                $query2 = mysqli_query($conn, $sql2);
                                                                                                while ($rows = mysqli_fetch_assoc($query2)) {
                                                                                                    $price2 += $rows['price'];
                                                                                                    $main2 = $rows['price'];
                                                                                                }
                                                                                                $final2 = $price2;
                                                                                                echo $final2 . "/-";
                                                                                                ?></p>
                    <p style='padding: 5px; color: #333; font-weight: 300;'>Tax / GST : 5%</p>
                    <center>
                        <p style="font-size: 24px; padding: 20px; font-weight: 700; color: #0F2C67;">Total<br>
                            <f style='font-weight: 400; font-size: 20px; color: #333;'>
                                <?php
                                $sql3 = "SELECT * FROM items WHERE invoice_id='$invoice_number'";
                                $query3 = mysqli_query($conn, $sql3);
                                while ($rows = mysqli_fetch_assoc($query3)) {
                                    $price3 += $rows['price'];
                                    $main3 = $rows['price'];
                                }
                                echo $percentage = $price3 * 1.05;

                                ?>
                            </f>
                        </p>
                    </center>
                </div>
                <div style="clear: both"></div>
                <center><input type="submit" name="Generate" value="Generate Invoice" class="generate_invoice_btn"></center>

            </div>
        </div>
    </div>
</div>