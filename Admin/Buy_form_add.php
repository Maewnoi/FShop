<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_type ORDER BY type_id asc";
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
            <input type="text"  name="b_list" class="form-control" />
          </div>
        </div></br>
        <div class="form-group row">
          
          <div class="col-sm-2">ประเภทสินค้า</div>
          <div class="col-sm-3">
            <select name="type_id" class="form-control" required>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div>
      </br>
        <div class="form-group row">
          
          <div class="col-sm-2">ราคา</div>
          <div class="col-sm-3">
            <input type="number"  name="b_price" class="form-control"/>
          </div>
        </div></br>
        <div class="form-group row">
          <div class="col-sm-2">จำนวน</div>
          <div class="col-sm-3">
            <input type="number"  name="b_QTY" class="form-control"/>
          </div>
        </div></br>
        
        <div class="form-group row">
          
          <div class="col-sm-2">สถานะ</div>
          <div class="col-sm-2">
            <input type="radio" id="y" name="b_status" value="ชำระแล้ว"> ชำระแล้ว <br>
            <input type="radio" id="n" name="b_status" value="ยังไม่ชำระ" checked> ยังไม่ชำระ
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