<?php
//1. เชื่อมต่อ database:
include('condb.php'); 
$q = "SELECT * FROM `tbl_withdraw` WHERE `wd_id` = '".$_GET['ID']."' ";

$qq = mysqli_query($con, $q);
$qqq = mysqli_fetch_array($qq);

$query = "SELECT * FROM `tbl_stock` WHERE st_id = '".$qqq['wd_st_id']."' ";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

?>
<div class="container">
  <br>
      <form  name="add" action="withdraw_form_edit_db.php" method="POST" enctype="multipart/form-data" >
      <input type="hidden"  name="wd_QTY" value='<?php echo  $qqq["wd_QTY"];?>' />
      <input type="hidden"  name="wd_id" value='<?php echo  $qqq["wd_id"];?>' />
      <input type="hidden"  name="st_QTY" value='<?php echo  $row["st_QTY"];?>' />
      <input type="hidden"  name="st_id" value='<?php echo  $row["st_id"];?>' />


      <div class="form-group row">
        <div class="col-sm-2 control-label"> รายการ : </div>
        <div class="col-sm-3"><?php echo  $row["st_name"];?> </div>
      </div>
        <div class="form-group row">
          <div class="col-sm-2 control-label"> จำนวน : </div>
          <div class="col-sm-1">
            <input type="number"  name="wd_quantity" class="form-control" value='<?php echo  $qqq["wd_QTY"];?>' />
          </div>
        </div>
      
       <div class="form-group row">
          <div class="col-sm-2 control-label"> วัน/เดือน/ปี : </div>
          <div class="col-sm-3"><?php echo  $qqq["wd_time"];?> </div>
        </div> 
        <div class="form-group row">
          <div class="col-sm-12">
            <p> รายละเอียดการเบิกวัตถุดิบ </p>
            <textarea  name="wd_note" rows="5" cols="60"><?php echo  $qqq["wd_note"];?></textarea>
          </div>
        </div>
            
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
        </form>
  </div>