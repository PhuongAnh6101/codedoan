<?php include('partials/menu.php'); ?>

      <! -- Main Content Section Starts -->
      	<div class="main-content">
		  <div class="wrapper">
      	<h1>Dashboard</h1>
            <br><br>
            <?php
             if(isset($_SESSION['login']))
             {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
           }
            ?>
            <br> <br>
            <div class="col-4 text-center">
                <?php 
                // SQL query
                $sql = "SELECT * FROm category";
                // Execute query 
                $res = mysqli_query($conn,$sql);
                // COunt rows
                $count = mysqli_num_rows($res);

                ?>
                  <h1><?php echo $count; ?></h1>
                  <br />
                  Catrgories
            </div>
             <div class="col-4 text-center">
               <?php 
                // SQL query
                $sql2 = "SELECT * FROm food";
                // Execute query 
                $res2 = mysqli_query($conn,$sql2);
                // COunt rows
                $count2 = mysqli_num_rows($res2);

                ?>
                  <h1><?php echo $count2; ?></h1>
                  <br />
                  Food
            </div>
             <div class="col-4 text-center">
                <?php 
                // SQL query
                $sql3 = "SELECT * FROm bill";
                // Execute query 
                $res3 = mysqli_query($conn,$sql3);
                // COunt rows
                $count3 = mysqli_num_rows($res3);

                ?>
                  <h1><?php echo $count3; ?></h1>
                  <br />
                  Total Orders
            </div>
             <div class="col-4 text-center">
             <?php
             // Creaye SQL query to get total revenue generated
             // Aggregate Function in SQL
             $sql4 = "SELECT SUM(total) AS Total FROM bill  WHERE  status ='Delivered' ";
            
             // EXecute the query
             $res4 = mysqli_query($conn, $sql4);
             // Get the value
             $row4 = mysqli_fetch_assoc($res4);
             // Get the total revenue
             $total_revenue = $row4['Total'];
             ?>
                  <h1><?php echo $total_revenue; ?> VND</h1>
                  <br />
                  Rrevenue Generated
            </div>
            <div class="clearfix"></div>
      		</div>
      		 
      	</div>
      <! -- Main Content Section Ends -->
<?php include('partials/footer.php') ?>