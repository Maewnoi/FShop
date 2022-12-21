<?php
include('condb.php');
session_start();
 
$tj_name = $_POST['tj_name'];
 
$sql ="INSERT INTO `typejob`(`tj_id`, `tj_name`, `ti_addBy`, `tj_created_at`)
        VALUES (NULL,'$tj_name','".$_SESSION['ID']."',Now() )";
    
    $result = mysqli_query($con, $sql);


 // echo $sql;
    mysqli_close($con);
  
    if($result){
      echo "<script>";
      echo "alert('สำเร็จ');";
      echo "window.location ='index.php?page=typeJob'; ";
      echo "</script>";
    } else {
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='index.php?page=typeJob'; ";
      echo "</script>";
    }
?>