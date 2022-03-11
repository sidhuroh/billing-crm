<?php
include_once("connection/header.php");
?>
<?php
$rand_id = $_GET['id'];
$client_id = "";
$total_discount = 0;
$sql = "SELECT * FROM invoice WHERE invoice_rand='$rand_id' AND admin='$user'";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
    $invoice_number = $row['invoice_rand'];
    $date = $row['invoice_date'];
    $theme = $row['theme'];
    $client_id = $row['invoice_for'];
    $total_discount = $row['discount_amt'];
}

function get_brand($item_id)
{
    global $conn;
    $row = [];
    $sql = "SELECT * FROM brands WHERE id='$item_id'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
    }
    return $row;
}
?>
<style>

</style>
<title>Dashboard - Invoice | Billing</title>
<div id="margin-setter2">
    <div style="background: #fff;">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>
                Create Invoice
                <br><a href='dashboard.php' style='text-decoration: none; color: #023e8a;'>Dasboard</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
                <a href='' style='text-decoration: none; color: #023e8a;'>Generate Invoice</a>
            </f>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<link href="css/select.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        <?php
        $clist = [];
        $sql = "SELECT * FROM customers WHERE admin='$user'";
        $query = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($query)) {

            $id = $rows['id'];
            $first_name = $rows['first_name'];
            $last_name = $rows['last_name'];
            $email = $rows['email'];
            $mobile = $rows['phone'];
            $single = ['id' => $id, "text" => $first_name . ' ' . $last_name . ', ' . $email . ', ' . $mobile];
            $clist[] = $single;
        }
        ?>
        var country = [];
        $("#country").select2({
            data: <?= json_encode($clist) ?>
        });
        $('#country').val('<?= $client_id ?>').trigger('change');
    });
</script>
<script>
    $(function() {
        $("#datepicker").datepicker();
    });
</script>
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
        background-color: #f1f1f1;
    }

    #customers th {
        padding: 10px 5px;
        text-align: left;
        border-bottom: 1px solid #eee;
        background-color: #fff;
        color: #333;
        font-weight: 700;
    }
