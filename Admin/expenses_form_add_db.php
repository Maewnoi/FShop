<?php
include('condb.php');
 
$e_list = $_POST['e_list'];
$e_time = $_POST['e_time'];
$e_pay = $_POST['e_pay'];
$e_note = $_POST['e_note'];
 
$sql ="INSERT INTO tbl_expenses
    
    (e_list,  e_time, e_pay, e_note) 
 
    VALUES 
 
    ('$e_list', '$e_time', '$e_pay', '$e_note')";
    
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('เพิ่มข้อมูลเรียบร้อย');";
      echo "window.location ='expenses.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='expenses.php'; ";
      echo "</script>";
    }
?>

