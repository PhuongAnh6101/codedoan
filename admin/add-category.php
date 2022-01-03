<?php  include('partials/menu.php'); ?>
<div class="main-content">
	<div class="wrapper">
		<h1>Add category</h1>

		<br><br>
		 <?php 

          if(isset($_SESSION['add']))
          {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }
          if(isset($_SESSION['upload']))
          {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
          }

        ?>
	
		<br><br>
		<!-- Add category form start -->
		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-30">
				<tr>
					<td>Title:</td>
					<td>
						<input type="text" name="title" placeholder="Category Title ">
					</td>
				</tr>

				<tr>
					<td> Select Image:</td>
					<td>
						<input type="file" name="Image">
					</td>
				</tr>


				<tr>
					<td>Featured:</td>
					<td>
						<input type="radio" name="featured" value="Yes">Yes
						<input type="radio" name="featured" value="No">No
					</td>
				</tr>
				<tr>
				<td>Active:</td>
					<td>
						<input type="radio" name="active" value="Yes">Yes
						<input type="radio" name="active" value="No">No
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Category" class="btn-secondary">
					 </td>
				</tr>
			</table>
		</form>
		<!-- Add category form ends -->
		<?php 
           // check whether the submit button is clicked or not 
		if(isset($_POST['submit']))
		{
			// echo "Clicked";

			// 1.Get the value from category form
			$title = $_POST['title'];
			// for radio input,we need to check whether the button is select or not
			if(isset($_POST['featured']))

			{
				//get the value from form
				
				$featured = $_POST['featured'];
			}
			else
			{
				// set the default value
				$featured = "No";
			}
			if(isset($_POST['active']))
			{
				$active = $_POST['active'];
			}
			else
			{
				$active = "No";
			}

			//check wheter the image is selected or not and set the value for image name accoridingly

			// print_r($_FILES['Image']);
			// die(); // Break the code here
			if(isset($_FILES['Image']['name']))
			{
				// upload the image
				// to upload image need image name, source path and destination path
				$Image_name = $_FILES['Image']['name'];
				// Upload the image only if image is selected
         if($Image_name != "")
         {



				// Auto rename our image
				// Get the extension of our image (jpg,png,gif,ect) e.g "spcial.food1.jpg"
				$ext = end(explode('.',$Image_name));
				// rename the image
				$Image_name = "Food_category_".rand(000,999).'.'.$ext; //e.g. Food_Categor_834.jpg
				$source_path = $_FILES['Image']['tmp_name'];
				$destination_path = "../images/category/".$Image_name;
				// finally upload the image
				$upload = move_uploaded_file($source_path, $destination_path);
				// check whether the imange is upload or not
				//  if the image is not uploaded then we will stop the process and redirect with error message
				if($upload == false)
				{
					// set message
					$_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
					// redirect to add category page
					header('loaction:http://localhost:8080/food-oder/admin/manage-category.php');
					// stop the process
					die();
				}

			}
			}
			else 
			{
				// Don't upload image and set the imge_name value as blank
				$Image_name="";
			}
			// 2.
				$sql = "INSERT INTO category SET 
				title = '$title',
				image_name ='$Image_name',
				featured = '$featured',
				active = '$active'
				";
				echo $sql; 
				// 3.Execute the query and sace in database
				$res = mysqli_query($conn,$sql);
				//4. check whether the query executed or not and data added or not 
				if($res == true)
				{
					// Query executes and category added
					$_SESSION['add'] =" <div class='success'>Category Added Seccessfully. </div>";
					//redirect to manage page
					
					header('loaction:'.URL.'admin/manage-category.php');
				}
				else
				{
					//Failed to add category
					$_SESSION['add'] = "<div class='error'>Failed to Add Category. </div>";
					//redirect to manage page
					header('loaction:'.URL.'admin/add-category.php');
   
				} 
			} 
		
		

			// 2.create sql to insert category into database
	
		
	
		


		?>
	</div>
</div>



<?php  include('partials/footer.php'); ?>