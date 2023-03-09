<?php 
include("./condb.php");
session_start();
  if(isset($_POST['bgadd'])){

$bk_sum = $_POST['p_price']*$_POST['p_QTY'];

    $sql="INSERT INTO `tbl_basket`(`bk_id`, `bk_product`, `bk_QTY`, `bk_price`,`bk_sum`, `bk_status`,
    `bk_buyer`, `bk_created_at`)
    VALUES (NULL,'".$_POST['p_id']."','".$_POST['p_QTY']."','".$_POST['p_price']."','$bk_sum','wait',
    '".$_SESSION["ID"]."',Now() ) ";

    $result = mysqli_query($con,$sql);


    if($result){
        Header("Location: index.php?page=productdetail&type_id=&id=".$_POST['p_id']);
    }else{
        echo "<script>";
            echo "alert(\" ผิดพลาด \");"; 
            echo "window.history.back()";
        echo "</script>";

        }
    }else if(isset($_POST['bgdelete'])){
        $sql="DELETE FROM `tbl_basket` WHERE `bk_product` = '".$_POST['p_id']."' 
        AND `bk_buyer` = '".$_SESSION["ID"]."' AND `bk_status` = 'wait' ";
      $result = mysqli_query($con,$sql);
      
      
          if($result){
              Header("Location: index.php?page=storefront");

          }else{
              echo "<script>";
                  echo "alert(\" ผิดพลาด \");"; 
                  echo "window.history.back()";
              echo "</script>";
      
              }
 
    }else if(isset($_POST['bgedit'])){
            $bk_QTY = $_POST['bk_QTY'];
            $bk_sum = $_POST['p_price'] * $bk_QTY;


        $sql="UPDATE `tbl_basket` SET `bk_QTY` = '$bk_QTY' , `bk_sum` = '$bk_sum'  WHERE `bk_id` = '".$_POST['bk_id']."' ";
    
        $result = mysqli_query($con,$sql);
      
     
          if($result){
              Header("Location: index.php?page=storefront");
          }else{
              echo "<script>";
                  echo "alert(\" ผิดพลาด \");"; 
                  echo "window.history.back()";
              echo "</script>";
      
              }

    }else if(isset($_POST['bgdelete_bg'])){
    $sql="DELETE FROM `tbl_basket` WHERE `bk_id` = '".$_POST['bk_id']."' ";

    $result = mysqli_query($con,$sql);
  
 
      if($result){
          Header("Location: index.php?page=storefront");
      }else{
          echo "<script>";
              echo "alert(\" ผิดพลาด \");"; 
              echo "window.history.back()";
          echo "</script>";
  
          }

    }
?>