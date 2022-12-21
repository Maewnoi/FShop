<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $a_id = $_REQUEST["a_id"];
  $a_user = $_REQUEST["a_user"];
  $a_pass = $_REQUEST["a_pass"];
  $a_name = $_REQUEST["a_name"];
  $a_address = $_REQUEST["a_address"];


//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE tbl_admin SET  
      a_user='$a_user' , 
      a_pass='$a_pass' , 
      a_name='$a_name' ,
      a_address='$a_address'
      WHERE a_id='$a_id' ";

$result = mysqli_query($con, $sql);
mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'index.php?page=admin'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>