<?php include('partials/menu.php'); ?>
<div class="main-content">
	<div class="wrapper">
		<h1>Add Food</h1>
		<br><br>

    <?php
     if(isset($_SESSION['upload']))
     {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
     }


     ?>


		<!-- Add food form start -->
		<form action="" method="POST" enctype="multipart/form-data">
          <table class="tbl-30">
          	<tr>
          		<td>Title:</td>
          		<td>
          			<input type="text" name="title" placeholder="Title of the Food"> 
          		</td>
          	</tr>
          	<tr>
          		<td>Description: </td>
          		<td>
          		<textarea name="description" id="" cols="30" rows="5" placeholder="Description of the Food"></textarea>
          	</td>
          	</tr>
          	<tr>
          	<td>Price: </td>
          	<td>
          	<input type="number" name="price" class="input-responsive" value="" required >
          	</td>
            </tr>

            <tr>
            	<td>Select Image: </td>
            	<td>
            		<input type="file" name="image">
            	</td>
            </tr> 

            <tr>
            	<td>Category: </td>
            	<td>
            		<select name="category">

                         <?php
                          //create PHP code to display categories from database
                          //1.create SQL to get all active categories from database
                         $sql = "SELECT*FROM category Where active = 'Yes'";
                         // Executing query
                         $res =mysqli_query($conn,$sql);
                         //Count Rows to check whether we have categories or not
                         $count = mysqli_num_rows($res);

                         // if count is greater than zero, we have categories else we donot have categories 
                         if($count>0)
                         {
                         	//we have category
                         	while($row=mysqli_fetch_assoc($res))
                         	{
                         		// get the details of categories
                         		$id = $row['id'];
                         		$title = $row['title'];
                         		?>
                         		<option value="<?php echo $id; ?>"><?php echo $title ?></option>
                         		<?php
                         	}
                         }

                         else
                         {
                         	//We do not have category
                         	?>
                         	<option value="0">No Category Found</option>
                         	<?php
                         }



                         //2.Display on Drpopdown

                         ?>

            		
            		</select>
            	</td>
            </tr>

            <tr>
            	<td>Featured: </td>
            	<td>
            		<input type="radio" name="featured" value="Yes"> Yes
            		<input type="radio" name="featured" value="No"> No
            	</td>
            </tr>

            <tr>
            	<td>Active:</td>
            	<td>
            		<input type="radio" name="active" value="Yes"> Yes
            		<input type="radio" name="active" value="No"> No
            	</td>
            </tr>
            <tr>
            	<td colspan="2">
            		<input type="submit" name="submit" value="Add Food" class="btn-secondary">
            	</td>

            </tr>






          </table>
		 </form>
     <?php

       // check ưhether the button í clicked or not
     if(isset($_POST['submit']))
     {
      //Add the food in database
      //echo "clicked";
      // 1.Get the data from form
      $title = $_POST['title'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $category = $_POST['category'];
      // check whether radio button featured and active are checked or not
      if(isset($_POST['featured']))
      {
        $featured = $_POST['featured'];
      }
      else
      {
        $featured = "No";//Setting the default value
      }
      if(isset($_POST['active']))
      {
        $active = $_POST['active'];
      }
      else
      {
        $active = "No"; // Setting default value
      }

      //2.upload the image if selected
      // Check whether the select image is clicked or not and upload the image only if the image is select
      if(isset($_FILES['image']['name']))
      {
        // Get the datails of the selected image
        $image_name = $_FILES['image']['name'];
        // check whether the image is selected or not and uplaod only if selected
        if($image_name != "")
        {
          //image is selected
          // A.Rename the image
          // get the extension of select image(jpg,png,gif,ect.)
          $t = explode('.',$image_name);
          $ext = end($t);
          // Create new name for image
          $image_name = "Food-Name-".rand(0000,9999).".".$ext; //New Image name may be"Food-name-675"


          // B.Upload the image
          // Get the Src Path and Destinationn Path

          // Source path is the current location of the image
          $src = $_FILES['image']['tmp_name'];
          //Destination path for the image to be uploaded
          $dst = "../images/food/".$image_name;
          //finally upload the food image
          $upload = move_uploaded_file($src,$dst);

          //check whether image uploaded of not
          if($upload == false)
          {
            // Failed to upload the image
            // Redirect to add food page with error message
            $_SESSION['upload'] = "<div class ='error'>Failed to upload Image.</div> ";
            header('loaction:'.URL.'admin/add-food.php');
            die();
          }

        }

      }
      else
      {
        $image_name = "";// setting default value as blank
      }
      // 3. Insert onto database

      //create a SQL query to save or add food
      // for numerical we do not need to pass value inside quotes '' but for string value it is compulsory to add quotes ''
      $sql2 = "INSERT INTO food SET
           title ='$title',
           description = '$description',
           price = $price,
           image_name = '$image_name',
           category_id =$category,
           featured = '$featured',
           active = '$active'
      ";
      $res2 = mysqli_query($conn,$sql2);
      

      //Execute the query
  if($res2 == true)
        {
          // Query executes and category added
          $_SESSION['add'] =" <div class='success'>Food Added Successfully. </div>";
          //redirect to manage page
          
          header('location:'.URL.'admin/manage-food.php');
        }
        else
        {
          //Failed to add category
          $_SESSION['add'] = "<div class='error'>Failed to Add Food. </div>";
          //redirect to manage page
          header('loaction:'.URL.'admin/add-food.php');
   
        } 
   }
     

     ?>




	</div>
</div>

<?php include('partials/footer.php'); ?>