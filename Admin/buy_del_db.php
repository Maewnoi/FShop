<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$b_id = $_REQUEST["ID"];

$a = "SELECT * FROM `tbl_buy` WHERE `b_id` = '$b_id' ";
    $aa = mysqli_query($con, $a);
    $aaa = mysqli_fetch_array($aa);

  if($aaa['b_received'] == 'y'){

    $q = "SELECT * FROM `tbl_stock` WHERE `st_id` = '".$aaa['b_st_id']."' ";
    $qq = mysqli_query($con, $q);
    $qqq = mysqli_fetch_array($qq);
    
    $newstock = $qqq['st_QTY'] - $aaa['b_QTY'];
    
    //เดิมได้รับของแล้ว เมื่อลบรายการสั่งซื้อ ให้ลบออกจาก stock ด้วย
      
    $q = "UPDATE `tbl_stock` SET  `st_QTY` = '$newstock' WHERE `st_id`  = '".$aaa['b_st_id']."' ";
    $qq = mysqli_query($con, $q);

    }
    
//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา
$sql = "DELETE FROM tbl_buy WHERE b_id='$b_id' ";
$result = mysqli_query($con, $sql);
 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){

    
    

  echo "<script type='text/javascript'>";
  echo "alert('Delete Succesfuly');";
  echo "window.location = 'index.php?page=Buy'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>