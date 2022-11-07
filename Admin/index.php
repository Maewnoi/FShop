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
      <div class="col-md-2">
        <!-- Left side column. contains the logo and sidebar -->
       <?php  include('menu_left.php');?>
        <!-- Content Wrapper. Contains page content -->
      </div>
      <div class="col-md-10 card" >
         <?php
        if($_GET['page'] == 'admin'){
          include('admin.php');
        }else if($_GET['page'] == 'admin_form_add'){
          include('admin_form_add.php');
        }else if($_GET['page'] == 'admin_form_edit'){
          include('admin_form_edit.php');
        }else if($_GET['page'] == 'member'){
          include('member.php');
        }else if($_GET['page'] == 'member_form_add'){
          include('member_form_add.php');
        }else if($_GET['page'] == 'member_form_edit'){
          include('member_form_edit.php');
        }else if($_GET['page'] == 'type'){
          include('type.php');
        }else if($_GET['page'] == 'type_form_add'){
          include('type_form_add.php');
        }else if($_GET['page'] == 'type_form_edit'){
          include('type_form_edit.php');
        }else if($_GET['page'] == ''){
          include('.php');
        }else if($_GET['page'] == ''){
          include('.php');
        }else if($_GET['page'] == ''){
          include('.php');
        }else if($_GET['page'] == ''){
          include('.php');
        }
        
        else{
          
        }
        
        
        ?>

      </div>
    </div>
  </div>
  </body>
</html>