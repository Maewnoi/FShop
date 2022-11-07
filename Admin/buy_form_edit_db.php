
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
 
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $b_id = $_REQUEST["b_id"];
  $type_id = $_REQUEST["type_id"];
  $b_QTY = $_REQUEST["b_QTY"];
  $b_price = $_REQUEST["b_price"];
  $b_status = $_REQUEST["b_status"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE tbl_buy SET  
      type_id='$type_id', 
      e_timeb_QTY='$b_QTY', 
      b_price='$b_price',
      b_status='$b_status',
     
      
      WHERE b_id='$b_id' ";
 
$result = mysqli_query($con, $sql);
 
mysqli_close($con); //ปิดการเชื่อมต่อ database 
 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update Succesfuly');";
  echo "window.location = 'expenses.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>