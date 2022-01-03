<?php include('partials-front/menu.php') ;
 include('login/login-check.php');?>

  <link rel="stylesheet" href="../login/style.css" /> 
  <?php   
    $username = $_SESSION['user'];
    $sql = "SELECT *FROM users1 where username = '$username'";
    
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

      if ($count == 1){
        $row = mysqli_fetch_assoc($res);

        $username = $row['username'];
        $password = $row['password'];
        $phone_number = $row['phone_number'];
        $email = $row['email'];
        $address = $row['address'];
      }

  ?>
        <div class="signin-signup">
          <form action="" class="sign-in-form" method="POST">
            <h2 class="title">UPDATE USER</h2>
            
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="Number" name="phone_number" value="<?php echo $phone_number; ?>" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="Email" name="email" value="<?php echo $email; ?>" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" name="address" 
              value="<?php echo $address; ?>" />
            </div>

            <input type="submit" name="submit" value="Update" class="btn solid" />
           </form>
           <?php 
           if(isset($_POST['submit'])){
            
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
            $address = $_POST['address'];
           

           $sql2 = "UPDATE users1 SET 
           phone_number = '$phone_number',
           email = '$email',
           address = '$address'";
           $res2 = mysqli_query($conn,$sql2);
           
           if($res2 == TRUE){
            header('location:index.php');
           }
           }

           ?>

         </div>
       </div>
     </div>
