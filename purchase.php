
<br>
<h3>ประวัติการซื้อ</h3>
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
  $q = "SELECT * FROM `tbl_member` WHERE `member_id` = '".$_SESSION['ID']."' ";
  $qq = mysqli_query($con, $q);
  $qqq = mysqli_fetch_array($qq);
 // SELECT `member_id`, `m_user`, `m_pass`, `m_name`, `m_email`, `m_tel`, `m_address`, `date_save` FROM `tbl_member` WHERE 1

?>
<?php

$query = "SELECT * FROM `tbl_order` WHERE `od_buyer` = '".$_SESSION['ID']."' ";
$i = 1;
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class=''>
      <th width='3%'  class='hidden-xs'>No.</th>
      <th width='20%' class='hidden-xs'>Tracking</th>
       <th width='20%'>ช่องทางการรับสินค้า</th>
       <th width='10%' >ช่องทางการชำระเงิน</th>
      <th width='30%'></th>
      <th width='30%'></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
    if($row["od_status"] == 'New'){$od_status = 'รอเจ้าหน้าที่ตรวจสอบ';}
    else if($row["od_status"] == 'TakeOrder'){$od_status = 'รับ Order';}
    else if($row["od_status"] == 'Delivery'){$od_status = 'กำลังจัดส่ง';}
    else if($row["od_status"] == 'Success'){$od_status = 'เรียบร้อย';}
    else if($row["od_status"] == 'Cancel'){$od_status = 'ยกเลิกคำสั่งซื้อ';}

    
    if($row["od_pay_type"] == 'cash'){$od_pay_type = 'รอเจ้าหน้าที่ตรวจสอบ';}
    else if($row["od_pay_type"] == 'tranfer'){$od_pay_type = 'รับ Order';}

  echo "<tr>";
    echo "<td >" .$i.  "</td> ";
    echo "<td>" .$row["od_tracking"] . "</td>";
    echo "<td >" .$row["od_delivery"] ."</td> ";
    echo "<td >" .$row["od_data_buyer"] ."</td> ";
    echo "<td >" .$row["od_pay_status"] ."</td> ";
    echo "<td >" .$od_pay_type."' <br> <img src='./".$row['od_pay_file']."' width='100%'></td> ";
    echo "<td>" .$od_status."</td> ";
    echo "</tr>";
    $i++; }

?>  


<?php
echo "</table>";



mysqli_close($con);
?>