<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

	$p_name = mysqli_real_escape_string($con,$_POST["p_name"]);
	$type_id = mysqli_real_escape_string($con,$_POST["type_id"]);
	$p_detail = mysqli_real_escape_string($con,$_POST["p_detail"]);
	$p_price = mysqli_real_escape_string($con,$_POST["p_price"]);
	$p_qty = mysqli_real_escape_string($con,$_POST["p_qty"]);
	$p_unit = mysqli_real_escape_string($con,$_POST["p_unit"]);

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$upload=$_FILES['p_img']['name'];
	if($upload !='') { 
		$path="./p_img/";
		$type = strrchr($_FILES['p_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="./p_img/".$newname;
		move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy); 
	}

	$sql = "
	INSERT INTO `tbl_product`(`p_id`, `p_name`, `p_color`, `type_id`, `p_detail`,
	 `p_img`, `p_price`, `p_qty`, `p_unit`, `datesave`)
	 VALUES (NULL,'[value-2]','[value-3]','[value-4]','[value-5]',
	 '[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')";

	$result = mysqli_query($con, $sql);

	mysqli_close($con);

	if($result){
	echo '<script>';
    echo "window.location='index.php?page=product&do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='index.php?page=product_form_add&do=f';";
    echo '</script>';
}
?>