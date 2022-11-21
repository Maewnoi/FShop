<?php
include('condb.php');
 
$p_id = $_POST['p_id'];
$wd_quantity = $_POST['wd_quantity'];
$wd_time = $_POST['wd_time'];
$wd_note = $_POST['wd_note'];
 
$sql ="INSERT INTO `tbl_withdraw`(`wd_id`, `p_id`, `wd_quantity`, `wd _time`, `wd _note`)
VALUES (NULL,'$p_id','$wd_quantity','$wd_time','$wd_note') ";
    
    $result = mysqli_query($con, $sql) ;
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
