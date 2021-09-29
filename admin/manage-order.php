<?php
    include('partials/menu.php');
?>
<div class="main-content">
    <div class="wrapper"></div>
    <h1>Manage Order</h1>

    <br />
        <!-- Button to add Admin -->
        <!-- <a href="#" class="btn-primary">Order</a> -->


        <table class="tbl-full">

            <tr>

                <th>Sr. No</th>
                <th>Food</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>

            </tr>
            <?php
                // Get all the orders from database
            // Display the latest order first.
            $sql="SELECT * FROM tbl_order ORDER BY id DESC";

            $res=mysqli_query($conn,$sql);// count the rows
            $count=mysqli_num_rows($res);
            $sn=1; // Create A serial Number and set initial value as 1

            if($count>0){
                // order Available
                while($row=mysqli_fetch_assoc($res)){
                    // Get all the order details
                    $id=$row['id'];
                    $food=$row['food'];
                    $price=$row['price'];
                    $qty=$row['qty'];
                    $total=$row['total'];
                    $order_date=$row['order_date'];
                    $status=$row['status'];
                    $customer_name=$row['customer_name'];
                    $customer_contact=$row['customer_contact'];
                    $customer_email=$row['customer_email'];
                    $customer_address=$row['customer_address'];

                    ?>

                    
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $food; ?></td>
                <td><?php echo $price;  ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $total; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $status; ?></td>
                <td><?php echo $customer_name; ?></td>
                <td><?php echo $customer_contact; ?></td>
                <td><?php echo $customer_email; ?></td>
                <td><?php echo $customer_address; ?></td>
                
                <td>
                    <a href="#" class="btn-secondary">Update Order</a>
                </td>
            </tr>

                    <?php

                }
            }else{
                // Order Not available
                echo "<tr><td colspan='12' class='error'>Orders Not Available</td></tr>";
            }

            ?>
            
            
            <!-- 
    <tr>
        <td>1.</td>
        <td>Piyush Choudhary</td>
        <td>piyush.nxt</td>
        <td>
            <a href="#" class="btn-secondary">Update Admin</a>
            <a href="#" class="btn-danger">Delete Admin</a>


        </td>
    </tr>
            <tr>
                <td>3.</td>
                <td>Manish Kushwah</td>
                <td>Manish.nxt</td>
                <td>

                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>



                </td>
            </tr>


            <tr>
                <td>4.</td>
                <td>Sakshi Jain</td>
                <td>sakshi2.0</td>
                <td>

                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>



                </td>
            </tr> -->

        </table>

</div>
<?php
include('partials/footer.php');
?>