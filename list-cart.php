<?php include('partials-front/menu.php') ;
 include('login/login-check.php');?>



                
               <?php
               // Create a SQL query to get all the fool
               	$username = $_SESSION['user'];
               $sql = "SELECT*FROM cart c JOIN food f ON c.food_id = f.id WHERE c.id_users = '$username' ";
             
               //execute the query
               $res = mysqli_query($conn,$sql);
               // count rows to check whether we have foods or not
               $count = mysqli_num_rows($res);
               // Create serial number variable and set default value as 1
               $sn = 1;

               if($count > 0)
               { 
                 ?>
                       <h2 class="text-center">  Cart List</h2>
                         <div class="container">
                         <table class="tbl-full">
        
                          <tr>
                            <td>STT </td>
                            <td>Image </td>
                            <td>Name </td>

                            <td>Price</td>
                            <td> </td>
                
                            <td>Qty </td>
                            <td></td>
                           
                          <td>Action</td>
                     </tr>  
                   <br>
                   <?php
                // We have food in database
                // Get the foods from database and display
                      while($row=mysqli_fetch_assoc($res))
                      {
                          //Get the values from individual columns
                          $id = $row['food_id'];
                          $title = $row['title'];
                          $price = $row['price'];
                          $image_name = $row['image_name'];
                          $qty = $row['qty'];
                   
                          ?>
                          <tr>
                            <td> <?php echo $sn++; ?></td>
                                 <td>
                              <?php 
                        //check whether image name is available or not
                              if($image_name!="")
                              {
                            //Display the image
                            ?>
                                  <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?> "       width = "100px">
                            <?php

                        }
                       


                         ?>

                                 <td><?php echo $title; ?></td>
                          <td><?php echo $price; ?></td>
                     
                       </td>
                         	<td>
					   <a href="minus-food.php?food_id=<?php  echo $id ; ?>" class="fas fa-minus" ></a>
				</td>
                    </td>
                    <td><?php echo $qty; ?></td>
                    	<td>
					  <a href="plus-food.php?food_id=<?= $id ?>" class="fas fa-plus" ></a>
				</td>
                    <td>

                     <a  href="delete-food.php?food_id=<?php echo $id ?>"  class="	fas fa-trash"></a>      
                     </td>      
     
              
                </tr>
                
                    <?php
                
               }
           

               ?>
                
           
            
            <?php
            $sql1 = "SELECT SUM(qty*price)FROM cart c JOIN food f ON c.food_id = f.id WHERE c.id_users = '$username' ";
       
               //execute the query
               $res1 = mysqli_query($conn,$sql1);
               // count rows to check whether we have foods or not
               $count1 = mysqli_num_rows($res1);
               
               // Create serial number variable and set default value as 1
               $sn = 1;
               if($count > 0)
               {
                // We have food in database
                // Get the foods from database and display
               $row=mysqli_fetch_assoc($res1);
               $total = $row['SUM(qty*price)'];
           $_SESSION['total'] = $total;

           }
                    ?>
                       </div>

 </table>
                    <h1 href="" class="btn4"><?php  echo $total ; ?> </h1> 
                     <a href="order.php" class="btn3">order now</a>

 


 
<?php }
else {
  ?>   <h2 class="text-center">Cart is empty </h2> <?php }
 ?>