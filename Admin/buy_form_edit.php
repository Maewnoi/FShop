<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_buy WHERE b_id = '".$_GET['ID']."' " ;
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$sql2 = "SELECT * FROM tbl_type 
ORDER BY type_id DESC";
$result_t = mysqli_query($con, $sql2);
?>
<br>
<div class="container">
      <form  name="addBuy" action="buy_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
            <input type="hidden"  name="b_id" value="<?php echo $row['b_id']; ?>"  />
        <div class="form-group row">
          <div class="col-sm-2">รายการวัตถุดิบ</div>
          <div class="col-sm-3">
            <input type="text"  name="b_list" value="<?php echo $row['b_list']; ?>" class="form-control" />
          </div>
        </div></br>
        <div class="form-group row">
          <div class="col-sm-2">ประเภทสินค้า</div>
          <div class="col-sm-3">
            <select name="type_id" class="form-control" required>
              <?php foreach($result_t as $results){?>
                <option value="<?php echo $results["type_id"];?>" <?php if($row['type_id'] == $results["type_id"]){ echo "selected";}?>>
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div></br>
        <div class="form-group row">
          <div class="col-sm-2">ราคา</div>
          <div class="col-sm-3">
            <input type="text"  name="b_price" class="form-control" value="<?php echo $row['b_price']; ?>"/>
          </div>
        </div></br>
        <div class="form-group row">
          <div class="col-sm-2">จำนวน</div>
          <div class="col-sm-3">
            <input type="text"  name="b_QTY" class="form-control" value="<?php echo $row['b_QTY']; ?>"/>
          </div>
        </div></br>
        
        <div class="form-group row">
          <div class="col-sm-2">สถานะ</div>
          
          <div class="col-sm-3">
            <input type="radio" id="b_status" name="b_status" value="Y" <?php if($row['b_status'] == 'Y'){ echo "checked";}?>> ชำระแล้ว <br>
            <input type="radio" id="b_status" name="b_status" value="N" <?php if($row['b_status'] == 'N'){ echo "checked";}?>> ยังไม่ชำระ

          </div>
</div>
</br>

        <div class="form-group row">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-success" name="btnedit"> บันทึก </button>
            
          </div>
        </div>
      </form>
  </div>