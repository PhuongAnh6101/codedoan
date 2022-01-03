<?php  include('partials-front/menu.php') ;
 include('login/login-check.php');
 //echo $_SESSION['user'];

?>

<?php


if(isset($_GET['food_id']))
{
	$id = $_GET['food_id'];
	$username = $_SESSION['user'];
	//echo $username;
//	echo $id;
	$sql1 = "SELECT*FROM cart WHERE food_id ='$id' AND id_users = '$username' ";
	echo $sql1;
	$res1 = mysqli_query($conn,$sql1);
	$count1 = mysqli_num_rows($res1);
	if($count1 == 0)
	{
		$sql2 = "INSERT INTO cart SET 
		food_id = '$id',
		id_users = '$username',
		qty = '1'

		";
		echo $sql2;
		$res2 = mysqli_query($conn,$sql2);
	}
	else
	{
		while($row = mysqli_fetch_assoc($res1))
		{
			$qty = $row['qty'];
		}
		$sql3 = "UPDATE cart SET qty = $qty + 1 WHERE  food_id = '$id'  AND id_users = '$username'";
		$res3 = mysqli_query($conn,$sql3);
		echo $sql3;

	}

}
header('location:'.URL.'list-cart.php');

/*
$sql1 = "SELECT*FROM food WHERE id = '$id'";
$res1 = mysqli_query($conn,$sql2);
$count1 = mysqli_num_rows($res1);
if(count1 == 1)
{
	while($row = mysqli_fetch_assoc($res1))
	{
		$title = $row['title'];
		$image_name = $row['image_name'];
		$price = $row['price'];
	}
}*/

?>