<?php
include('condb.php');
 
$a_user = $_POST['a_user'];
$a_pass = $_POST['a_pass'];
$a_name = $_POST['a_name'];
$a_address = $_POST['a_address'];

 
$sql ="INSERT INTO tbl_admin
    
    (a_user,  a_pass, a_name,a_address) 
 
    VALUES 
 
    ('$a_user', '$a_pass', '$a_name' ,'$a_address')";
    
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('เพิ่มข้อมูลเรียบร้อย');";
      echo "window.location ='index.php?page=admin'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='index.php?page=admin'; ";
      echo "</script>";
    }
?>