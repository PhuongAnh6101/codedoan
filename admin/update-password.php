<?php include('partials/menu.php'); ?>
<div class="main-content">
	<div class="wrapper">
		<h1>Change Password</h1>
		<br><br>
	
		<br><br>
		<?php
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];

		} 



		?>
	 
		<form action="" method="POST">
		<table class="tbl-30">
			<tr>
				<td>Current Password:</td>
				<td>
					<input type="password" name="current_password" placeholder="Current Password">
				</td>
			</tr>
				<tr>
				<td>New Password:</td>
				<td>
					<input type="password" name="new_password" placeholder="New Password">
				</td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td>
					<input type="password" name="confirm_password" placeholder="Confirm Password">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="id" value="<?php echo $id ;?>">
					<input type="submit" name="submit" value="Change Password" class="btn-secondary">
				</td>
			</tr>

		 </table>
		 </form>
		 <br> <br>
	</div>
    </div>


    <?php
    // check whetehr the submit button is clicked on not
	if(isset($_POST['submit']))
    {
    //	echo "Cliked";
    	// 1. get the data from form
    	$id=$_POST['id'];
    	$current_password = md5($_POST['current_password']);
    	$new_password = md5($_POST['new_password']);
    	$confirm_password = md5($_POST['confirm_password']);


    	// 2. Check whether the user with current Id and current password exists or not
    	$sql ="SELECT * FROM admin WHERE id =$id AND password = '$current_password'";
		
		    	// Execute the query
    	$res = mysqli_query($conn,$sql);
    	if($res == TRUE)
    	{
    		// check whether data is available or not
    		$count = mysqli_num_rows($res);
			
;    		if ($count == 1) {

				// user exitst and password can be changed
    			// echo "user found";
    			// check whether the new passsword and confirm match or not
				if($new_password == $confirm_password)
				{
					// update the password
					$sql2 ="UPDATE admin SET password = '$new_password' WHERE id=$id ";
					// Execute the query
					$res2 = mysqli_query($conn,$sql2);
					// check whther the query executed or not
					if($res2 == true)
					{
						// display succes message
						$_SESSION['change-pwd'] = "<div class = 'success'> Password changed successfully. </div>";
						// redirect the user
						 header('location:'.URL.'admin/manage-admin.php');
						 
					}
					else
					{
						// Sisplay error message
						$_SESSION['change-pwd'] = "<div class = 'error'> Failed to change Password. </div>";
						// redirect the user
						header('location:'.URL.'admin/manage-admin.php');
						
			   

					}
				}
				else 
				{
			        
					//redirect to manage admin page with error message
					$_SESSION['pwd-not-match'] = "<div class = 'error'> Password Did not Patch </div>";
					// redirect the user
					header('location:'.URL.'admin/manage-admin.php');
				
			
				}
    		}
    		else
    		{
				
    			$_SESSION['user-not-found'] = "<div class = 'error'> User not found. </div>";
				// redirect the user
			 header('location:'.URL.'admin/manage-admin.php');
    		}
    	}
    	// 3.Check whether the new password and confirm password match or not
    	// 4.change password if all above is true

    }
	

    ?>



<?php include('partials/footer.php'); ?>