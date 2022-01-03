<?php 
// include constants.php file here
include('../config/constants.php');
// 1 get the id of admin to be delete

$id = $_GET['id'];

// 2. create SQL query to delete admin

$sql = "DELETE FROM admin WHERE id =$id";
// Execute the query
$res = mysqli_query($conn,$sql);

// check whetther the queryy executed successfully or not 
if($res == TRUE)
{
	// querry executed successully and admin delete
	//echo "Admin Delete";
		$_SESSION['delete'] = "<div class = 'success'> Admin Delete Successfully.</div>";
	header('location:'.URL.'admin/manage-admin.php');
}

else
{
	$_SESSION['delete'] = "<div class = 'eroor'> Failed to Delete Admin. Try Again later.</div>";
	header('location:'.URL.'admin/manage-admin.php');
	// Failed to delete admin
	//echo "Failed to delete admin ";\
	// create session varibale to display message
}

// 3.Redirect to manage admin page with message (success/error)
?>