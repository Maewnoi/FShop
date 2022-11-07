<?php
include('condb.php');
 
$b_list = $_POST['b_list'];
$type_id = $_POST['type_id'];
$b_price = $_POST['b_price'];
$b_QTY = $_POST['b_QTY'];
$b_status = $_POST['b_status'];
 
$sql ="INSERT INTO tbl_buy
    
    (b_list, type_id, b_price, b_QTY,b_status ) 
 
    VALUES 
 
    ('$b_list', '$type_id', '$b_price','$b_QTY'.'$b_status')";
    
    $result = ("Error in query: $sql ");
    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('เพิ่มข้อมูลเรียบร้อย');";
      echo "window.location ='Buy.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='Buy.php'; ";
      echo "</script>";
    }
?>