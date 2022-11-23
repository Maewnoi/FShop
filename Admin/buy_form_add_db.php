<?php

session_start();
include('condb.php');
 $t = explode('|',$_POST['b_st_id']);
 $b_st_id = $t[0];
 $b_list = $t[1];

$b_QTY = $_POST['b_QTY'];
$b_price = $_POST['b_price'];
$b_status = $_POST['b_status'];
$b_received = $_POST['b_received'];
 
$sql ="INSERT INTO `tbl_buy`(`b_id`, `b_list`, `b_st_id`, `b_QTY`, `b_price`,
 `b_time`, `b_status`, `b_received`, `b_recorder`)
 VALUES (NULL,'$b_list','$b_st_id','$b_QTY','$b_price',
 Now(),'$b_status','$b_received','".$_SESSION["ID"]."') ";
    
    $result = mysqli_query($con, $sql);
//echo $b_recorder;
if($b_received == 'y'){//ถ้าเลือกได้รับวัตถุดิบแล้ว
  $q = "SELECT * FROM `tbl_stock` WHERE `st_id` = '$b_st_id' ";
  $qq = mysqli_query($con, $q);
  $qqq = mysqli_fetch_array($qq);

  $newstock = $qqq['st_QTY'] + $b_QTY;

  $q = "UPDATE `tbl_stock` SET  `st_QTY` = '$newstock' WHERE `st_id`  = '$b_st_id'";
  $qq = mysqli_query($con, $q);

//echo $qqq['st_QTY'].' + '.$b_QTY.' + '.$q;
}

    mysqli_close($con);  
    if($result){
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