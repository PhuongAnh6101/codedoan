<?php include('partials/menu.php'); ?>
 
<div class='main-content'>
    <div class='wrapper'>
     <h1>Manage Order</h1>
    
            <br />
            <br /> <br />
            <?php
            if(isset($_SESSION['upload']))
          {
           echo $_SESSION['upload'];
           unset($_SESSION['upload']); 
          }
            ?>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    
                    <th>Total</th>
                    <th>Order Date </th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php 
                // Get all the orders from database
                $sql = "SELECT * FROM bill  ORDER BY id DESC";
               // echo $sql;
                //Execute query
                $res = mysqli_query($conn,$sql);
                // Count the rows
                $count = mysqli_num_rows($res);
                $sn = 1 ;//create a serisl number and set its initail value as 1 
                if($count > 0)
                {
                  // Order available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        // Get all the order details
                        $id = $row['id'];
                                             $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['username'];
                        $customer_contact = $row['phone_number'];
                        $customer_email = $row['email'];
                        $customer_address = $row['address'];
                        $total = $row['total'];
                        ?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                             
                              <td><?php  echo $total;?></td>
                              <td><?php echo $order_date; ?></td>

                              <td>
                              <?php
             if ($status=="ordered")
            {
                echo "<label>$status</label>";
            }
            elseif($status == "On Delivery")
            {
                echo"<label style = 'color:orange;'>$status</label>";
            }
            elseif($status == "Delivered")
            {
                echo"<label style = 'color:green;'>$status</label>";
            }          
             elseif($status == "Cancelled")
            {
                echo"<label style = 'color:red;'>$status</label>";
            }
            ?>
            </td>
                            <td><?php echo $customer_name; ?></td>
                    
                            <td><?php echo $customer_contact; ?></td>
                            <td><?php echo $customer_email; ?></td>
                            <td><?php echo $customer_address; ?></td>
                    
                     
                            <td>
                        <a href="<?php echo URL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update </a>
                           </td>
                               <td>
                        <a href="<?php echo URL; ?>admin/order-cart.php?id=<?php echo $id; ?>" class="btn-secondary">details</a>
                           </td>
                        <?php
                    }
                }
                else
                {
                 // Order not available
                    echo "<tr><td colspan ='12' class = 'error' >Order not available</td></tr>";
                }

                ?>
             
           </table>
     
     </div>
</div>


<?php include('partials/footer.php'); ?>