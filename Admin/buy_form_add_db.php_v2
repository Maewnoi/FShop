<?php

session_start();
include('condb.php');

$b_status = $_POST['b_status'];

$buy_price = $_POST['buy_price'];

$q = "SELECT MAX(`buy_id`)as buyid FROM `tbl_buy` WHERE 1";
$qq = mysqli_query($con, $q);
$qqq = mysqli_fetch_array($qq);
$buy_id = $qqq['buyid']+1;



 //บันทึกใบสั่งซื้อ
$sql ="INSERT INTO `tbl_buy`(`buy_id`, `buy_recorder`, `buy_price`, `buy_status`,buy_date )
VALUES ('".$buy_id."','".$_SESSION["ID"]."','".number_format($buy_price, 2, '.', '')."','$b_status',Now()) ";
 $result = mysqli_query($con, $sql);
      //  echo $sql;
   

    if($result){
      //อัพเดตรายการที่สั่งซื้อ
      $sql1 = "UPDATE `tbl_buylist` SET  `b_buy_id` = '$buy_id',`b_basket` = '0'
      WHERE `b_basket` = '1'";
      $result1 = mysqli_query($con, $sql1);
            
      echo "<script>";
      echo "alert('เพิ่มข้อมูลเรียบร้อย');";
      echo "window.location ='index.php?page=Buy'; ";
      echo "</script>";
    } else {
 
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='index.php?page=Buy'; ";
      echo "</script>";
    }
  
?>