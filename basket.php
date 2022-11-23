
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<br>
<h3>ตะกร้าสินค้าของคุณ <?php echo $_SESSION['name'];?></h3>
<hr>
<?php 
 if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=product.php" />';

  }else if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=product.php" />';
  }

$query = "SELECT * FROM `tbl_basket`,tbl_product WHERE tbl_basket.bk_product = tbl_product.p_id 
AND `bk_buyer` = '".$_SESSION['ID']."'  AND `bk_status` = 'wait' ";
$i = 1;
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class=''>
      <th width='3%'  class='hidden-xs'>No.</th>
      <th width='20%' class='hidden-xs'>รายการ</th>
       <th width='20%'>ชื่อสินค้า</th>
       <th width='10%' >ราคา</th>
      <th width='10%'>จำนวน</th>
      <th width='20%'>รวมสินค้านี้</th>
      <th width='5%'>แก้ไข</th>
      <th width=5%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td >" .$i.  "</td> ";
    echo "<td ><img src='./Admin/p_img/".$row['p_img']."' width='100%'>"."</td>";
    echo "<td> ชื่อ: " .$row["p_name"] . "</td>";
    echo "<td >" .$row["p_price"] ."</td> ";
    echo "<td >" .$row["bk_QTY"] ."</td> ";
    echo "<td> ราคา " .$row["bk_sum"] ." บาท</td> ";
       
  
    //แก้ไขข้อมูล
    echo "<td>
        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal_".$row["bk_id"]."'>
            แก้ไข
        </button> </td>";  
?>
 <!-- The Modal -->
 <div class="modal fade" id="myModal_<?php echo $row["bk_id"];?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">แก้ไขจำนวนที่ต้องการซื้อ <?php echo $row["p_name"];?></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <form  name="addBuy" action="basket_add.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
            <input type="hidden"  name="bk_id" value="<?php echo $row["bk_id"];?>" />
            <input type="hidden"  name="p_price" value="<?php echo $row["p_price"];?>" />
        <!-- Modal body -->
        <div class="modal-body">
        <input type="number" name="bk_QTY" required value="<?php echo $row["bk_QTY"];?>" class="form-control">
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
    <form  name='addBuy' action='basket_add.php' method='POST' enctype='multipart/form-data'>
        <input type='hidden'  name='bk_id' value='".$row["bk_id"]."' />
        <button type='submit' class='btn btn-danger' name='bgdelete_bg' onclick=\"return confirm('ต้องการลบรายการนี้ใช่หรือไม่? !!!')\" >ลบ</button>
    </form></td> ";

    echo "</tr>";
    $i++; }

    $query = "SELECT SUM(bk_sum)as sumall,SUM(bk_QTY)as sumQTY FROM `tbl_basket`,tbl_product WHERE tbl_basket.bk_product = tbl_product.p_id 
    AND `bk_buyer` = '".$_SESSION['ID']."'  AND `bk_status` = 'wait' ";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

?>  
    <tr>
        <td colspan='4'><center>รวมทั้งหมด</td>
        <td><center><?php echo $row['sumQTY'];?></center></td>
        <td><center><?php echo $row['sumall'];?></center></td>
        <td colspan='2'><a href="index.php?act=buyer_data" class="btn btn-info" role="button">ดำเนินการสั่งซื้อ</a></td>
    </tr>


<?php

    echo "</table>";
echo "</table>";



mysqli_close($con);
?>