   <?php include('partials-front/menu.php') ?>
       <?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset ($_SESSION['order']);
        }

    ?>
        <?php  
          if(isset($_SESSION['success']))// chechking whether the session is set of not
          {
            echo $_SESSION['success']; // display the session message if set
            unset($_SESSION['success']); //remove session messsage
          }

        ?>
<?php// include('2.php') ?>
<?php  //include('3.php') ?>
<section class="home" id="home">
      
<div class="circle"></div>


    <div class="content">
        <h3>Food made with love</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas accusamus tempore temporibus rem amet laudantium animi optio voluptatum. Natus obcaecati unde porro nostrum ipsam itaque impedit incidunt rem quisquam eos!</p>
        <a href="categories.php" class="btn2">order now</a>
        
    </div>

    <div class="image">
        <img src="images/banh1.png" class="starbucks">
    </div>
</div>
<ul class="thumb">
    <li><img src="images/home3.png" onclick="imgSlide('images/home3.png');changeCircleColor(' #F08080')"></li>
      <li><img src="images/home2.1.png" onclick="imgSlide('images/home2.png');changeCircleColor('#FFDAB9')"></li>
        <li><img src="images/home1.1.png" onclick="imgSlide('images/banh1.png');changeCircleColor('#FFCCD2')"></li>
</ul>

 
    


            <div class="clearfix"></div>

</section>
<script type="text/javascript">
    function imgSlide(anything) {
        document.querySelector('.starbucks').src = anything;
    }

    function changeCircleColor(color){
    const circle = document.querySelector('.circle');
    circle.style.background = color;
}
</script>

    <!-- fOOD sEARCH Section Starts Here -->
  
  <!--  <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section> -->
    <!-- fOOD sEARCH Section Ends Here -->
  

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 

               // create SQl to Display category grom database
            $sql = "SELECT * From category WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3 ";
            
            // execute the query 
            $res = mysqli_query($conn,$sql);
            // Count rows to check whether the category is available or not
            $count = mysqli_num_rows($res);

            if($count >0)
            {
                // category availasble
                while($row = mysqli_fetch_assoc($res))
                {
                    // Get the values like id, title, image_name
                    $id = $row['id'];
                    $title =$row['title'];
                    $image_name = $row['image_name'];
                    ?>
                     <a href="category-foods.php?category_id=<?php  echo $id ?>">
                     <div class="box-3 float-container">
                        <?php
                        //check wheter image is availbable or not
                          if($image_name == "")
                          {
                            // Display message
                            echo "<div class = 'error'>imane not available</div>";
                          }
                          else
                          {
                            //image available
                            ?>
                                <img src=" <?php echo URL;?>images/category/<?php echo $image_name; ?>"  alt="Pizza" class="img-responsive img-curve" width="400" height="400">
                            <?php
                          }
                        ?>
                  

                     <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                    </a>




                    <?php

                }
            }
            else
            {
                // categories  not available
                echo "<div class='error'>Category not Added</div>";
            }



             ?>

           
         

         

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<div class="step-container">

    <h1 class="heading">How it <span>works</span></h1>
        <section class="steps">

        <div class="box">
            <img src="images/step-1.jpg" alt="">
            <h3>Choose your favorite food</h3>
        </div>
        <div class="box">
            <img src="images/step-2.jpg" alt="">
            <h3>Free and fast delivery</h3>
        </div>
        <div class="box">
            <img src="images/step-3.jpg" alt="">
            <h3>Easy payments methods</h3>
        </div>
        <div class="box">
            <img src="images/step-4.jpg" alt="">
            <h3>And finally, enjoy your food</h3>
        </div>
    
    </section>

</div>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            //getting food from database that are active  and featured
            // SQL query
            $sql2 = "SELECT * FROM food WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6";
            //execuete the query
            $res2 = mysqli_query($conn,$sql2);
            //Count rows
            $count2 = mysqli_num_rows($res2);
            // Check whether food available or not
            if($count2 >0)
            {
              //Food availble
               while ($row =mysqli_fetch_assoc($res2))
               {
                // Get all the values
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

                    <a href="add-cake.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                <?php 
               } 
            }
            else
            {
                echo "<div class = 'error'>Food not available</div>";
            }
             ?>

            

            

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include('partials-front/footer.php') ?>