<?php
include_once("connection/header.php");
?>

<title>Dashboard - Customers | Billing</title>
<div style="background: #fff;">
    <div id="margin-setter2">
        <div style="padding: 20px;">
            <f style='font-size: 18px; font-weight: 700; color: #555;'><i class="fas fa-address-card"></i> Customers
            </f>
            <a href='contacts.php' style='float: right; margin-left: 20px; text-decoration: none; font-weight: 700; color: #fff; background: #023e8a; border-radius: 4px; padding: 10px;'><i class="fas fa-address-card"></i> &nbsp; Create Contact</a>
            <a href='create-store-manager.php' style='float: right; margin-left: 10px; text-decoration: none; font-weight: 700; color: #fff; background: #1D6F42; border-radius: 4px; padding: 10px;'><i class="fas fa-file-excel"></i> &nbsp; Download CSV</a>
            <br><a href='dashboard.php' style='text-decoration: none; color: #023e8a;'>Dasboard</a><i class="fas fa-angle-right" style='margin-left: 5px; margin-right: 5px; color: #7ec061;'></i>
            <a href='#' style='text-decoration: none; color: #023e8a;'>Customers</a>
        </div>
    </div>
    <div style='clear: both;'></div>
</div>
<div id="margin-setter3">
    <div style='padding: 20px 40px;'>
        <style>
            #customers {
                font-family: "Roboto";
                border-collapse: collapse;
                width: 100%;
            }

            #customers td,
            #customers th {
                padding: 15px;
                color: #555;
                border: 1px solid #f1f1f1;
                font-weight: 300;
            }

            #customers tr:nth-child(even) {
                border: 1px solid #f1f1f1;
            }

            #customers tr:hover {
                background-color: #eee;
            }

            #customers th {
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
        <div style='background: #fff; padding: 40px; overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap; border: 1px solid #eee; border-radius: 10px; box-shadow: 13px 17px 28px -20px rgba(97,97,97,0.68);
-webkit-box-shadow: 13px 17px 28px -20px rgba(97,97,97,0.68);
-moz-box-shadow: 13px 17px 28px -20px rgba(97,97,97,0.68);'>
            <table id="customers">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>State</th>
                    <th>District</th>
                    <th>Address</th>
                </tr>
                <?php
                $query = "SELECT * from customers WHERE admin = '$user'";
                $result = mysqli_query($conn, $query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['id'];
                    $f_name = $rows['first_name'];
                    $l_name = $rows['last_name'];
                    $email = $rows['email'];
                    $phone = $rows['phone'];
                    $state = $rows['state'];
                    $district = $rows['district'];
                    $address = $rows['address'];
                    echo "<tr>
                        <td>$id</td>
                        <td>$f_name</td>
                        <td>$l_name</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$state</td>
                        <td>$district</td>
                        <td>$address</td>
                    </tr>
                ";
                ?>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>