<?php 

include('config/constants.php');
 include('login/login-check.php');
$id = $_GET['food_id'];
$sql = "DELETE FROM cart WHERE food_id = '$id' AND id_users = '$username'";
$res = mysqli_query($conn,$sql);
header('location:'.URL.'list-cart.php');



?>