
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
 
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $buy_id = $_POST["buy_id"];


//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  //แก้ไขรายการที่สั่งซื้อ

  for ($x = 1; $x <= $_POST['numi']; $x++) {
  if($_POST['b_QTY'.$x] != null && $_POST['b_QTY'.$x] != '0' ){ 
    //  echo $_POST['st_name'.$x].'//'.$_POST['b_QTY'.$x].'<br>';
      $sql1 = "UPDATE `tbl_buylist` SET `b_id`='".$_POST['b_id'.$x]."',
                                        `b_QTY`='".$_POST['b_QTY'.$x]."',
                                        `b_price`='".$_POST['b_price'.$x]."'
      WHERE `b_id` = '".$_POST['b_id'.$x]."' ";
       $result1 = mysqli_query($con, $sql1);

       $pp = ($_POST['b_price'.$x]*$_POST['b_QTY'.$x])+$pp;
    }else{
      $sql1 = "DELETE FROM `tbl_buylist` WHERE `b_id` = '".$_POST['b_id'.$x]."' ";
       $result1 = mysqli_query($con, $sql1);
    }
}

//cdhw-ใบสั่งซื้อ
$sql ="UPDATE `tbl_buy` SET `buy_price`='".number_format($pp, 2, '.', '')."',`buy_status`='".$_POST['b_status']."'
 WHERE `buy_id` = '$buy_id' ";

$result = mysqli_query($con, $sql);
// echo  $sql;
/*
$q = "SELECT * FROM `tbl_stock` WHERE `st_id` = '$b_st_id' ";
  $qq = mysqli_query($con, $q);
  $qqq = mysqli_fetch_array($qq);

if($_POST['b_received_old'] != $b_received){

  if($_POST['b_received_old'] == 'y' && $b_received == 'n'){
    //เดิมได้รับของแล้วเปลี่ยนเป็นยังไม่ได้รับ ให้ -
    $newstock = $qqq['st_QTY'] - $b_QTY;
  }else if($_POST['b_received_old'] == 'n' && $b_received == 'y'){ //+
    $newstock = $qqq['st_QTY'] + $b_QTY;
  }

  $q = "UPDATE `tbl_stock` SET  `st_QTY` = '$newstock' WHERE `st_id`  = '$b_st_id'";
  $qq = mysqli_query($con, $q);

}
//echo $_POST['b_received_old'].'<br>'.$b_received.'<br>'.$q;
*/
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