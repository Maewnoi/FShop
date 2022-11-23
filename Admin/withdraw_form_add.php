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