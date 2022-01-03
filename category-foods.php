<?php include('partials-front/menu.php') ?>
<?php
     
     //check whether  id ia passed or not
     if(isset($_GET['category_id']))
     {
        // category id is set get the id
        $category_id = $_GET['category_id'];
        // get the category title based on category ID
        $sql = "SELECT title FROM category WHERE id = $category_id";
        // execute the query
        $res = mysqli_query($conn,$sql);
        //Get the value from database
        $row = mysqli_fetch_assoc($res);
        //Get the title
        $category_title = $row['title'];


     }
     else
     {
        //category not passed
        //redirect to home page
        header('location:');
     }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
   <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
           
            //SQL Query to Get foods based on search keyword
             $sql = "SELECT*FROM food WHERE category_id = '$category_id'";
             // Exucute the query
             $res = mysqli_query($conn,$sql);
             //Count rows
             $count = mysqli_num_rows($res);
             // Check whether food available of not
             if($count>0)
             {
                // food available
                while($row = mysqli_fetch_assoc($res))
                {
                    //Get the details
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                              <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        //check whether image available or not
                        if($image_name=="")
                        {
                            // image not available
                            echo "<div class ='error'>Image not available.</div>";
                        }
                        else
                        {
                            //image available
                            ?>
                                  <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" height= 150px>
                            <?php
                        } 
                        ?>
                
                </div>
                     <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price"><?php echo $price; ?></p>
                    <p class="food-detail">
                       <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="order?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                <?php 
               } 
            }
            else
            {
                echo "<div class = 'error' >Food not available</div>";
            }
             ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include('partials-front/footer.php') ?>