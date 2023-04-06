<?php
  include('../h.php');
  include('../condb.php');
  session_start();
  error_reporting( error_reporting() & ~E_NOTICE );

  if($_GET['action'] == 'update_status_order' ){
    if($_GET['pay_type'] == 'transfer'){ $pay_status = ", `od_pay_status` = '2' "; }

    $query = "UPDATE `tbl_order` SET `od_status` = 'TakeOrder' ,od_admin_id = '".$_SESSION['ID']."' $pay_status WHERE `od_id` = '".$_GET['ID']."' ";
    $result = mysqli_query($con, $query);
   
    if($result){
      echo "<script>";
      echo "alert('รับออเดอร์สำเร็จ');";
      echo "window.location ='index.php?page=order&type=".$_GET['type']."'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert(\" ผิดพลาด \");"; 
      echo "window.history.back()";
      echo "</script>";
    }
}else  if($_GET['action'] == 'update_pay_status' ){
  $query = "UPDATE `tbl_order` SET `od_pay_status` = '1' WHERE `od_id` = '".$_GET['ID']."' ";
  $result = mysqli_query($con, $query);
 
  if($result){
    echo "<script>";
    echo "alert('ยืนยันการชำระเงินสำเร็จ');";
    echo "window.location ='index.php?page=order&type=".$_GET['type']."'; ";
    echo "</script>";
  } else {
    
    echo "<script>";
    echo "alert(\" ผิดพลาด \");"; 
    echo "window.history.back()";
    echo "</script>";
  }
}
else  if($_GET['action'] == 'update_Delivery_status' ){
  if($_GET['ss'] == 'storefront' ){$text = 'Success';}
  else if($_GET['ss'] == 'byself' ){$text = 'Delivery';}
  else if($_GET['ss'] == 'Success' ){$text = 'Success';}

  $query = "UPDATE `tbl_order` SET `od_status` = '$text' WHERE `od_id` = '".$_GET['ID']."' ";
  $result = mysqli_query($con, $query);
 
  if($result){
    echo "<script>";
    echo "alert('สำเร็จ');";
    echo "window.location ='index.php?page=order&type=".$_GET['type']."'; ";
    echo "</script>";
  } else {
    
    echo "<script>";
    echo "alert(\" ผิดพลาด \");"; 
    echo "window.history.back()";
    echo "</script>";
  }
}






?>