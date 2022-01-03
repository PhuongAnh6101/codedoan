<?php include('partials-front/menu.php'); 
 include('login/login-check.php');?>


<?php

// B1 Lây  id của sản phẩm cần thêm vào giỏ hàng 
 if(isset($_GET['food_id']))
 {
   $id = $_GET['food_id'];

 }
 //$id = isset($_GET['id']) ? $_GET['id'] : '';

/* if(isset($_GET['id'] ) && $_GET['id']!= null )
{
   $id = isset($_GET['id']);
} */
$sql = "UPDATE cart SET qty = qty + 1 WHERE food_id = '$id' AND id_users = '$username'"
;
$res = mysqli_query($conn,$sql);

header('location:'.URL.'list-cart.php');

   

?>