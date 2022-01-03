<?php include('partials/menu.php');?>
<div class="main-content">
	<div class="wrapper">
		<h1>Plus</h1>

		<br><br>
		<?php 
		// check whether the id is set or not
		if(isset($_GET['id']))
		{
			// Get the Id and all orther details
			// echo "Getting the Data";
			$id = $_GET['id'];
			
		} 
		?>
		 <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Name Food<th>
                    
                    <th>Price</th>
                    <th>Qty</th>
                    
                 </tr>
<?php
        $sql = "SELECT*FROM  `order-food` JOIN food ON `order-food`.`food_id`=food.id  WHERE id_bill ='$id'";
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


<?php include('partials/footer.php'); ?>