<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

$query = "SELECT * FROM tbl_stock WHERE st_id  = '".$_GET['ID']."' ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
?>
<div class="container">
  <br>
      <form  name="add" action="stock_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <div class="form-group row">
        <div class="col-sm-2 control-label"> ชื่อวัตถุดิบ : </div>
        <div class="col-sm-3">
            <input type="text"  name="st_name" value="<?php echo $row['st_name'];?>" class="form-control"  />
        </div>
      </div>
      <input type="hidden"  name="st_id" value="<?php echo $row['st_id'];?>" class="form-control"  />
        
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
  </div>