<?php
include_once("connection/header.php");
$stock_id = $_GET['id'];
?>

<title>Dashboard - Edit Sub Stock | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'>Brands Manager</f>
            <br><a href='dashboard.php' style='text-decoration: none; color: #023e8a;'>Dasboard</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='stocks-manager.php' style='text-decoration: none; color: #023e8a;'>Stocks Manager</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='#' style='text-decoration: none; color: #023e8a;'>Edit</a>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 40px;'>
        <div style='background: #fff; margin-right: auto; margin-left: auto; max-width: 800px; border-radius: 8px; border: 2px solid #eee;'>
            <div style='padding: 20px;'>
                <?php
                $role_id = @$_GET['id'];
                $query = "SELECT * from brands WHERE id = '$role_id'";
                $result = mysqli_query($conn, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $name_input = $rows['name'];
                    $model_input = $rows['model'];
                    $barcode_input = $rows['barcode'];
                    $SKU_input = $rows['SKU'];
                    $HSN_input = $rows['HSN'];
                    $Unit_input = $rows['Unit'];
                    $gst_data = $rows['gst'];
                    $sell_unit_price = $rows['S_Unit_Price'];
                    $purchase_unit_price = $rows['P_Unit_Price'];
                    $gross_unit_price = $rows['Gross'];
                    $gst_unit_price = $rows['Tax'];
                }
                ?>
                <?php
                $update_btn = @$_POST['update'];
                if ($update_btn) {
                    $name_input = strip_tags(@$_POST['name']);
                    $model_input = strip_tags(@$_POST['model']);
                    $barcode_input = strip_tags(@$_POST['barcode']);
                    $SKU_input = strip_tags(@$_POST['SKU']);
                    $HSN_input = strip_tags(@$_POST['HSN']);
                    $Unit_input = strip_tags(@$_POST['Unit']);
                    $gst_input = strip_tags(@$_POST['gst_data']);
                    $sell_unit_price = strip_tags(@$_POST['sell_unit_price']);
                    $purchase_unit_price = strip_tags(@$_POST['purchase_unit_price']);
                    $ex_gst_unit_price = strip_tags(@$_POST['ex_gst_unit_price']);
                    $gst_unit_price = strip_tags(@$_POST['gst_unit_price']);
                    if ($name_input) {
                        $query = "INSERT INTO `brands`(`id`, `name`, `status`, `admin`, `stock_id`, `type`, `model`, `barcode`, `SKU`, `HSN`, `Unit`, `GST`, `S_Unit_Price`, `P_Unit_Price`, `Gross`, `Tax`) VALUES (null,'$name_input','active','$user','$stock_id','','$model_input','$barcode_input','$SKU_input','$HSN_input','$Unit_input','$gst_input','$sell_unit_price','$purchase_unit_price','$ex_gst_unit_price','$gst_unit_price')";
                        $result = mysqli_query($conn, $query);
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=brands-manager.php?id=$stock_id\">";
                    } else {
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=brands-manager.php?id=$stock_id&&updated=0\">";
                    }
                }
                $report = @$_GET['updated'];
                if ($report == "0") {
                    $report = "<p style='background: #ff006e; padding: 10px; border-radius 15px; color: #fff; margin-bottom: 20px;'><i class='fas fa-times-circle'></i> You Cannot Leave Stock Name Input Empty!</p>";
                } else {
                }
                echo $report;
                ?>
                <p style='font-weight: 600; font-size: 18px; color: #555;'>Edit Sub Stock</p><br>
                <script type="text/javascript">
                    $(document).ready(function() {
                        // do not allow users to enter spaces:
                        $(".username").on({
                            keydown: function(event) {
                                if (event.which === 32)
                                    return false;
                            },
                            // if a space copied and pasted in the input field, replace it (remove it):
                            change: function() {
                                this.value = this.value.replace(/\s/g, "");
                            }
                        });
                    });
                </script>
                <form action='#' method='POST'>
                    <div class='flex-container2'>
                        <div style='flex-grow: 1;'>
                            <label class="checkbox-green">
                                <input type="checkbox" name="sp_checker" value="service" id="myCheck" onclick="myFunction()">
                                <span class="checkbox-green-switch" data-label-on="Service" data-label-off="Product"></span>
                            </label>
                            <br>
                            <br>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Name</p>
                            <input id="username" type='text' name="name" placeholder="Name" value="<?php echo $name_input; ?>" class="form_control" />
                            <br><br>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Model Name</p>
                            <input type='text' name="model" placeholder="Model Name" value="<?php echo $model_input; ?>" class="form_control" />
                            <br><br>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Barcode</p>
                            <input type='text' name="barcode" placeholder="Barcode" value="<?php echo $barcode_input; ?>" class="form_control" />
                            <br><br>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>SKU</p>
                            <input type='text' name="SKU" placeholder="SKU" value="<?php echo $SKU_input; ?>" class="form_control" />
                            <br><br>
                            <div id="showoff" style="display:block">
                                <p style='font-weight: 300; font-size: 14px; color: #333;'>HSN</p>
                                <input type='text' name="HSN" placeholder="HSN" value="<?php echo $HSN_input; ?>" class="form_control" />
                                <br><br>
                                <p style='font-weight: 300; font-size: 14px; color: #333;'>Unit</p>
                                <select name="Unit" class="form_control" />
                                <option value="Select Unit">Select Unit</option>
                                <option value="Kilogram">Kilogram</option>
                                <option value="Gram">Gram</option>
                                <option value="Pieces">Pieces</option>
                                </select>
                                <br><br>
                            </div>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>GST</p>
                            <select name="gst_data" id="gst_data" class="form_control" onkeyup="keyupcalculate()" />
                            <option value="<?php echo $gst_data; ?>">GST <?php echo $gst_data; ?>%</option>
                            <option value="5">GST 5%</option>
                            <option value="12">GST 12%</option>
                            <option value="18">GST 18%</option>
                            <option value="24">GST 24%</option>
                            </select>
                            <br><br>
                            <hr style='height: 1px; background: #eee; border: 0 none;'>
                            <br><br>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>GST Type</p>
                            <select name="gst" id="exc_inc" class="form_control" onclick="myFunction2()" />
                            <option value="Excluded">Excluded</option>
                            <option value="Included">Included</option>
                            </select>
                            <br><br>
                            <p style='font-weight: 400; font-size: 18px; color: #333;'>Selling Info</p><br>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Unit Price</p>
                            <input type='text' name="sell_unit_price" placeholder="Selling Unit Price" value="<?php echo $sell_unit_price; ?>" class="form_control" />
                            <br><br>
                            <hr style='height: 1px; background: #eee; border: 0 none;'>
                            <br><br>
                            <p style='font-weight: 400; font-size: 18px; color: #333;'>Purchase Info</p><br>
                            <p style='font-weight: 300; font-size: 14px; color: #333;'>Unit Price</p>
                            <input type='text' name="purchase_unit_price" placeholder="Purchase Unit Price" value="<?php echo $purchase_unit_price; ?>" id="purchase_unit_price" class="form_control" onkeyup="keyupcalculate()" />
                            <br><br>

                            <div style='width: 100%; border: 2px dashed #ccc;'>
                                <div style='padding: 10px;'>
                                    <p style='font-weight: 400; font-size: 18px; color: #333;'><i class="fas fa-calculator"></i> GST Calculator</p><br>
                                    <br><br>
                                    <p id="include_amt" style='font-weight: 300; font-size: 14px; color: #333;'>Gross Price</p>
                                    <p id="exclude_amt" style='font-weight: 300; font-size: 14px; color: #333; display: none;'>Excluding GST</p>
                                    <input type='text' name="ex_gst_unit_price" id="ex_gst_unit_price" placeholder="Calculating..." value="<?php echo $purchase_unit_price; ?>" class="form_control" />
                                    <br><br>
                                    <p style='font-weight: 300; font-size: 14px; color: #333;'>Extracted GST%</p>
                                    <input type='text' name="gst_unit_price" id="gst_unit_price" placeholder="Calculating..." value="<?php echo $gst_unit_price; ?>" class="form_control" />
                                    <br><br>
                                    <p style='font-weight: 300; font-size: 14px; color: #333;'>Total Price</p>
                                    <input type='text' name="gross_unit_price" id="gross_unit_price" placeholder="Calculating..." value="<?php echo $gross_unit_price; ?>" class="form_control" />
                                    <br><br>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div style='padding: 10px;'>
                        <input type='submit' name="update" value="Generate Sub Stock" class="form_control_submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(window).keyup(function(e) {
            var target = $('.checkbox-green input:focus');
            if (e.keyCode == 9 && $(target).length) {
                $(target).parent().addClass('focused');
            }
        });

        $('.checkbox-green input').focusout(function() {
            $(this).parent().removeClass('focused');
        });

        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("showoff");
            if (checkBox.checked == true) {
                text.style.display = "none";
            } else {
                text.style.display = "block";
            }
        }



        function keyupcalculate() {
            var selection = document.getElementById("exc_inc");
            if (selection.value == "Excluded") {
                //included value here
                var ex_gst = document.getElementById("ex_gst_unit_price");
                var getGST = document.getElementById("gst_data");
                var unitInput = document.getElementById("purchase_unit_price");
                var grossInput = document.getElementById("gross_unit_price");
                var gstInput = document.getElementById("gst_unit_price");
                var amount = parseInt(getGST.value) / 100;
                var extract = parseInt(unitInput.value) * amount;
                grossInput.value = parseInt(unitInput.value) + extract;
                gstInput.value = extract;
                ex_gst.value = unitInput.value;
                //end of included value
            } else if (selection.value == "Included") {
                //excluded value here
                var ex_gst = document.getElementById("ex_gst_unit_price");
                var getGST = document.getElementById("gst_data");
                var unitInput = document.getElementById("purchase_unit_price");
                var grossInput = document.getElementById("gross_unit_price");
                var gstInput = document.getElementById("gst_unit_price");
                var amount = parseInt(getGST.value) / 100;
                var extract = parseInt(unitInput.value) * amount;
                ex_gst.value = parseInt(unitInput.value) - extract;
                gstInput.value = extract;
                grossInput.value = unitInput.value;
                //end of excluded value
            }
        }
    </script>