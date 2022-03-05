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
        var country = [<?php
                        $sql = "SELECT * FROM customers WHERE admin='$user'";
                        $query = mysqli_query($conn, $sql);
                        while ($rows = mysqli_fetch_assoc($query)) {
                            $id = $rows['id'];
                            $first_name = $rows['first_name'];
                            $last_name = $rows['last_name'];
                            $email = $rows['email'];
                            $mobile = $rows['phone'];
                            echo '"' . $first_name . ' ' . $last_name . ', ' . $email . ', ' . $mobile . '",';
                        }
                        ?>];
        $("#country").select2({
            data: country
        });
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
                <p style='float: left; font-weight: 400; color: #000;'>Date: <input type="text" id="datepicker" style="border: 0px; padding: 10px; font-weight: 300; outline: none; width: 100px;" value="<?php echo $date; ?>"><i class="fas fa-calendar" style="color: #000; font-weight: 300;"></i></p><br><br><br>
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
                    <select id="country" name="client" class="invoice_inp">
                        <!-- Dropdown List Option -->
                    </select>
                </label>
                <a href="#" style="border-radius: 8px; border: 1px solid #051367; color: #051367; font-size: 12px; text-decoration: none; float: right; padding: 8px 10px; margin-top: 10px; ">+ Add New Customer</a>
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
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var html = '<tr><td><input type="text" name="city[]" list="cityname[]" class="invoice_input"><datalist id="cityname[]">' + '<?php $query = "SELECT * FROM brands WHERE admin='$user'";
                                                                                                                                                        $sql = mysqli_query($conn, $query);
                                                                                                                                                        while ($row = mysqli_fetch_assoc($sql)) {
                                                                                                                                                            $name = $row['name'];
                                                                                                                                                            $barcode = $row['barcode'];
                                                                                                                                                            echo "<option value=$name>$barcode</option>";
                                                                                                                                                        } ?>' + '</datalist></td><td><input type="text" name="price[]" class="invoice_input" value="250"></td><td><input type="text" name="discount[]" class="invoice_input" value="5%"></td><td><input type="text" name="tax[]" class="invoice_input" value="5%"></td><td><input type="text" name="amount[]" class="invoice_input" value="100"></td><td><input type="button" id="remove" class="invoice_input_times" value="-"></td>';

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
                </table>
                <span id="add_more2" style="font-size: 12px; cursor: pointer; float: right; background: transparent; margin: 10px; border: 1px solid #eee; padding: 10px; border-radius: 8px; color: #888;">Add More Items+</span>
                <div style="clear: both;"></div>
        </div>

        </form>
    </div>