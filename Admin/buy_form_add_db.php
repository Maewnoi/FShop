<?php

session_start();
include('condb.php');

$b_status = $_POST['b_status'];

$q = "SELECT MAX(`buy_id`)as buyid FROM `tbl_buy` WHERE 1";
$qq = mysqli_query($con, $q);
$qqq = mysqli_fetch_array($qq);
$buy_id = $qqq['buyid']+1;

$pp=0;

//บันทึกรายการที่สั่งซื้อ
for ($x = 1; $x <= $_POST['numi']; $x++) {

  
  if($_POST['b_QTY'.$x] != null && $_POST['b_QTY'.$x] != '0' ){ 
    //  echo $_POST['st_name'.$x].'//'.$_POST['b_QTY'.$x].'<br>';
      $sql1 = "INSERT INTO `tbl_buylist`(`b_id`, `b_list`, `b_st_id`, `b_QTY`, `b_price`, `b_time`, `b_buy_id`,b_received)
      VALUES (Null,'".$_POST['st_name'.$x]."','".$_POST['st_id'.$x]."','".$_POST['b_QTY'.$x]."','".$_POST['b_price'.$x]."',Now(),'$buy_id','N')";
       $result1 = mysqli_query($con, $sql1);
       $pp = ($_POST['b_price'.$x]*$_POST['b_QTY'.$x])+$pp;
    }
}
 //บันทึกใบสั่งซื้อ
$sql ="INSERT INTO `tbl_buy`(`buy_id`, `buy_recorder`, `buy_price`, `buy_status`,buy_date )
VALUES ('".$buy_id."','".$_SESSION["ID"]."','".number_format($pp, 2, '.', '')."','$b_status',Now()) ";
 $result = mysqli_query($con, $sql);

    if($result){
      echo "<script>";
      echo "alert('เพิ่มข้อมูลเรียบร้อย');";
      echo "window.location ='index.php?page=Buy'; ";
      echo "</script>";
    } else {
        /* echo $sql;*/
   
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='index.php?page=Buy'; ";
      echo "</script>";
    }
?>