
<?php include('partials-front/menu.php') ?>

     <?php ob_start(); ?>
	


	

        <br>
     
	

  <section class="food-search">
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
     
        
           
               <?php 
              //Check whether submit button is clicked or not
               if(isset($_POST['submit']))
               {
               
                //get all the details from the form 
               
                
               
               
                $order_date = date("Y-m-d h:i:sa");//order date
                $status = "Ordered"; // ordered, on delivery, delivered, cancelled
                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];


                //save the order in database
                // create QSL to save the data
                $sql2 = "INSERT INTO bill SET 
                         
                        
                         
                        
                         order_date = '$order_date',
                         status = '$status',
                         customer_name = '$customer_name',
                         customer_contact= '$customer_contact',
                         customer_email = '$customer_email',
                         customer_address = '$customer_address'

                         ";
                         
                         // execute the query
                         $res2 = mysqli_query($conn,$sql2);
                         // check whether query executed successfully or not
                        $last_id = mysqli_insert_id($conn);
                       //  echo $last_id;
                       /*  if($res2==TRUE)
                         {
                            // Query axecutes and order saved
                            $_SESSION['order'] = "<div class='success'>Food order successfully.</div>";
                           header("location:http://localhost:8080/food-oder/");
                              session_destroy();



                         }
                         else
                         {
                            //failed to save
                            $_SESSION['order'] = "<div class ='error'>Failed to order food.</div>";
                            header('location:http://localhost:8080/food-oder/');
                         }*/
                     
                   /*  <?php foreach ($_SESSION['cart'] as $key => $val)  :?>

                     
   <?php  */                 
     
  }
       ?>
         
	

	
	<section class="food-search">
		 <div class="container">
    
   <h2 class="text-center">  Cart List</h2>
	<table class="tbl-full">
		
		<tr>
			<td>STT </td>
			<td>Image </td>
			<td>Name </td>
			<td>Price</td>
			<td>Qty </td>
			
		</tr>
		<br>

	
	
		<?php 
		
		$sn = 1 ;
		$total = 0;
		$totalall =0;

		?>
		<?php 
       if(isset($_SESSION['cart']) && $_SESSION['cart'] == null )  
       {
       	header("location:http://localhost:8080/food-oder/");
        die();

       }
		?>
		<?php foreach ($_SESSION['cart'] as $key => $val)  :?>
			<tr>
				<td><?= $sn++ ?></td>
			<td>  
					
                               <img src="http://localhost:8080/food-oder/images/food/<?= $val['image']; ?>"  alt="Chicke Hawain Pizza" class="img-cart">
                            </td>
                            
				<td><?= $val['name'] ?></td>
				<td><?= $val['price'] ?></td>
				<td><?= $val['qty'] ?></td>
					


					<?php $total = $val['price']*$val['qty']; ?>
					<?php
					$totalall = $totalall+$total; 
					
					?> 
				
			
			</tr>
			<?php 
			$food = $val['name'];
			$image_food = $val['image'];
			$price = $val['price'] ;
			$qty = $val['qty'];
		
		



	
		if(isset($_POST['submit']))
			{

                         	$sql = "INSERT INTO cart SET
                    food = '$food',
           	         image_food = '$image_food',
           	         price = ' $price',
           	         qty='$qty',
           	         id_bill  = $last_id 
                
               	";
               	$res = mysqli_query($conn,$sql);
               /*	$sql3 ="UPDATE bill SET 
               	 total = '$totalall',
               	 WHERE id =$last_id
               	 ";
               	 echo $sql3;
               	 $re3 = mysqli_query($conn,$sql3);*/
			}
			?>
				<?php endforeach ; ?>
			
			
	


	
	
	</table>
</div>
	
	<br>

	<br> 
	<th class="text-center">Thanh tien</th>
	<td class="text-center"><?php echo $totalall ; 
        echo ".000";?></td>
       <?php //session_destroy() ?> 
       <?php
      
		if(isset($_POST['submit']))
			{
					$sql3 ="UPDATE bill SET 
               	 total = '$totalall'
               	 WHERE id =$last_id
               	 ";
               	 
               	 $re3 = mysqli_query($conn,$sql3);
               	   session_destroy()  ;
               	     $_SESSION['order'] = "<div class='success'>Food order successfully.</div>";
                             header("location:http://localhost:8080/food-oder/");
                             ob_end_flush();
			}
		?>

          
             

     
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="" class="input-responsive" required></textarea>
        
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

		 </form>