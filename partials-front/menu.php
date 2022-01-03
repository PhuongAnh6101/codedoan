<?php
 include('config/constants.php');
 //include('3.php');


?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <header>
        <div class="container">
            <div class="logo">
                <a href="http://localhost:8080/cake/" title="Logo">
                    <img src="images/logo1.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo URL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>3.php">About Us</a>
                    </li>
                    <li>
   
           <a           
        <i class="icon"    class="fas fa-bars" id="menu-bars"> </i> 
        <i   class="fas fa-search" id="search-icon">  </i>
      </a>
    
      
   
                        
                    </li>
                    <li>
                        <a href="<?php echo URL;?>list-cart.php"  class="fas fa-shopping-cart"  >
                            <?php //count($_SESSION['cart'] )= $qty;
                            if(isset ($_SESSION['user'])){
                                $username = $_SESSION['user'];
                                   $sql = "SELECT*FROM cart c JOIN food f ON c.food_id = f.id WHERE c.id_users = '$username' ";
             
                                   //execute the query
                                   $res = mysqli_query($conn,$sql);
                                   // count rows to check whether we have foods or not
                                   $count = mysqli_num_rows($res);  
                                   if ($count >0){      
                                   echo $count;   }
                            }
                                         
                         ?></a>
                        
                    </li>  
                    <li>
                               <div class="dropdown">
    <a href="home.php"  class="fas fa-user-alt" > 
      
    </a>
    <div class="dropdown-content">
       <a href="logout.php">Logout</a>
      <a href="update_user.php">Update</a>
     
    </div>
                     
                </ul>
            </div>
      
  </div> 

            <div class="clearfix"></div>
        </div>
    </header>
    
    </section>
    <form action="<?php echo URL; ?>food-search.php" id="search-form" method="POST">
               

      <input type="search" name="search" placeholder="search here..." name="" id="search-box" required>
    <input type="submit" name="submit" value="Search" class="btn btn-primary">
    <i class="fas fa-times" id="close"></i>
</form>
    <!-- Navbar Section Ends Here -->

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>