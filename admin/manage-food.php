<?php include('partials/menu.php'); ?>
 
<div class='main-content'>
    <div class='wrapper'>
     <h1>Manage Food</h1>
     <br /> <br/>
        <! -- Button to Add Admin -->
            <a href="add-food.php" class="btn-primary">Add Food </a>
            <br />
            <br /> <br />

            <?php 
          if(isset($_SESSION['add']))
          {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }
           if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
         
          }
          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }
          if(isset($_SESSION['upload']))
          {
           echo $_SESSION['upload'];
           unset($_SESSION['upload']); 
          }
          if(isset($_SESSION['failed-remove'] ))
          {
            echo $_SESSION['failed-remove'] ;
            unset ($_SESSION['failed-remove'] );
          }



            ?>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Price</th>
                    <td>Image</td>
                    <th>Featured</th>
                    <th>active</th>
                    <th>action</th>
                </tr>
                
               <?php
               // Create a SQL query to get all the fool
               $sql = "SELECT*FROM food";
               //execute the query
               $res = mysqli_query($conn,$sql);
               // count rows to check whether we have foods or not
               $count = mysqli_num_rows($res);
               // Create serial number variable and set default value as 1
               $sn = 1;
               if($count > 0)
               {
                // We have food in database
                // Get the foods from database and display
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the values from individual columns
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>
                    <tr>

                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <?php 
                        //check whether image name is available or not
                        if($image_name!="")
                        {
                            //Display the image
                            ?>
                            <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?> " width = "100px">
                            <?php

                        }
                        else
                        {
                            //Display the message
                            echo "<div class='error'>Image not added</div>";
                        }


                         ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <a href="<?php echo URL;?>admin/update-food.php?id=<?php echo $id; /*?>&Image_name=<?php echo $Image_name; */ ?>" class="btn-secondary">Update Food</a>
                        <a href="<?php echo URL;?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                    </td>
                </tr>
                    <?php
                }
               }
               else
               {
                //Food not added in database
                echo "<tr><td colspan = '7' class ='error'>Food not Added Yet.</td></tr>";
               }



               ?>
                
            </table>
     </div>
</div>


<?php include('partials/footer.php'); ?>