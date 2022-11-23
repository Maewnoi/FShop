<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');

	$st_name = mysqli_real_escape_string($con,$_POST["st_name"]);
	$st_QTY = mysqli_real_escape_string($con,$_POST["st_QTY"]);

	$sql = "INSERT INTO tbl_stock( st_id, st_name, st_QTY, st_update_at )
	VALUES ( NULL, '$st_name', '$st_QTY',Now()) ";
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