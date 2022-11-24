<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$wd_id = $_REQUEST["ID"];

 //-------------------------------------------------------------ลบรายการเบิกออก ต้องบวกของคืน stock
 $a = "SELECT * FROM `tbl_withdraw` WHERE `wd_id` = '$wd_id' ";
    $aa = mysqli_query($con, $a);
    $aaa = mysqli_fetch_array($aa);

    $q = "SELECT * FROM `tbl_stock` WHERE `st_id` = '".$aaa['wd_st_id']."' ";
    $qq = mysqli_query($con, $q);
    $qqq = mysqli_fetch_array($qq);
    
    $newstock = $qqq['st_QTY'] + $aaa['wd_QTY'];

  $a ="UPDATE `tbl_stock` SET  `st_QTY`= '$newstock' WHERE `st_id` = '".$aaa['wd_st_id']."' ";
  $a = mysqli_query($con, $a) ;

//-----------------------------------------------------------------------------------

//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา
 
$sql = "DELETE FROM tbl_withdraw WHERE wd_id='$wd_id' ";
$result = mysqli_query($con, $sql);
 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "window.location = 'index.php?page=withdraw'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>