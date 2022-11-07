<?php
include('condb.php');
 
$type_name = $_POST['type_name'];
 
$sql ="INSERT INTO tbl_type
    
    (type_name) 
 
    VALUES 
 
    ('$type_name')";
    
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('สำเร็จ');";
      echo "window.location ='index.php?page=type'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='type.php'; ";
      echo "</script>";
    }
?>