<?php
  session_start(); 
  include('../condb.php');
 
  $user_id=(isset($_SESSION["ID"])?$_SESSION["ID"]:'') ;
  $a_name=(isset($_SESSION["a_name"])?$_SESSION["a_name"]:'') ;

 	if($user_id=''){
      Header("Location: ../logout.php");
    }  
?>
<!DOCTYPE html>
<html>
<head>
  <?php include('../h.php');?>
<head>
  <body>
    <div class="containre">
  <?php include('navbar.php');?>
  <p></p>
    <div class="row">
      <div class="col-md-3">
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('menu_left.php');?>
        <!-- Content Wrapper. Contains page content -->
      </div>
    </div>
  </div>
  </body>
</html>ห