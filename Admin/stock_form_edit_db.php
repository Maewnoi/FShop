<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');

	$st_name = mysqli_real_escape_string($con,$_POST["st_name"]);
	$st_id = mysqli_real_escape_string($con,$_POST["st_id"]);

	$sql = "UPDATE `tbl_stock` SET `st_name` = '$st_name'  WHERE `st_id` = '$st_id' ";
    $result = mysqli_query($con, $sql);
	mysqli_close($con);

	if($result){
	echo '<script>';
    echo "window.location='index.php?page=stock&do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='index.php?page=stock&do=f';";
    echo '</script>';
}
?>