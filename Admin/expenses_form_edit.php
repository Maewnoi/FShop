<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$e_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_expenses WHERE e_id='$e_id' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php');?>
<br>
<div class="container">
      <form  name="addexpenses" action="expenses_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <input type="hidden"  name="e_id" value="<?php echo $e_id; ?>">

        <div class="form-group row">
        <div class="col-sm-2">รายการ</div>
          <div class="col-sm-6">
            <input type="text"  name="e_list" class="form-control" required placeholder="รายการ" value="<?php echo $e_list; ?>">
          </div>
        </div>
        <br>
        <div class="form-group row">
        <div class="col-sm-2">วัน/เดือน/ปี</div>
          <div class="col-sm-3">
            <input type="datetime-local"  name="e_time" class="form-control" required placeholder="วัน/เดือน/ปี" value="<?php echo $e_time; ?>">
          </div>
        </div>
        <br>
        <div class="form-group row">
        <div class="col-sm-2">จำนวนเงิน</div>
          <div class="col-sm-2">
            <input type="text"  name="e_pay" class="form-control" required placeholder="จำนวนเงิน" value="<?php echo $e_pay; ?>">
          </div>
        </div>
        <br>
        <div class="form-group row">
        <div class="col-sm-2">รายละเอียด</div>
          <div class="col-sm-6">
             <textarea  name="e_note" rows="5" cols="60"><?php echo $e_note; ?>
             </textarea>
          </div>
        </div>
        <br>
          <div class="form-group row">
            <div class="col-sm-6" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> บันทึก </button>      
            </div> 
          </div>
        </form>
      </div>
    </div>
</div>
