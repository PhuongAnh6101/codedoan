<?php include('partials/menu.php'); ?>
  

<div class="main-content">
	<div class="wrapper">
		<h1> Add Admin </h1>

		<br><br>
		<?php  
          if(isset($_SESSION['add']))// chechking whether the session is set of not
          {
          	echo $_SESSION['add']; // display the session message if set
          	unset($_SESSION['sdd']); //remove session messsage
          }

		?>
		

		<form action="" method="POST">
		<table class="tbl-30">
			<tr>
				<td>Full Name</td>
				<td> <input type="text" name="full_name" placeholder="Enter Your Name"></td>
			</tr>
			<tr>
				<td>Username:</td>
				<td>
					<input type="text" name="username" placeholder="Your Username">
				</td>
			</tr>

			<tr>
				<td>Password:</td>
				<td>
					<input type="Password" name="password" placeholder="Your Password ">
				</td>
			</tr>


			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value="add-admin" class="btn-secondary">
				</td>
			</tr>
		</table>	


		</form>
	</div>
</div>
<?php include('partials/footer.php'); ?>
<?php
//process the value from Form and save it in Dâtbase
// Check wherther the submit button  
if(isset($_POST['submit']))
{
	// button clicked
	// echo "Button Clicked ";

	// Get the data from
	 $full_name = $_POST['full_name'] ;
	 $username = $_POST['username'];
	 $password =md5($_POST['password']); // password Encryption with MD5

	 //SQL Query to save the data into database
	 $sql = "INSERT INTO admin SET
	      full_name ='$full_name',
	      username ='$username',
	      password ='$password'
        
	 ";


//  3. Executing query and saving Data into Datbase     
$res = mysqli_query($conn, $sql) or die(mysqli_error());
// 4.Check wheter the (Query is Executed) data is inserted or not and display appropriate massage
if ($res == TRUE){
	// Data Inserted
	// echo "Data Inserted";
	// Create a session variable to display message
	$_SESSION['add'] = 'Admin Added Successfullt'; 
	// Redirect Page to manage admin
	header('location:'.URL.'/admin/manage-admin.php');
}
else
{
	$_SESSION['add'] = 'Failled to Add Admin'; 
	// Redirect Page to add admin
	header('location:'.URL.'admin/manage-admin.php');
}

}
  


?>