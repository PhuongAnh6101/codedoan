<?php include('partials-front/menu.php'); ?>
<?php
 SESSION_START();
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
 $sql = "SELECT * FROm food WHERE id ='$id';";
$res = mysqli_query($conn, $sql); 
$count = mysqli_num_rows($res);
if($count >0)
{
	while ($row =mysqli_fetch_assoc($res))
	{
		$title = $row['title'];
         $image_name = $row['image_name'];
         $price = $row['price'];
	}

	
}

echo $price;

/* echo "<pre />";
var_dump($res); */
if(isset($res))
{
// B2 
// Kiem tra ton tai sesion['cart']
 if (isset($_SESSION['cart']))
 {
 	
 	if(isset($_SESSION['cart'][$id]))
 	{
 		
 		$_SESSION['cart'][$id]['qty'] += 1;
 	}
 	else
 	{
 		
 		$_SESSION['cart'][$id]['qty'] =1;

 	}

 	$_SESSION['cart'][$id]['name'] = $title;
    $_SESSION['cart'][$id]['image'] = $image_name;
    $_SESSION['cart'][$id]['price'] = $price;
 	$_SESSION['success'] = "<dialog open> 

This is an open dialog window</dialog>";
 	header("location:http://localhost:8080/food-oder/"); exit();
 }
 else
 {
 	
 	
 	$_SESSION['cart'][$id]['qty'] = 1;
 	$_SESSION['cart'][$id]['name'] = $title;
     $_SESSION['cart'][$id]['image'] = $image_name;
      $_SESSION['cart'][$id]['price'] = $price;
 		$_SESSION['success'] = 'Tao moi gio hang thanh con';
 	header("location:http://localhost:8080/food-oder/"); exit();
 }
}
?>