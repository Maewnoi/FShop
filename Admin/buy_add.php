<?php 
include("./condb.php");
session_start();
//------------------------------------------------------------------------------------------------------------Add
  if(isset($_POST['bgadd'])){

$st_id = $_POST['st_id'];
$st_name = $_POST['st_name'];

$p_QTY = $_POST['p_QTY'];
$q = "SELECT MAX(`buy_id`)as buyid FROM `tbl_buy` WHERE 1";
$qq = mysqli_query($con, $q);
$qqq = mysqli_fetch_array($qq);
$buy_id = $qqq['buyid']+1;

    $sql="INSERT INTO `tbl_buylist`(`b_id`, `b_list`, `b_st_id`, `b_QTY`, `b_price`,
     `b_time`, `b_buy_id`, `b_received`, `b_basket`)
     VALUES (NULL,'$st_name','$st_id','$p_QTY','0',
     'Now()','$buy_id','N','1') ";

    $result = mysqli_query($con,$sql);


    if($result){
        Header("Location: index.php?page=Buy_form_add");
    }else{
        echo "<script>";
            echo "alert(\" ผิดพลาด \");"; 
            echo "window.history.back()";
        echo "</script>";

        }
    }
    

//------------------------------------------------------------------------------------------------------------Delete
    else if(isset($_POST['bgdelete'])){
        $sql="DELETE FROM `tbl_buylist` WHERE `b_st_id` = '".$_POST['st_id']."' 
        AND `b_basket` = '1' ";
      $result = mysqli_query($con,$sql);
      
      
          if($result){
              Header("Location: index.php?page=Buy_form_add");

          }else{
              echo "<script>";
                  echo "alert(\" ผิดพลาด \");"; 
                  echo "window.history.back()";
              echo "</script>";
      
              }
 
    }
  
//------------------------------------------------------------------------------------------------------------Edit 
    else if(isset($_POST['bgedit'])){
            $bk_QTY = $_POST['b_QTY'];
            $bk_sum = $_POST['b_price'] * $bk_QTY;


        $sql="UPDATE `tbl_buylist` SET  `b_QTY` = '$bk_QTY',`b_price`='".$_POST['b_price'].".00'
        WHERE `b_basket` = '1' AND `b_id` = '".$_POST['b_id']."' ";
    
        $result = mysqli_query($con,$sql);
      
     
          if($result){
              Header("Location: index.php?page=Buy_form_add");
          }else{
              echo "<script>";
                  echo "alert(\" ผิดพลาด \");"; 
                  echo "window.history.back()";
              echo "</script>";
      
              }

    }
?>