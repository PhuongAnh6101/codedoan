<?php 
// Include constants.php for SITEURL
  include('config/constants.php');
   //1.Destory the session
   session_destroy();  // unsets $_SE
   // 2. Redirect to login page
   header('location:'.URL.'login');

?>