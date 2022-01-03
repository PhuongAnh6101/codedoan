<?php include('partials/menu.php'); ?>
<div class="main-content">
	<div class="wrapper">
		<h1>Update Admin</h1>
		<br><br>
		<?php 
		    // 1. Get the Id of selected admin
		    $id=$_GET['id'];
		    // 2.Create SQL Query to get the details
		    $sql = "SELECT*FROM admin WHERE id = $id";
		    // Exucute the query
		    $res=mysqli_query($conn,$sql);
		    // Check whether the query is exetued or not
		    if($res==TRUE)
		    {
		    	// Check whether the data is avaiable or not 
		    	$count = mysqli_num_rows($res);
		    	if($count== 1)
		    	{
		    		// Get the Details
		    		// echo "admin Availbanle";
		    		$row = mysqli_fetch_assoc($res);
		    		$full_name = $row['full_name'];
		    		$username = $row ['username'];
		    	}
		    	else
		    	{
		    		// Redirect to Manage Admin PAge
		    		header('location:'.URL.'admin/manage-admin.php');
		    	}

		    }


		 ?>

          <form action=""method="POST">
          	<table class="tbl-30">
          		<tr>
          			<td>Full Name:</td>
          			<td>
          				<input type="text" name="full_name" value="<?php echo $full_name; ?>">
          			</td>
          		</tr>
          		<tr>
          			<td>Username: </td>
          			<td>
          				<input type="text" name="username" value="<?php echo $username; ?>">
          			</td>
          		</tr>
          		<tr>
          			<td colspan="2">
          				<input type="hidden" name="id" value="<?php echo $id; ?>">
          				<input type="submit" name="submit" value="Update admin" class="btn-secondary">
          			</td>
          		</tr>
          	</table>
          	
          </form>

	</div>
</div>

<?php 
   // check whether the submit button is clich=ked or not 
    if(isset($_POST['submit']))
    {
     // get all the values from form to update
    	$id = $_POST['id'];
    	$full_name = $_POST['full_name'];
    	$username = $_POST['username'];

    	//create s SQL Query to update admin
    	$sql = "UPDATE admin SET  
    	        full_name = '$full_name',
    	        username = '$username'
    	        WHERE id = '$id'

    	";
    	
    	// Execurte the query
    	$res = mysqli_query($conn,$sql);
    	//Check whether the query executed successfully or not
    	if($res = TRUE)
    	{
    		// Query executed and admin updayed
    		$_SESSION['update'] = "<div class = 'success'> Admin Upted Successfully. </div>";
    		header('location:'.URL.'admin/manage-admin.php');

    	}
    	else

    	{

    		// failed ta update admmin
    		$_SESSION['update'] = "<div class = 'eroor'>  Failed to update admmin.</div>";
    		header('location:'.URL.'admin/manage-admin.php');
    	}



    }

?>
<?php include('partials/footer.php'); ?>