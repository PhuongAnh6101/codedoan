<?php include('partials-front/menu.php') ;
 include('login/login-check.php'); 
 //php ob_start(); 

 $total = $_SESSION['total'];
$order_date = date("Y-m-d h:i:sa");
$sql = "SELECT * FROM users1 WHERE username = '$username'";

$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);
if($count > 0){
    while($row=mysqli_fetch_assoc($res))
                {
                    $username = $row['username'];
                    $phone_number = $row['phone_number'];
                    $email = $row['email'];
                    $address = $row['address'];
                }

}

  $sql1 = "INSERT INTO bill SET
             user_id = '$username',
             order_date = '$order_date',
             total = '$total',
             status = 'ordered',
             username = '$username',
             phone_number = '$phone_number',
             email = '$email',
             address = '$address';";
      ;
      $res1 = mysqli_query($conn,$sql1);
  	$last_id = mysqli_insert_id($conn);


   $sql2 = "SELECT*FROM cart c JOIN food f ON c.food_id = f.id WHERE c.id_users = '$username' ";
             
               //execute the query
               $res2 = mysqli_query($conn,$sql2);
               // count rows to check whether we have foods or not
               $count2 = mysqli_num_rows($res2);
               // Create serial number variable and set default value as 1
               
               if($count2 > 0)
               {
                // We have food in database
                // Get the foods from database and display
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get the values from individual columns
                    $id = $row['food_id'];
                    $qty = $row['qty']; 
                    $sql3 = "INSERT INTO `order-food` SET 
                    id_users = '$username',
                    food_id = '$id',
                    qty = '$qty',
                    id_bill = '$last_id'

                    ";
                    //echo $sql3;
                    $res3 = mysqli_query($conn,$sql3);
                }
            }
            $sql4 = "DELETE FROM cart WHERE  id_users = '$username'";
            $res4 = mysqli_query($conn,$sql4);
            if($res4 == TRUE){
                header('location:'.URL.'');
                 $_SESSION['order'] = "<div class='bgtext'>
                                       <h1>Order Success</h1>
                                    </div> " ;
            
            }
           
  ?>
  
