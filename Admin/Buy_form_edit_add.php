<?php session_start();
include('condb.php');


 //แก้ไขใบสั่งซื้อ
$sql ="UPDATE `tbl_buylist` SET `b_received` = 'Y' WHERE `b_id`= '".$_GET['bID']."'  ";
 $result = mysqli_query($con, $sql);
 
    if($result){
        //เพิ่มจำนวนในสตอก
        $q = "SELECT `st_QTY` FROM `tbl_stock` WHERE `st_id` = '".$_GET['b_stid']."' ";
        $qq = mysqli_query($con, $q);
        $qqq = mysqli_fetch_array($qq);
        $newnum = $qqq['st_QTY']+$_GET['qty'];

        $sql ="UPDATE `tbl_stock` SET  `st_QTY`='$newnum'  WHERE `st_id` = '".$_GET['b_stid']."'  ";
        $result = mysqli_query($con, $sql);


      echo "<script>";
      echo "alert('รับวัตถุดิบแล้ว');";
      echo "window.location ='index.php?page=Buy_form_edit&ID=".$_GET['ID']."'; ";
      echo "</script>";
    } else {
      
        /* echo $sql;*/
   
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='index.php?page=Buy_form_edit&ID=".$_GET['ID']."'; ";
      echo "</script>";
    }
?>
