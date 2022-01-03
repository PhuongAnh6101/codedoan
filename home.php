<?php include('partials-front/menu.php') ;
 include('login/login-check.php');?>
 <body>
    
    <div class="step-container">
           
          
        <section class="steps">
     <div class="box">
         <a href="home.php" class="far fa-calendar-check" >
         </a>
     </div>
        <div class="box">
         <a href="On_Delivery.php" class="fas fa-plane"></a>
     </div>
        <div class="box">
         <a href="Delivered.php" class="fas fa-check-circle"> </a>
     </div>
     <div class="box">
         <a href="Cancelled.php" class=" fas fa-ban"></a>
     </div>
         <h1></h1>
         <h1></h1>
     </div >
      </section>
   
           <div class="container">
            <table class="tbl-full">
                <tr>
                    <td>S.N</td>
                    <td>Name Food<td>
                    
                    <td>Price</td>
                    <td>Qty</td>
                    
                 </tr>
<?php

     $username = $_SESSION['user'];

        $sql = "SELECT*FROM  `order-food` JOIN food ON `order-food`.`food_id`=food.id  JOIN bill ON `order-food`.`id_bill` = bill.id WHERE `order-food`.`id_users`='$username' AND bill.status = 'ordered' ";
       // echo $sql;
        $res = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($res);
                $sn = 1 ;//create a serisl number and set its initail value as 1 
                if($count > 0)
                {
                  // Order available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        // Get all the order details
                        $id = $row['id'];
                                             $food = $row['title'];
                       $image_name = $row['image_name'];
                        $price = $row['price'];
                        $qty = $row['qty'];
                      
                                 ?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                             
                              <td><?php  echo $food;?></td>
                              <td>
                             <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?> "       width = "100px">
                                </td>

                              
                            
                            <td><?php echo $price; ?></td>
                    
                            <td><?php echo $qty; ?></td>
                          
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
   <section class="steps">
     <div class="box">

     <a href="http://localhost:8080/cake/logout.php" class="fas fa-sign-in-alt"></a>
     </div>
 </section>

 </body>

