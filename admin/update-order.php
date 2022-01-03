
<?php include('partials/menu.php'); ?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update Order</h1>
		<br><br>
	</div>
	<?php
	$id = $_GET['id']; 
	
	?>

		<form action="" method="POST">
			<table class="tbl-30">
				

				<tr>
					<td>Status</td>
					<td>
						<select name="status">
							<option value="ordered">Ordered</option>
							<option value="On Delivery"> On Delivery</option>
							<option value="Delivered">Delivered</option>
							<option value="Cancelled">Cancelled</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Update Order" class="btn-secondary">
					</td>
				</tr>
			</table>
			
		</form>
		<?php
		 if(isset($_POST['submit'])){
             	// echo "Clicked";
             	//1. Get all the values from our form
             //	$id = $_POST['id'];
             	$status = $_POST['status'];
             	
             	$sql = "UPDATE bill SET 
             	status ='$status' WHERE id ='$id'" ;
             	$res = mysqli_query($conn,$sql);
             	echo $sql;
             
             	 	if($res = TRUE)
    	             {
    		          // Query executed and admin updayed
    		          $_SESSION['update'] = "<div class = 'success'> Admin Upted Successfully. </div>";
    		          header('location:'.URL.'admin/manage-order.php');

    	              }
    	else

    	              {

    		         // failed ta update admmin
    		         $_SESSION['update'] = "<div class = 'eroor'>  Failed to update admmin.</div>";
    		          header('location:'.URL.'admin/manage-order.php');
    	} 
    }
		?>

	</div>
	
</div>

<?php include('partials/footer.php'); ?>