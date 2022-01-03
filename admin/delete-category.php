<?php 
  // include constants file
  include('../config/constants.php');
  //echo "Dekete Page"
  // Check whether the id and immage_name is set or not
  if(isset($_GET['id']) AND isset($_GET['Image_name']))
  {
  	// get the value and delete
  	//echo "Get Value and Delete";
  	$id = $_GET['id'];
  	$Image_name = $_GET['Image_name'];

  	//remove the physical image is availble
  	if($Image_name != "")
  	{
  		//image is available . so remove it
  		$path = "../images/category/".$Image_name;
      echo $Image_name;
  	
  		//Remove the image
  		$remove = unlink($path);

        //if falied to remove image then add an error message and stop the process
  		if($remove==false)
  		{
        
          
  			//Set the session message
  			$_SESSION['remove'] = "<div class='error'>Faild to Remove category Image.</div>";
  			//Redirect to manaage category page
  			header('location:'.URL.'admin/manage-category.php');
       //  die();
  		

  		}
    }


  	//delete data from database
  	// SQL query to delete data fro database
  	$sql = "DELETE FROM category Where id = $id";
    echo $sql;
  	// execute the query
  	$res = mysqli_query($conn,$sql);

  	//check whether the data is delete from database or not
  	if($res == TRUE)
  	{
  		//set success message and redirect
  		$_SESSION['delete'] = "<div class='success'>category Deleted Successfully.</div>";
  		//redirect to manage category
  		header('location:'.URL.'admin/manage-category.php');


  	}
  	else
  	{
  		//set fail message and redirecs
  		$_SESSION['delete'] = "<div class='error'>Failed to delete category.</div>";
  		//redirect to manage category
  		header('location:'.URL.'admin/manage-category.php');
  	}

  	//redirect to manage category page with message
  }
  else
  {
  	// redirect to manage category page
  	header('location:'.URL.'admin/manage-category.php');
  }
  


?>