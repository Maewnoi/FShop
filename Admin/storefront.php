<br>
<h3>ตะกร้าสินค้าของคุณ <?php echo $_SESSION['name'];?></h3>
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
    echo "<td ><img src='./p_img/".$row['p_img']."' width='50%'>"."</td>";
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
        <td colspan='4'><center>รวมทั้งหมด</center></td>
        <td><center><?php echo $row['sumQTY'];?></center></td>
        <td><center><?php echo $row['sumall'];?></center></td>
        <td colspan='2'><a href="index.php?page=buyer_data" class="btn btn-info" role="button">ดำเนินการสั่งซื้อ</a></td>
    </tr>


<?php

    echo "</table>";
echo "</table>";

?>
<?php
if($_GET['search'] != NULL){
  $query_product = "SELECT * FROM tbl_product as p inner join tbl_type as t on p.type_id = t.type_id
  
  WHERE (`p_name` LIKE '%".$_GET['search']."%' OR `p_color` LIKE '%".$_GET['search']."%' OR `p_detail` LIKE '%".$_GET['search']."%')
  ORDER BY p.p_id ASC";
  
}else{
  $query_product = "SELECT * FROM tbl_product as p inner join tbl_type as t on p.type_id = t.type_id ORDER BY p.p_id ASC";

}
 
  $result_pro =mysqli_query($con, $query_product) ;
  //echo($query_product);
  //exit() 
?>

<br>
<div class="row">
<?php foreach ($result_pro as $row_pro) {?>
     <div class=" col-md-3 card text-info bg-light "
     style="width: 250px;height: 450px;margin-bottom: 10px;margin-top:10px;" >
        <div class="card-header">
            <img class="card-img-top" src=".\p_img\/<?php echo$row_pro['p_img']; ?>"
            height="250px" width="auto" alt="Card image cap">
        </div>
        <div class="card-body">
            <h6 class="card-title"><?php echo$row_pro['p_name'] ?></h6>
            <p > ราคา : <?php echo$row_pro['p_price'];?> </p>
            <center><a href="index.php?page=storefront_productdetail&type_id=<?php echo $type_id;?>&id=<?php echo $row_pro['p_id'];?>" class="btn btn-primary">รายละเอียด</a></center>
        </div>   
    </div>
  <?php }?>
</div>