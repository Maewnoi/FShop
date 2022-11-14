<?php 
$ID = mysqli_real_escape_string($con,$_GET['ID']);
$sql = "SELECT * FROM tbl_product as p 
INNER JOIN tbl_type as t ON p.type_id = t.type_id
WHERE p_id=$ID
ORDER BY p.p_id DESC" ;
$result = mysqli_query($con, $sql) ;
$row = mysqli_fetch_array($result);


$sql2 = "SELECT * FROM tbl_type 
ORDER BY type_id DESC";
$result_t = mysqli_query($con, $sql2);


?>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<br>
<form action="product_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group row">
    <div class="col-sm-2 control-label"> ชื่อสินค้า : </div>
    <div class="col-sm-3">
      <input type="text" name="p_name" required class="form-control" value="<?php echo $row['p_name'];?>">
    </div>
  </div>

   <div class="form-group row">
    <div class="col-sm-2 control-label">
      ประเภทสินค้า :
    </div>
    <div class="col-sm-3">
        <select name="type_id" class="form-control" required>
              <?php foreach($result_t as $results){?>
              <option value="<?php echo $results["type_id"];?>" <?php if($row['type_id'] == $results["type_id"]){ echo "selected";}?>>
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
        </select>
    </div>
  </div>


  <div class="form-group row">
    <div class="col-sm-2 control-label">
      รายละเอียด :
    </div>
    <div class="col-sm-4">
    <textarea name="p_detail"  rows="5" class="form-control"><?php echo $row['p_detail'];?></textarea>
    </div>
  </div>
   <div class="form-group row">
    <div class="col-sm-2 control-label">
      ราคา :
    </div>
    <div class="col-sm-2">
      <input type="number" name="p_price" required class="form-control" value="<?php echo $row['p_price'];?>">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-2 control-label">
      จำนวน :
    </div>
    <div class="col-sm-2">
      <input type="number" name="p_qty" required value="<?php echo $row['p_qty'];?>" class="form-control">
    </div>
 </div>

  <div class="form-group row">
    <div class="col-sm-2 control-label">
      หน่วย :
    </div>
    <div class="col-sm-2">
    <select name="p_unit" id="p_unit" required class="form-control">
              <option value="ดอก" <?php if($row['p_unit'] == 'ดอก' ){ echo "selected";}?>>ดอก</option>
              <option value="ช่อ" <?php if($row['p_unit'] == 'ช่อ' ){ echo "selected";}?>>ช่อ</option>
              <option value="ชุด" <?php if($row['p_unit'] == 'ชุด' ){ echo "selected";}?>>ชุด</option>
              <option value="อัน" <?php if($row['p_unit'] == 'อัน' ){ echo "selected";}?>>อัน</option>
              <option value="กำ" <?php if($row['p_unit'] == 'กำ' ){ echo "selected";}?>>กำ</option>
              <option value="แผ่น" <?php if($row['p_unit'] == 'แผ่น' ){ echo "selected";}?>>แผ่น</option>
              <option value="จุด" <?php if($row['p_unit'] == 'จุด' ){ echo "selected";}?>>จุด</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2 control-label"> รูปภาพสินค้า : </div>
    <div class="col-sm-4">
      ภาพเก่า <br>
      <img src="./p_img/<?php echo $row['p_img'];?>" width="200px">
      <br>
      <input type="file" name="p_img" class="form-control" accept="image/*" onchange="readURL(this);"/>
      <img id="blah" src="#" alt="" width="250" class="img-rounded"style="margin-top: 10px;">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
       <input type="hidden" name="p_img2" id="p_img2" value="<?php echo $row['p_img'];?>">
      <input type="hidden" name="p_id" value="<?php echo $ID; ?>" />
      <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
      <a href="durable.php" class="btn btn-danger">ยกเลิก</a>
    </div>
  </div>
</form>