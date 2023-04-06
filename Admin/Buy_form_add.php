
<br>
<div class="container">
<form  name="addBuy" action="buy_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
<?php

$query_product = "SELECT * FROM `tbl_stock`";
$result_pro =mysqli_query($con, $query_product) ;
              $i = 1;
?>
<table border='1'>
<tr>
    <td>ที่</td>
    <td>รายการวัตถุดิบ</td>
    <td>จำนวนที่มีใน stock</td>
    <td>จำนวนที่ต้องการซื้อเพิ่ม</td>
    <td>ราคา/หน่วย</td>

</tr>
<?php foreach ($result_pro as $row_pro) {?>
  <input type="hidden" name="st_name<?php echo $i;?>" value='<?php echo $row_pro['st_name'];?>' />
  <input type="hidden" name="st_id<?php echo $i;?>" value='<?php echo $row_pro['st_id'];?>' />
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row_pro['st_name'];?></td>
<td><center><?php echo $row_pro['st_QTY'];?></center></td>
<td><input type="number"  name="b_QTY<?php echo $i;?>" class="form-control"/></td>
<td><input type="number"  name="b_price<?php echo $i;?>" class="form-control"/></td>

</tr>
<input type="hidden" name="numi" value='<?php echo $i;?>'/>
<?php $i++;}?>
</table>
<br>
        <div class="form-group row">
          
          <div class="col-sm-2">สถานะ</div>
          <div class="col-sm-2">
            <input type="radio" id="Y" name="b_status" value="Y"> ชำระแล้ว <br>
            <input type="radio" id="N" name="b_status" value="N" checked> ยังไม่ชำระ
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
  </div>

  