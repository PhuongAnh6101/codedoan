<?php
@ob_start();
SESSION_START();
if(! isset($_SESSION['cart']))
{
	header("location:http://localhost:8080/food-oder/"); exit();
}
$key = isset($_GET['key']) ? (int)$_GET['key'] : '';
if($key)

{
	if( array_key_exists( $key,$_SESSION['cart']))
	{
	
		unset($_SESSION['cart'][$key]);
		$_SESSION['success'] = 'Xoa san pham thanh cong';
	}
	header('location:'.URL.'/list-cart.php'); exit();
}

header('location:'.URL.'list-cart.php'); exit();
?>