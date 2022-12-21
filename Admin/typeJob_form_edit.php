<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$type_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM typeJob WHERE tj_id='$type_id' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php');?>
<div class="container">
  <p> </p>
    <div class="row">
      <div class="col-md-12">
        <form  name="admin" action="typeJob_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
          <input type="hidden" name="tj_id" value="<?php echo $type_id; ?>" />
          <div class="form-group">
            <div class="col-sm-6" align="left">
              <input  name="tj_name" type="text" required class="form-control" id="tj_name" value="<?=$tj_name;?>" placeholder="ประเภทงานที่รับ"  minlength="2"  />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> บันทึก </button>      
            </div> 
          </div>
        </form>
      </div>
    </div>
</div>