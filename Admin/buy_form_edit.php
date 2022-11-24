<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_buy WHERE b_id = '".$_GET['ID']."' " ;
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

?>
<br>
<div class="container">
      <form  name="addBuy" action="buy_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
            <input type="hidden"  name="b_id" value="<?php echo $row['b_id']; ?>"  />
            <input type="hidden"  name="b_st_id" value="<?php echo $row['b_st_id']; ?>"  />
            <input type="hidden"  name="b_received_old" value="<?php echo $row['b_received']; ?>"  />
        <div class="form-group row">
          <div class="col-sm-2">รายการวัตถุดิบ</div>
          <div class="col-sm-3">
            <input type="text"  name="b_list" value="<?php echo $row['b_list']; ?>" class="form-control" />
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
            <input type="radio" id="b_status" name="b_status" value="y" <?php if($row['b_status'] == 'y'){ echo "checked";}?>> ชำระแล้ว <br>
            <input type="radio" id="b_status" name="b_status" value="n" <?php if($row['b_status'] == 'n'){ echo "checked";}?>> ยังไม่ชำระ

          </div>
      </div>
      <br>
      
        
      <div class="form-group row">
          
          <div class="col-sm-2">สถานะรับวัตถุดิบ</div>
          <div class="col-sm-2">
            <input type="radio" id="y" name="b_received" value="y" <?php if($row['b_received'] == 'y'){ echo "checked";}?>> รับแล้ว <br>
            <input type="radio" id="n" name="b_received" value="n" <?php if($row['b_received'] == 'n'){ echo "checked";}?>> ยังไม่รับ
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