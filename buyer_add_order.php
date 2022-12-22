<?php
session_start();
include('condb.php');
$m_name= $_POST["m_name"];
$m_tel= $_POST["m_tel"];
$m_email= $_POST["m_email"];
$m_address= $_POST["m_address"];
$b_delivery= $_POST["b_delivery"];
$pay_type= 'transfer';//$_POST["pay_type"]od_employee

$od_employee= $_POST["od_employee"];

$od_data_buyer = $m_name."|".$m_tel."|".$m_email."|".$m_address;

$date1 = date("Ymd_His");
$numrand = (mt_rand());

$od_tracking = $_SESSION['ID'].'_'.$numrand.''.$date1;

$pay_file = (isset($_POST['pay_file']) ? $_POST['pay_file'] : '');

$upload=$_FILES['pay_file']['name'];
if($upload !='') { 
    $path="./slip/";
    $type = strrchr($_FILES['pay_file']['name'],".");
    $newname =$numrand.$date1.$type;
    $path_copy=$path.$newname;
    $path_link="./slip/".$newname;
    move_uploaded_file($_FILES['pay_file']['tmp_name'],$path_copy); 
}
//*********************************************************** */

$q = "INSERT INTO `tbl_order`(`od_id`, `od_tracking`, `od_delivery`, `od_buyer`,`od_data_buyer`, `od_status`,
 `od_pay_status`, `od_pay_type`, `od_pay_file`, `od_employee`, `od_created_at`)
 VALUES (NULL,'$od_tracking','$b_delivery','".$_SESSION['ID']."','$od_data_buyer','New',
 '0','$pay_type','$path_link','$od_employee',Now() )";

 $qq = mysqli_query($con, $q);



 if($qq){
    $q = "UPDATE `tbl_basket` SET  `bk_status` = 'order', `bk_order` = '$od_tracking'
    WHERE `bk_buyer` = '".$_SESSION['ID']."' AND  `bk_status` = 'wait' ";
    $qq = mysqli_query($con, $q);

    echo "<script>";
    echo "alert('สำเร็จ');";
    echo "window.location ='index.php?act=purchase'; ";
    echo "</script>";
  } else {
    
    echo "<script>";
    echo "alert(\" ผิดพลาด \");"; 
    echo "window.history.back()";
    echo "</script>";
  }


?>