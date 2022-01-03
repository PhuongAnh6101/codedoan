<?php include('config/constants1.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  <link rel="stylesheet" href="style.css" /> 
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form" method="POST">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" name="submit2" value="Login" class="btn solid" />
           
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
    

           <?php
            if(isset($_POST['submit2']))
            {
            	echo "ok";
            	//1.Get the data from ;ogin form
            	$username = $_POST['username'];
            	$password = md5($_POST['password']);
            	//2.SQL to check whether the user with username and password exists or not
            	$sql = "SELECT*FROM users1 WHERE username ='$username' AND password ='$password'";
              
                  $res = mysqli_query($conn,$sql);
       // 4.Count rows to check whether the user exists or not
     $count = mysqli_num_rows($res);
     echo $count;
        if($count == 1)
       {
           // user available and login succresss
         $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
         $_SESSION['user'] = $username ;// to check whether the user is logged in or not and logout will unset it
           // redirect to home paage/dashboard
       header("location:http://localhost:8080/cake");
       }
       else
       {
          // user available and login succresss
        //  $_SESSION['login'] = "<div class = 'error'> Failed to change Password. </div>";
          //$_SESSION['login'] = "<div class='error'>Username or Password did not match.</div>";
          // redirect to home paage/dashboard
         header('http://localhost:8080/cake/');  
         
       }

            }

            ?>
          <form action="#" class="sign-up-form" method="POST">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
             <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
             <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="Number" name="phone_number" placeholder="Phone Number" />
            </div>
             <div class="input-field">
              <i class="fas fa-map-marker"></i>
              <input type="text" name="address" placeholder="Address" />
            </div>
            <input type="submit" name="submit1" class="btn" value="Sign up" /> 
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
<?php
if(isset($_POST['submit1']))
{
	//button clicked
//	echo "ok";
	//Get the data from
	$username = $_POST['username'];
	$password= md5($_POST['password']);
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
    $address = $_POST['address'];		

    //Qql query to save the data into database
    $sql1 = "INSERT INTO users1 SET
    username = '$username',
	password = '$password',
	email = '$email',
	phone_number = '$phone_number',
    address = '$address'
    ";

    echo $sql1;

    // 3.Executing query and saving data into database
    $res1 = mysqli_query($conn,$sql1) ;
    if($res1 == TRUE)
    {
    	$_SESSION['sin-up'] = 'ok';
    	header("location:http://localhost:8080/cake/login/");
    }
    }


?>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/home3.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/home3.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
