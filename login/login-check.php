<?php 


 // Authorization - Access control
 // check whether the user is logged in or not 
 if(!isset($_SESSION['user']))  // if user session is not set
 {
   // user is not loged in
   // redirect to login page with message
   $_SESSION['no-login-message'] = "<div class ='error'> Please login to access Admin panel.</div>";
   // redirect to login page
   header('location:http://localhost:8080/cake/login');
 }
$username = $_SESSION['user'];
?>
