<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_withdraw:
$query = "SELECT * FROM `tbl_stock` ORDER BY `tbl_stock`.`st_name` ASC";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);

?>
<div class="container">
  <br>
      <form  name="add" action="withdraw_from_add_db.php" method="POST" enctype="multipart/form-data" >
          
      <div class="form-group row">
        <div class="col-sm-2 control-label"> รายการ : </div>
        <div class="col-sm-3">
            <select name="wd_st_id" class="form-control" required>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["st_id"]."|".$results["st_name"];?>">
                <?php echo $results["st_name"].' : '.$results["st_QTY"]; ?>
              </option>
              <?php } ?>
            </select>
        </div>
      </div>
        <div class="form-group row">
          <div class="col-sm-2 control-label"> จำนวน : </div>
          <div class="col-sm-1">
            <p>จำนวน</p>
            <input type="number"  name="wd_quantity" class="form-control"  />
          </div>
        </div>
      
       <div class="form-group row">
          <div class="col-sm-2 control-label"> วัน/เดือน/ปี : </div>
          <div class="col-sm-3">
            <input type="datetime-local"  name="wd_time" class="form-control"  />
          </div>
        </div> 
        <div class="form-group row">
          <div class="col-sm-12">
            <p> รายละเอียดการเบิกวัตถุดิบ </p>
            <textarea  name="wd_note" rows="5" cols="60"></textarea>
          </div>
        </div>
            
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
        </form>
  </div>
  <?php

$query_product = "SELECT * FROM `tbl_stock`";

$i = 1;
$result_pro =mysqli_query($con, $query_product) ;
  //echo($query_product);
  //exit() 
?>
<br>
<div class="row">
<?php foreach ($result_pro as $row_pro) {?>
  <div class=" col-md-3" style=" margin-bottom: 10px;"style=" margin-top:10px;margin-right: 5px;">
    <div class="card text-info bg-light " style="width: 250px;height: 450px;" >
      <div class="card-header">
        <img class="card-img-top" src=".\p_img\/<?php echo$row_pro['st_pic']; ?>" height="250px" width="auto" alt="Card image cap">
      </div>
      <div class="card-body">
        <h6 class="card-title"><?php echo $row_pro['st_name'] ?></h6>

        <p > จำนวนที่มีใน stock : <?php echo $row_pro['st_QTY'];?> </p>
       <center><a href="//" class="btn btn-primary">รายละเอียด</a></center>
      </div>
      </div>
  </div>
  <?php }?>
</div>