</style>
<div id="margin-setter3">
    <div style='padding: 20px 40px;'>
        <div style='background: #fff; max-width: 1000px; margin-right: auto; margin-left: auto; padding: 40px; border-radius: 8px; overflow-x: auto;'>
            <form action="generate.php" method="POST">
                <p style='float: right; font-weight: 400; color: #000;'>Date: <input type="text" name="todate" id="datepicker" style="border: 0px; padding: 10px; font-weight: 300; outline: none; width: 100px;" value="<?php echo $date; ?>"><i class="fas fa-calendar" style="color: #000; font-weight: 300;"></i></p>
                <div id="swatch">
                    <input type="color" id="color" name="theme" value="<?php echo $theme; ?>">
                    <div class="info">
                        <h1>Theme</h1>
                    </div>
                </div>
                <br><br><br>

                <center>
                    <p style='font-size: 24px; font-weight: 400;'>Invoice #<f style='color: #93A7D1; font-weight: 300; font-size: 24px;'><?php echo $rand_id; ?></f>
                </center>
                <br>
                <br>
                <hr style='background: #f1f1f1; border: 0 none; height: 1px;'>
                <br>
                <br>
                <label for="client" style="font-weight: 400;">Customer<br>
                    <hr style='background: #fff; border: 0 none; height: 1px; margin-top: 5px; margin-bottom: 5px;'>
                    <select id="country" name="client" id="client class=" invoice_inp">
                        <!-- Dropdown List Option -->
                    </select>
                </label>
                <a href="#" style="font-size: 16px; cursor: pointer; float: right; background: #0E185F; margin: 10px; border: 4px solid #0E185F; padding: 10px; border-radius: 4px; color: #fff; text-decoration: none;">+ Add Customer <i class="fas fa-user-circle"></i></a>
                <div style="clear: both;"></div>
                <br><br>
                <hr style='background: #f1f1f1; border: 0 none; height: 1px;'>
                <table id="customers">
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Tax / GST</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    <?php

                    $sql_items = "select * from items where invoice_id='$rand_id'";
                    $query_items = mysqli_query($conn, $sql_items);
                    $start = 1;
                    while ($row_item = mysqli_fetch_array($query_items)) {

                        $data_list = '<datalist id="itemname' . $start . '" name="itemname[]">';
                        $query_sel = "SELECT * FROM brands WHERE admin='$user'";
                        $sql_sel = mysqli_query($conn, $query_sel);
                        while ($row_sel = mysqli_fetch_assoc($sql_sel)) {
                            $id = $row_sel['id'];
                            $name = $row_sel['name'];
                            $barcode = $row_sel['barcode'];
                            $selected = "";
                            if ($row_item['item'] == $name) {
                                $selected = "selected";
                            }
                            $data_list .= "<option $selected value='$id'>$name</option>";
                        }
                        $row_brand = get_brand($row_item['bid']);

                        $data_list .= '</datalist>';

                        echo '<tr data-id="' . $start . '" id="masterrow' . $start . '"><td id="mastertd' . $start . '"><input type="text" id="tst' . $start . '" name="item[]" value="' . $row_item['item'] . '" list="itemname' . $start . '" class="invoice_input" onchange="auto_str(this);">' . $data_list . '</td><td><input type="text" id="masterqt' . $start . '" name="qty[]" value="' . $row_item['qty'] . '" class="invoice_input txt_qty" data-id="' . $start . '" ></td><td><input id="price_' . $start . '" data-id="' . $start . '" readonly type="text" value="' . $row_item['price'] . '" name="price[]" class="invoice_input txt_price" ></td><td><input type="text" name="tax[]" id="tax_' . $start . '" readonly data-id="' . $start . '" class="invoice_input txt_tax" value="' . $row_item['tax'] . '"></td><td><input id="mastertotal' . $start . '" readonly type="text" name="total[]" class="invoice_input txt_total" data-id="' . $start . '" value="' . $row_item['amount'] . '"></td><td><button type="button" id="remove" class="btn_remove invoice_input_times" ><i class="fas fa-trash" aria-hidden="true"></i></button><input type="hidden" name="bid[]" id="bid_' . $start . '" value="' . $row_item['bid'] . '" disabled="disabled" /><input type="hidden"  id="row_gst_' . $start . '" value="' . $row_brand['Tax'] . '" disabled="disabled" /><input type="hidden"  id="row_price_' . $start . '" value="' . $row_brand['P_Unit_Price'] . '" disabled="disabled" /></td>';
                        $start++;
                    }


                    ?>



                    <script type="text/javascript">
                        function auto_str(str) {

                            if (window.XMLHttpRequest) {
                                xmlhttp = new XMLHttpRequest();
                            } else {
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }

                            xmlhttp.onreadystatechange = function() {
                                pnode = document.getElementById(str.id).parentElement.id;
                                trnode = document.getElementById(pnode).closest('tr').id;
                                //csel = document.querySelector(trnode);

                                //c1 = csel.children;
                                c1 = document.getElementById(trnode).children[0].children[0];
                                c2 = document.getElementById(trnode).children[1].children[0];
                                c3 = document.getElementById(trnode).children[2].children[0];
                                c4 = document.getElementById(trnode).children[3].children[0];
                                c5 = document.getElementById(trnode).children[4].children[0];


                                //document.getElementById('product[]').value = this.responseText;
                                /* var splitResponse = xmlhttp.responseText.split( "-" );
                                  c1.value = splitResponse[4];
                                  c3.value = splitResponse[0];
                                  c4.value = splitResponse[1];
                                  c5.value = splitResponse[2];
                                 var secondDropdownContent = splitResponse[1];*/
                                //var row=$.parseJSON(this.responseText);
                                var row = JSON.parse(xmlhttp.responseText);
                                console.log(row);
                                c1.value = row.name;
                                c3.value = row.P_Unit_Price;
                                c4.value = row.GST;
                                c5.value = row.total;


                                var tr = document.getElementById(trnode);
                                $("#bid_" + tr.dataset.id).val(row.id);
                                $("#row_price_" + tr.dataset.id).val(row.P_Unit_Price);
                                $("#row_gst_" + tr.dataset.id).val(row.GST);
                                calc_total_set(tr.dataset.id);
                                //console.log(c3.value);
                            }
                            xmlhttp.open("GET", "controller.php?value=" + str.value, true);
                            xmlhttp.send();
                        }

                        function qtotal(qty) {

                            pnode1 = document.getElementById(qty.id).parentElement.id;
                            trnode1 = document.getElementById(pnode).closest('tr').id;

                            c5 = document.getElementById(trnode1).children[4].children[0];
                            c36 = document.getElementById(trnode1).children[4].children[0].id;
                            cqty = qty.value;
                            newtotal = c5.value * cqty;
                            c5.value = newtotal;
                            console.log(trnode1);

                        }

                        function calc_total_set(inc_id) {
                            console.log("A");
                            var qty = parseFloat($("#masterqt" + inc_id).val());

                            //var price=parseFloat($("#price_"+inc_id).val());
                            //var tax=parseFloat($("#tax_"+inc_id).val());

                            var price = parseFloat($("#row_price_" + inc_id).val());
                            var tax = parseFloat($("#row_gst_" + inc_id).val());

                            var total_tax = (tax * qty);
                            var total = (qty * price) + total_tax;


                            $("#price_" + inc_id).val((qty * price));
                            $("#tax_" + inc_id).val(total_tax);


                            var discount_amt = $("#discount_amt").val();
                            if (discount_amt == "")
                                discount_amt = 0;

                            discount_amt = parseFloat(discount_amt);

                            if (isNaN(total)) {
                                total = 0;
                            }
                            $("#mastertotal" + inc_id).val(total);
                            var final_total = 0;
                            var tax_total = 0;
                            $('.txt_total').each(function(i, obj) {
                                var eid = $(this).data("id");
                                qty = parseFloat($("#masterqt" + eid).val())
                                final_total += parseFloat($("#row_price_" + eid).val() * qty);
                            });

                            $('.txt_tax').each(function(i, obj) {
                                var id = $(this).data("id");
                                var qty = $("#masterqt" + id).val();

                                tax_total += (parseFloat($("#row_gst_" + id).val()) * parseFloat(qty));

                            });
                            if (isNaN(final_total)) {
                                final_total = 0;
                            }
                            if (isNaN(tax_total)) {
                                tax_total = 0;
                            }

                            $("#finaltotal").html(final_total - discount_amt + tax_total);
                            $("#lbl_sub_total").html(final_total);
                            $("#lbl_tax_total").html(tax_total);
                            console.log(final_total);

                        }

                        $(document).ready(function() {
                            var incrm = <?= $start ?>;

                            var max = 5;
                            var x = 1;
                            $('#add_more').click(function() {

                                $("#customers").append(html);
                                x++;
                            });
                            $('#add_more2').click(function() {
                                incrm++;
                                console.log(incrm);
                                if (x <= max) {
                                    var html = '<tr data-id="' + incrm + '" id="masterrow' + incrm + '"><td id="mastertd' + incrm + '"><input type="text" id="tst' + incrm + '" name="item[]" list="itemname' + incrm + '" class="invoice_input" onchange="auto_str(this);"><datalist id="itemname' + incrm + '" name="itemname[]">' + '<?php $query = "SELECT * FROM brands WHERE admin='$user'";
                                                                                                                                                                                                                                                                                                                                        $sql = mysqli_query($conn, $query);
                                                                                                                                                                                                                                                                                                                                        while ($row = mysqli_fetch_assoc($sql)) {
                                                                                                                                                                                                                                                                                                                                            $id = $row['id'];
                                                                                                                                                                                                                                                                                                                                            $name = $row['name'];
                                                                                                                                                                                                                                                                                                                                            $barcode = $row['barcode'];
                                                                                                                                                                                                                                                                                                                                            echo "<option value=$id>$name</option>";
                                                                                                                                                                                                                                                                                                                                        } ?>' + '</datalist></td><td><input type="text" id="masterqt' + incrm + '" name="qty[]" class="invoice_input txt_qty" data-id="' + incrm + '" value="1"></td><td><input id="price_' + incrm + '" data-id="' + incrm + '" type="text" name="price[]" readonly class="invoice_input txt_price" value=""></td><td><input type="text" name="tax[]" id="tax_' + incrm + '"  readonly data-id="' + incrm + '" class="invoice_input txt_tax" value=""></td><td><input id="mastertotal' + incrm + '" type="text" name="total[]" class="invoice_input txt_total" data-id="' + incrm + '" value=""></td><td><button type="button" id="remove" class="btn_remove invoice_input_times" ><i class="fas fa-trash" aria-hidden="true"></i></button><input type="hidden" name="bid[]" id="bid_' + incrm + '" /><input type="hidden"  id="row_gst_' + incrm + '" /><input type="hidden"  id="row_price_' + incrm + '" /></td>';
                                    $("#customers").append(html);

                                    x++;
                                }
                            });
                            $('#customers').on('click', '#remove', function() {
                                $(this).closest('tr').remove();
                                x--;
                                calc_total_set(1);
                            });


                            $(document).on("keyup", ".txt_qty", function() {
                                var id = $(this).data("id");
                                calc_total_set(id);
                            });

                            $(document).on("keyup", ".txt_price", function() {
                                var id = $(this).data("id");
                                // calc_total_set(id);
                            });


                            $(document).on("keyup", ".txt_tax", function() {
                                var id = $(this).data("id");
                                // calc_total_set(id);
                            });

                            $(document).on("keyup", "#discount_amt", function() {
                                calc_total_set(1);
                            });
                            calc_total_set(1);

                            $(document).on("keyup", "#coupon_code", function() {
                                var code = $(this).val();
                                if (code != "") {
                                    $.ajax({
                                        url: "ajax_validate_code.php",
                                        data: {
                                            code: code
                                        },
                                        type: 'POST',
                                        success: function(data) {
                                            var json = $.parseJSON(data);
                                            console.log(json);
                                            if (json.status == 1) {
                                                var dis_amount = 0;
                                                if (json.row.coupon_type == "Fixed") {
                                                    dis_amount = json.row.coupon_value;

                                                } else {
                                                    var t = $("#finaltotal").html();
                                                    dis_amount = ((parseFloat(json.row.coupon_value) * parseFloat(t)) / 100);
                                                }

                                                var t = parseFloat($("#finaltotal").html());
                                                if (dis_amount > t) {
                                                    $("#discount_amt").val(0);
                                                    alert("Amount should greater than discount");
                                                    calc_total_set(1);
                                                } else {
                                                    $("#discount_amt").val(dis_amount);
                                                    //$("#lbl_discount").html(dis_amount);
                                                    calc_total_set(1);
                                                }



                                                //calc_total_set(1);
                                            } else {
                                                $("#discount_amt").val(0);
                                                calc_total_set(1);
                                            }
                                        },
                                        error: function(data) {

                                        }
                                    })
                                }
                            });
                        });
                    </script>
                </table>
                <br>
                <hr style='height: 1px; background: #eee; border: 0 none;'>
                <span id="add_more2" style="font-size: 16px; cursor: pointer; float: right; background: #111; margin: 10px; border: 4px solid #111; padding: 10px; border-radius: 4px; color: #fff;">Add Item <i class="fas fa-plus-circle"></i></span>
                <br><br><br><br><br>
                <div style="clear:both"></div>
                <style>
                    #customer_total {
                        font-family: "Roboto";
                        border-collapse: collapse;
                        width: 100%;
                    }

                    #customer_total td,
                    #customer_total th {
                        padding: 10px;
                        color: #555;
                        border: 1px solid #f1f1f1;
                        font-weight: 300;
                    }

                    #customer_total tr:nth-child(even) {
                        border: 1px solid #f1f1f1;
                    }

                    #customer_total tr:hover {
                        background-color: #eee;
                    }

                    #customer_total th {
                        border: 1px solid #e3f2fd;
                        padding: 15px;
                        text-align: left;
                        border-bottom: 2px solid #0077b6;
                        background-color: #fefefe;
                        color: #333;
                        font-weight: 700;
                        font-size: 13px;
                        text-transform: uppercase;
                    }
                </style>
                <div style='float: right; width: 350px; border-radius: 8px;'>
                    <br>
                    <table class="table" id="customer_total">
                        <tr>
                            <td>Sub Total Amount </td>
                            <td>
                                <p id="subtot" style='padding: 5px; color: #333; font-weight: 300;'> <b id="lbl_sub_total"></b> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>
                                <p id="s1ubtot" style='padding: 5px; color: #333; font-weight: 300;'> <b id="lbl_tax_total"></b> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>Coupon Code </td>
                            <td>
                                <input id="coupon_code" type="text" value="" name="coupon_code" class="invoice_input " placeholder="Enter Coupon Code">
                            </td>
                        </tr>
                        <tr>
                            <td>Discount </td>
                            <td>
                                <input id="discount_amt" type="text" value="<?= $total_discount ?>" name="discount_amt" class="invoice_input " placeholder="Enter Discount Amount">

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="font-size: 24px; padding: 20px; font-weight: 700; color: #0F2C67;">Total<br>

                                </p>
                            </td>
                            <td>
                                <p style="font-size: 24px; padding: 20px; font-weight: 700; color: #0F2C67;">
                                    <b id="finaltotal" style='font-weight: 400; font-size: 20px; color: #333;'>

                                    </b>
                                </p>

                            </td>

                        </tr>

                    </table>


                    <center>

                    </center>
                </div>
                <div style="clear: both;"></div>
                <br><br><br>
                <input type="hidden" name="invoice_id" value="<?= $rand_id ?>" />
                <input type="submit" name="GenerateInv" value="Generate Invoice" id="submit_btn" style="display: none;">
                <script>
                    function myFunction() {
                        document.getElementById("submit_btn").click()
                    }
                </script>
            </form>
            <center>
                <button class="generate_invoice" onclick="myFunction()"><i class="fas fa-save" style="margin-right: 10px;"></i> Save & Print</button>
            </center>

        </div>
        <?php
        if (isset($_POST['GenerateInv'])) {
            // print_r($_POST);
            //$rand = sprintf("%06d", mt_rand(1, 999999));
            //$date = date("d-m-Y");
            //$sql = "INSERT INTO invoice (id, invoice_rand, invoice_for, invoice_date, admin, saved) VALUES (null, '$rand', '', '$date', '$user', '0')";
            //$query = mysqli_query($conn, $sql);
            $client = $_POST['client'];
            $rand = $_POST['invoice_id'];
            $date = $_POST['todate'];
            $theme = $_POST['theme'];
            $discount_amt = $_POST['discount_amt'];
            mysqli_query($conn, "update invoice set invoice_for='$client',discount_amt='$discount_amt',invoice_date='$date',theme='$theme' where  invoice_rand='$rand'");
            mysqli_query($conn, "delete from items where invoice_id='$rand'");

            $itemname = $_POST['item'];
            $itemqty = $_POST['qty'];
            $itempirce = $_POST['price'];
            $discount = "5%";
            $gst = $_POST['tax'];
            $total = $_POST['total'];
            $itemname_arr = $_POST['bid'];

            foreach ($itemname as $key => $value) {
                if ($value != "") {
                    $save = "INSERT INTO items(id,bid,item,qty,price,discount,tax,amount,invoice_id,admin)Values(null,'" . $itemname_arr[$key] . "','" . $value . "','" . $itemqty[$key] . "','" . $itempirce[$key] . "','" . $discount[$key] . "','" . $gst[$key] . "','" . $total[$key] . "','" . $rand . "','" . $user . "')";
                    $query1 = mysqli_query($conn, $save);
                }
            }


            echo "<meta http-equiv=\"refresh\" content=\"0; url=invoice.php?id=$rand\">";
        }

        ?>
    </div>