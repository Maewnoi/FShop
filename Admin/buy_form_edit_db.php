
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
 
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $b_id = $_POST["b_id"];
  $b_list = $_POST["b_list"];
  $type_id = $_POST["type_id"];
  $b_QTY = $_POST["b_QTY"];
  $b_price = $_POST["b_price"];
  $b_status = $_POST["b_status"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE tbl_buy SET  b_list='$b_list', 
      type_id='$type_id', 
      b_QTY='$b_QTY', 
      b_price='$b_price',
      b_status='$b_status'
      WHERE b_id='$b_id' ";
 
$result = mysqli_query($con, $sql);
// echo  $sql;
mysqli_close($con); //ปิดการเชื่อมต่อ database 
 
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