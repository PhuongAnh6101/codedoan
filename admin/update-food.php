<?php include('partials/menu.php');?>
<div class="main-content">
	<div class="wrapper">
		<h1>Update Food</h1>

		<br><br>
		<?php 
		// check whether the id is set or not
		if(isset($_GET['id']))
		{
			// Get the Id and all orther details
			// echo "Getting the Data";
			$id = $_GET['id'];
			//create Sql query to get all orther details
			$sql = "SELECT*FROM food Where id=$id";
			// Execute the query 
			$res = mysqli_query($conn,$sql);
			// count the rows to check whether the id valid or not
			$count = mysqli_num_rows($res);

			if ($count == 1) {

				// Get all the data
				$row = mysqli_fetch_assoc($res);
				$title = $row['title'];
				$description = $row['description'];
				$price =$row['price'];
				$current_image = $row['image_name'];
				$featured  = $row['featured'];
				$active = $row['active'];
				
				
			}
			else
			{
				// redirecy to manage category with session messahe
				$_SESSION['no-category-found'] = "<div class = 'error'>Category nnot found.</div>";
					header('location:'.URL.'admin/manage-food.php');
			}

		}
		else
		{
			//redirect to manage category
			header('location:'.URL.'admin/manage-food.php');
		}


		?>
		<form action="" method="POST" enctype="multipart/form-data">
		<table class="tbl-30">
		<tr >
			<td>Title: </td>
			<td>
				<input type="text" name="title" value="<?php echo $title;?>">
			</td>
		</tr>
		</tr>
           	<tr>
          		<td>Description: </td>
          		<td>
          		<textarea name="description" id="" cols="30" rows="5" ><?php echo $description;?></textarea>
          	</td>
          	</tr>
	
			<tr >
			<td>Price: </td>
			<td>
				<input type="text" name="price" value="<?php echo $price;?>">
			</td>
		</tr>
		<tr>
			<td>Current Image: </td>
			<td>
				<?php 
                  if($current_image != "")
                  {
                  	// Display the Image
                  	?>
                  	<img src=" <?php echo URL; ?>images/food/<?php echo $current_image; ?> " width = "150px">
                  	
                  
                  	<?php
                  }
                  else
                  {
                  	// Dissplay messaghe
                  	echo "<div class='error'>Image not Added.</div>";
                  }
				?>
			</td>
		</tr>
		<tr>
			<td>New Image:</td>
			<td>
				<input type="file" name="image">
			</td>
		</tr>
		<tr>
			<td>Category: </td>
			<td>
				<select name="category">
					<?php 
					//Quẻy to get active categories
					$sql1 = "SELECT * FROM category WHERE active='Yes'";
					//Execute the Quẻy
					$res1 = mysqli_query($conn,$sql1);
					//count rows
					$count1 = mysqli_num_rows($res1);
					if($count1 > 0)
					{
						while($row = mysqli_fetch_assoc($res1))
						{
						$category_title = $row['title'];
						$category_id = $row['id'];
						//echo "<option value='$category_id'>$category_title</option>";
						?>
						<option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
					    <?php
					    }

					}
					else
					{
						//Category not available
						echo "<option value ='0'>Category Not Available</option>";
					}

					?>
					
				</select>
			</td>
		</tr>
		<tr>
			<td> Featured:</td>
			<td>
			<input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
			 <input <?php if($featured=="No"){echo "checked";} ?>  type="radio" name="featured" value="No"> No

			</td>
		</tr>
		<tr>
			<td>Active: </td>
			<td>
				<input <?php if($active=="Yes"){echo "checked";} ?>  type="radio" name="active" value="Yes"> Yes
			 <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
			</td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="current_image" value="><?php $current_image; ?>">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="submit" name="submit" value="Update Food" class="btn-secondary">
		    </td>
		</tr>
		</table>
		</form>
		<?php 
             if(isset($_POST['submit'])){
             	// echo "Clicked";
             	//1. Get all the values from our form
             //	$id = $_POST['id'];
             	$title = $_POST['title'];
             	$price = $_POST['price'];
             	$description = $_POST['description'];
             	// $current_image = $_POST['current_image'];
             	 $category = $_POST['category'];
             	$featured = $_POST['featured'];
             	$active = $_POST['active'];
             	echo $description;

             	// 2. update new image if select
             	//check whether the image is select or not
         	  if(isset($_FILES['image']['name']))
             	{
             		// Get the Image Datails
             		
             		$image_name = $_FILES['image']['name'];


             		// check whether the image is availble or not
             		if($image_name != "")
             		{
             			//image available
             			//A. upload the new image

             					// Auto rename our image
				// Get the extension of our image (jpg,png,gif,ect) e.g "spcial.food1.jpg"
				$ext = end(explode('.',$image_name));
				// rename the image
				$image_name = "Food-Name-_".rand(000,999).'.'.$ext; //e.g. Food_Categor_834.jpg
				$source_path = $_FILES['image']['tmp_name'];
				$destination_path = "../images/food/".$image_name;
				// finally upload the image
				$upload = move_uploaded_file($source_path, $destination_path);
				// check whether the imange is upload or not
				//  if the image is not uploaded then we will stop the process and redirect with error message
				if($upload == false)
				{
					// set message
					$_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
					// redirect to add category page
					header('loaction:'.URL.'admin/manage-food.php');
					// stop the process
					die();
				}
                           
 
             			// B.remove the current image availble
					 if($current_image = "")
					{
						$remove_path = "../images/food/".$current_image;

					$remove = unlink($remove_path);

					//check whether the image is romoved or not
					// if failed to remove then display message and stop the process
					if($remove == false)
					{
						//Failed to remove image
						$_SESSION['failed-remove'] = "<div class = 'error'>Failed to remove current image.</div>";
						header('loaction:'.URL.'admin/manage-food.php');
						// die();//stop the process
					}	
					} 

				
             		
             	}
             	else
             	{
             		$image_name = $current_image;
             		echo $image_name;
             		
             	} 

             	}
             	else
             	{ 
             		$image_name = $current_image ;
             		echo $image_name;
             }
             
             	
             	

            	// 3.update the database
            	$sql2 = "UPDATE food SET
             	title = '$title',
             	price = $price,
             	description = '$description',
             image_name = '$image_name', 
             category_id = '$category', 
             	featured = '$featured',
             	active = '$active'
             	WHERE id = $id

             	";
             	
             	
             	// execute the querry
             	
            	$res2 = mysqli_query($conn,$sql2);

             	// 4.redirect to manage category with message
             	// check whether executed or not
             	if($res2 == true)
             	{
             		//category updated
             		$_SESSION['update']= "<div class='success'>Category Update Successfully.</div>";
             		header('location:'.URL.'admin/manage-food.php');
             	} 
             	else
             	{
             		// failed to uodate category
             			$_SESSION['update']= "<div class='error'>Failed to update category.</div>";
             		header('location:'.URL.'admin/manage-food.php');
             	
             	} 
}

             	
             	
             	
      
             
         

         


		?>
	</div>
</div>



<?php include('partials/footer.php'); ?>