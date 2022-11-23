<?php
session_start();
include('condb.php');

$t = explode('|',$_POST['wd_st_id']);
$b_st_id = $t[0];
$wd_st_id = $t[1];

$wd_quantity = $_POST['wd_quantity'];
$wd_time = $_POST['wd_time'];
$wd_note = $_POST['wd_note'];

$sql ="INSERT INTO `tbl_withdraw`(`wd_id`, `wd_list`, `wd_st_id`, `wd_QTY`, `wd_time`, `wd_note`, `wd_recorder`)
VALUES (NULL,'$wd_st_id','$b_st_id','$wd_quantity','$wd_time','$wd_note','".$_SESSION["ID"]."') ";
    
    $result = mysqli_query($con, $sql) ;
//--------------------------------------------------------------------------
    $q = "SELECT * FROM `tbl_stock` WHERE `st_id` = '$b_st_id' ";
    $qq = mysqli_query($con, $q);
    $qqq = mysqli_fetch_array($qq);
  
    $newstock = $qqq['st_QTY'] - $wd_quantity;
    $q = "UPDATE `tbl_stock` SET  `st_QTY` = '$newstock' WHERE `st_id`  = '$b_st_id'";
    $qq = mysqli_query($con, $q);

    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('เพิ่มข้อมูลเรียบร้อย');";
      echo "window.location ='index.php?page=withdraw'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='index.php?page=withdraw'; ";
      echo "</script>";
    }
    
?>
