
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
 
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $b_id = $_POST["b_id"];
  $b_list = $_POST["b_list"];
  $b_QTY = $_POST["b_QTY"];
  $b_price = $_POST["b_price"];
  $b_status = $_POST["b_status"];
  $b_received = $_POST["b_received"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE tbl_buy SET  b_list='$b_list', 
      b_QTY ='$b_QTY', 
      b_price ='$b_price',
      b_status ='$b_status',
      b_received ='$b_received'
      WHERE b_id='$b_id' ";
 
$result = mysqli_query($con, $sql);
// echo  $sql;
mysqli_close($con); //ปิดการเชื่อมต่อ database 

if($b_received == 'y'){//ถ้าเลือกได้รับวัตถุดิบแล้ว
  $q = "SELECT * FROM `tbl_stock` WHERE `st_id` = '$b_st_id' ";
  $qq = mysqli_query($con, $q);
  $qqq = mysqli_fetch_array($qq);

  $newstock = $qqq['st_QTY'] + $b_QTY;

  $q = "UPDATE `tbl_stock` SET  `st_QTY` = '$newstock' WHERE `st_id`  = '$b_st_id'";
  $qq = mysqli_query($con, $q);

//echo $qqq['st_QTY'].' + '.$b_QTY.' + '.$q;
}
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update Succesfuly');";
  echo "window.location = 'index.php?page=Buy'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}

?>