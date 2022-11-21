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
        }else if($_GET['page'] == 'product'){
          include('product.php');
        }else if($_GET['page'] == 'product_form_edit'){
          include('product_form_edit.php');
        }else if($_GET['page'] == 'product_form_add'){
          include('product_form_add.php');
        }else if($_GET['page'] == 'Buy'){
          include('Buy.php');
        }else if($_GET['page'] == 'Buy_form_add'){
          include('Buy_form_add.php');
        }else if($_GET['page'] == 'Buy_form_edit'){
          include('Buy_form_edit.php');
        }else if($_GET['page'] == 'order'){
          include('order.php');
        }else if($_GET['page'] == 'order_form_add'){
          include('order_form_add.php');
        }else if($_GET['page'] == 'order_form_edit'){
          include('order_form_edit.php');
        }else if($_GET['page'] == 'withdraw'){
          include('withdraw.php');
        }else if($_GET['page'] == 'withdraw_form_add'){
          include('withdraw_form_add.php');
        }else if($_GET['page'] == 'withdraw_form_edit'){
          include('withdraw_form_edit.php');
        }else if($_GET['page'] == 'expenses'){
          include('expenses.php');
        }else if($_GET['page'] == 'expenses_form_add'){
          include('expenses_form_add.php');
        }else if($_GET['page'] == 'expenses_form_edit'){
          include('expenses_form_edit.php');
        }
        
        else{
          
        }
        
        
        ?>

      </div>
    </div>
  </div>
  </body>
</html>