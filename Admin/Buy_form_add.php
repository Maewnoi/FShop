<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM `tbl_stock` ORDER BY `tbl_stock`.`st_name` ASC";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<br>
<div class="container">
      <form  name="addBuy" action="buy_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group row">
          <div class="col-sm-2">รายการวัตถุดิบ</div>
          <div class="col-sm-4">
            <select name="b_st_id" class="form-control" required>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["st_id"]."|".$results["st_name"];?>">
                <?php echo $results["st_name"].' : '.$results["st_QTY"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div></br>
        <div class="form-group row">
          <div class="col-sm-2">จำนวน</div>
          <div class="col-sm-3">
            <input type="number"  name="b_QTY" class="form-control"/>
          </div>
        </div></br>
        <div class="form-group row">
          
          <div class="col-sm-2">ราคา</div>
          <div class="col-sm-3">
            <input type="number"  name="b_price" class="form-control"/>
          </div>
        </div></br>
        
        <div class="form-group row">
          
          <div class="col-sm-2">สถานะ</div>
          <div class="col-sm-2">
            <input type="radio" id="y" name="b_status" value="y"> ชำระแล้ว <br>
            <input type="radio" id="n" name="b_status" value="n" checked> ยังไม่ชำระ
          </div>
        </div>
      </br>
        
        <div class="form-group row">
          
          <div class="col-sm-2">สถานะรับวัตถุดิบ</div>
          <div class="col-sm-2">
            <input type="radio" id="y" name="b_received" value="y"> รับแล้ว <br>
            <input type="radio" id="n" name="b_received" value="n" checked> ยังไม่รับ
          </div>
        </div>
      </br>

        <div class="form-group row">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
  </div>