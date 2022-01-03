<?php include('../config/constants.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - Food Order System </title>
    <link rel="stylesheet" href="../css/admin.css">

</head>
<body>
	<div class="login">
		<h1 class ="text-center"> Login</h1>
        <br><br>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message']))
        {
          echo $_SESSION['no-login-message'];
          unset($_SESSION['no-login-message']);
        }
        ?>
        <br><br>
        <!-- Login Form starts here -->
        <form action="" method="POST" class ="text-center">
        	Username:<br>
        	<input type="text" name="username" placeholder="Enter Username">
        	<br><br>
        	Password: <br>
        	<input type="password" name="password" placeholder="Enter Password"> <br><br>
        	<br> 
        	<input type="submit" name="submit" value="Login" class="btn-primary">
        </form>
    <br>
         <!-- Login form ends here -->
		<p class ="text-center">Created By-<a href="https://www.facebook.com/profile.php?id=100006845686193">Anh Phuong Hoang </a></p>
	</div>
    

</body>
</html>
<?php 
  // check whether the submit button is cliked or not
  if(isset($_POST['submit']))
  {
      // process for login
       // 1.Get the data from login form
       $username = $_POST['username'];
       $password  = md5($_POST['password']);
       // 2.SQL to check whether the user with username and password exists or not
       $sql = "SELECT * FROM  admin WHERE username ='$username' AND password ='$password'";
       
       // 3. EXecute the query
       $res = mysqli_query($conn,$sql);
       // 4.Count rows to check whether the user exists or not
     $count = mysqli_num_rows($res);
     echo $sql;
     echo $count;

       if($count > 0)
       {
           // user available and login succresss
         $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
         $_SESSION['admin'] = $username ;// to check whether the user is logged in or not and logout will unset it
           // redirect to home paage/dashboard
         header('location:'.URL.'admin/');
       }
       else
       {
          // user available and login succresss
        //  $_SESSION['login'] = "<div class = 'error'> Failed to change Password. </div>";
          $_SESSION['login'] = "<div class='error'>Username or Password did not match. <?php  echo $sql; ?></div>";
          // redirect to home paage/dashboard
         header('location:'.URL.'admin/login.php');  
         ;
       }
  }


?>