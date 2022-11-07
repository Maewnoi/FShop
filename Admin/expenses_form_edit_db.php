
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
 
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $e_id = $_REQUEST["e_id"];
  $e_list = $_REQUEST["e_list"];
  $e_time = $_REQUEST["e_time"];
  $e_pay = $_REQUEST["e_pay"];
  $e_note = $_REQUEST["e_note"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE tbl_expenses SET  
      e_list='$e_list', 
      e_time='$e_time', 
      e_pay='$e_pay',
      e_note='$e_note',
     
      
      WHERE e_id='$e_id' ";
 
$result = mysqli_query($con, $sql) or //die ("Error in query: $sql " . mysqli_error());
 
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