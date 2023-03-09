<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
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

  <br>
<h3>สั่งซื้อวัตถุดิบ</h3>
<hr>
<?php 
 if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=storefront.php" />';

  }else if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=storefront.php" />';
  }

$query = "SELECT * FROM `tbl_buylist`,tbl_stock WHERE tbl_buylist.b_st_id = tbl_stock.st_id
AND `b_basket` = '1' ";
$i = 1;
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class=''>
      <th width='3%'  class='hidden-xs'>No.</th>
      <th width='20%' class='hidden-xs'>รายการวัตถุดิบ</th>
       <th width='20%'>จำนวนที่ต้องการซื้อเพิ่ม</th>
       <th width='10%' >ราคา/หน่วย</th>
       <th width='10%' >รวม</th>
      <th width='5%'>แก้ไข</th>
      <th width=5%'>ลบ</th>
    </tr>";
  echo "</thead>";
  $sum;
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td >" .$i.  "</td> ";
    echo "<td> ชื่อ: " .$row["st_name"] . "</td>";
    echo "<td >" .$row["b_QTY"] ."</td> ";
    echo "<td >" .$row["b_price"] ."</td> "; 
    echo "<td >" .$row["b_price"]*$row["b_QTY"]."</td> "; 
  
    //แก้ไขข้อมูล
    echo "<td>
        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal_".$row["b_id"]."'>
            แก้ไข
        </button> </td>";  
?>
 <!-- The Modal -->
 <div class="modal fade" id="myModal_<?php echo $row["b_id"];?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">แก้ไขจำนวนที่ต้องการซื้อ <?php echo $row["st_name"];?></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <form  name="addBuy" action="buy_add.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
            <input type="hidden"  name="b_id" value="<?php echo $row["b_id"];?>" />
        <!-- Modal body -->
        <div class="modal-body">
          จำนวน
        <input type="number" name="b_QTY" required value="<?php echo $row["b_QTY"];?>" class="form-control">
        ราคา
        <input type="number" name="b_price" required value="" class="form-control">
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="bgedit">บันทึก</button>
        </div>
  </form>
        
      </div>
    </div>
  </div>
<?php
    //ลบข้อมูล
    echo "<td>
    <form  name='addBuy' action='buy_add.php' method='POST' enctype='multipart/form-data'>
        <input type='hidden'  name='st_id' value='".$row["st_id"]."' />
        <button type='submit' class='btn btn-danger' name='bgdelete' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่? !!!')\" >ลบ</button>
    </form></td> ";

    echo "</tr>";
   $sum = $row["b_price"]*$row["b_QTY"];
    $array[]=$sum;
    $i++; }
if($i > 1){
  $sumall = array_sum($array);
}
   


?>     <form  name="addBuy" action="buy_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
  
    <tr>
        <td colspan='4'><center>รวมทั้งหมด</center></td>
        <td><center><?php echo  $sumall;?></center>
      
        <input type='hidden'  name='buy_price' value='<?php echo $sumall; ?>' />
      
      </td>
        <td colspan='2'>
            <input type="radio" id="Y" name="b_status" value="y"> ชำระแล้ว <br>
            <input type="radio" id="N" name="b_status" value="n" checked> ยังไม่ชำระ<hr>
            <button type="submit" class="btn btn-success" name="bgedit">บันทึก</button> </td>
    </tr>

 </form>

<?php

    echo "</table>";
echo "</table>";

?>
  <?php

$query_product = "SELECT * FROM `tbl_stock`";

$i = 1;
$result_pro =mysqli_query($con, $query_product) ;
  //echo($query_product);
  //exit() 
?>
<br>
<div class="row">
<?php foreach ($result_pro as $row_pro) {?>
  <div class=" col-md-3" style=" margin-bottom: 10px;"style=" margin-top:10px;margin-right: 5px;">
    <div class="card text-info bg-light " style="width: 250px;height: 450px;" >
      <div class="card-header">
        <img class="card-img-top" src=".\p_img\/<?php echo$row_pro['st_pic']; ?>" height="250px" width="auto" alt="Card image cap">
      </div>
      <div class="card-body">
        <h6 class="card-title"><?php echo $row_pro['st_name'] ?></h6>

        <p > จำนวนที่มีใน stock : <?php echo $row_pro['st_QTY'];?> </p>
        <?php 
                $q = "SELECT * FROM `tbl_buylist` WHERE `b_basket` = '1'  AND `b_st_id` = '".$row_pro["st_id"]."' ";
                $qq = mysqli_query($con, $q);
                $qqq = mysqli_num_rows($qq);

                if($qqq >= '1'){ //ถ้าเพิ่มลงตะกร้าแล้วจะเป็นปุ่มลบออกจากตะกร้า
              ?>
              <form  name="addBuy" action="buy_add.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
              <input type="hidden"  name="st_id" value="<?php echo $row_pro["st_id"];?>" />
              <button type="submit" class="btn btn-danger" name="bgdelete">ลบออกจากตะกร้า</button>
      
            </form>
                  
              <?php }else{ //ถ้ายังไม่เพิ่มลงตะกร้าแล้วจะเป็นปุ่มเพิ่มลงตะกร้า?>
                  <form  name="addBuy" action="buy_add.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
                  <input type="hidden"  name="st_id" value="<?php echo $row_pro["st_id"];?>" />
                  <input type="hidden"  name="st_name" value="<?php echo $row_pro["st_name"];?>" />
                  <input type="number" min='1' name="p_QTY" value="1" style="width: 58px;"/>
                  <button type="submit" class="btn btn-success" name="bgadd"><i class='fas fa-shopping-cart'></i></button>
          
                </form>
              <?php } ?>

        

      </div>
      </div>
  </div>
  <?php }?>
</div>

  