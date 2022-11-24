<?php
session_start();
include('condb.php');
$st_QTY = $_POST['st_QTY'];
$st_id = $_POST['st_id'];

$wd_id = $_POST['wd_id'];


//จำนวนเดิม
$wd_QTY = $_POST['wd_QTY'];

//จำนวนใหม่
$wd_quantity = $_POST['wd_quantity'];
$wd_note = $_POST['wd_note'];

if($wd_QTY > $wd_quantity){
    //ถ้าจำนวนเดิมมากกว่าจำนวนใหม่ ให้ + ส่วนต่างคืน stock
    $sk_QTY = ($wd_QTY-$wd_quantity)+$st_QTY;

    $a ="UPDATE `tbl_stock` SET  `st_QTY`= '$sk_QTY' WHERE `st_id` = '$st_id' ";
    $a = mysqli_query($con, $a) ;

}else if($wd_QTY < $wd_quantity){
    //ถ้าจำนวนเดิมน้อยกว่าจำนวนใหม่ ให้ - ส่วนต่างออกจาก stock
    $sk_QTY = $st_QTY-($wd_quantity-$wd_QTY);

    $a ="UPDATE `tbl_stock` SET  `st_QTY`= '$sk_QTY' WHERE `st_id` = '$st_id' ";
    $a = mysqli_query($con, $a) ;

}



$sql ="UPDATE `tbl_withdraw` SET  `wd_QTY`= '$wd_quantity' , `wd_note` = '$wd_note' WHERE `wd_id` = '$wd_id' ";
$result = mysqli_query($con, $sql) ;
//--------------------------------------------------------------------------

    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('แก้ไขข้อมูลเรียบร้อย');";
      echo "window.location ='index.php?page=withdraw'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='index.php?page=withdraw'; ";
      echo "</script>";
    }
    
?>
