<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM `tbl_buy`,tbl_admin WHERE tbl_buy.buy_recorder = tbl_admin.a_id
AND buy_id = '".$_GET['ID']."' " ;
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

?>
<br>
<div class="container">
  วันที่ : <?php echo $row['buy_date'];?><br>
  บันทึกโดย : <?php echo $row['a_name'];?>
  <hr>
      <form  name="addBuy" action="buy_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
            <input type="hidden"  name="buy_id" value="<?php echo $row['buy_id']; ?>"  />
                 
<?php

$query_product = "SELECT * FROM `tbl_buylist`,tbl_stock WHERE tbl_buylist.b_st_id = tbl_stock.st_id AND
`b_buy_id` = '".$_GET['ID']."' ";
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
    <td>สถานะรับวัตถุดิบ</td>

</tr>
<?php foreach ($result_pro as $row_pro) {?>
  <input type="hidden" name="b_id<?php echo $i;?>" value='<?php echo $row_pro['b_id'];?>' />
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row_pro['st_name'];?></td>
<td><center><?php echo $row_pro['st_QTY'];?></center></td>
<td><input type="number"  name="b_QTY<?php echo $i;?>" value='<?php echo $row_pro['b_QTY'];?>' class="form-control"/></td>
<td><input type="number"  name="b_price<?php echo $i;?>" value='<?php echo $row_pro['b_price'];?>'  class="form-control"/></td>
<td><?php if($row_pro['b_received'] == 'Y'){ echo "<a href='index.php?page=Buy_form_edit&ID=' class='btn btn-success btn-xs'>รับวัตถุดิบแล้ว</a>";}
          else if($row_pro['b_received'] == 'N'){ echo "<a href='index.php?page=Buy_form_edit&ID=' class='btn btn-warning btn-xs'>ยังไม่รับวัตถุดิบ</a>";}?></td>
</tr>
<input type="hidden" name="numi" value='<?php echo $i;?>'/>
<?php $i++;}?>
</table>
<br>
       
        <div class="form-group row">
          <div class="col-sm-2">สถานะ</div>
          
          <div class="col-sm-3">
            <input type="radio" id="b_status" name="b_status" value="ํY" <?php if($row['buy_status'] == 'Y'){ echo "checked";}?>> ชำระแล้ว <br>
            <input type="radio" id="b_status" name="b_status" value="N" <?php if($row['buy_status'] == 'N'){ echo "checked";}?>> ยังไม่ชำระ

          </div>
      </div>
      <br>

        <div class="form-group row">
          <div class="col-sm-2">
            <button type="submit" class="btn btn-success" name="btnedit"> บันทึกการแก้ไข </button>
            
          </div>
        </div>
      </form>
  </div>