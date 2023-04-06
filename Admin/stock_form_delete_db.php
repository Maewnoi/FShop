<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');

	$st_id = $_POST["ID"];

	$sql = "DELETE FROM `tbl_stock` WHERE `st_id` = '".$_GET["ID"]."' ";

    echo $sql;
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