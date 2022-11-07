<!DOCTYPE html>
<html>
<head>
<?php include('h.php');
error_reporting( error_reporting() & ~E_NOTICE );
?>
<head>
  <body>
    <div class="container">
  <?php include('navbar.php');?>
  <p></p>
    <div class="row">
      <div class="col-md-3"> 
       <?php include('menu_left.php');?>
    </div>
    <div class="col-md-6"> 
      <a href="Buy.php?act=add" class="btn-info btn-sm">เพิ่ม </a>
      <p></p>

    <?php
          $act = $_GET['act'];
          if($act == 'add'){
          include('Buy_form_add.php');
          }elseif ($act == 'edit') {
          include('Buy_form_edit.php');
          }
          else {
          include('Buy_list.php');
          }
    ?>
    </div>
    </div>
  </div>
  </body>