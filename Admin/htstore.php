
<?php
  include('../h.php');
  include('../condb.php');
  session_start();
  error_reporting( error_reporting() & ~E_NOTICE );
?>
    <div class="row">
    <div class="col-md-9">
      <!--
      <br>
      <a href="index.php?page=order_form_add" class="btn-info btn-lg">เพิ่ม </a>
      <hr>
-->
      <?php
      if($_GET['search'] != NULL){
 
        $query = "SELECT *  FROM tbl_order 
        
        WHERE `od_created_at` LIKE '%".$_GET['search']."%'
        AND od_status = 'Success' 
        ORDER BY od_created_at ASC";
        }else{
         $query = "SELECT * FROM tbl_order WHERE od_status = 'Success'  ORDER BY od_created_at ASC";
                                                                
        }

$i = 1;
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped"  width="100%" >';
  echo "<thead>";
    echo "<tr class=''>
    <th width='3%'  class='hidden-xs'>No.</th>
    <th width='20%' class='hidden-xs'>Tracking</th>
    <th width='20%' class='hidden-xs'>สินค้าที่สั่ง</th>
    <th width='30%'>ข้อมูลลูกค้า</th>
     <th width='20%'>ช่องทางการรับสินค้า</th>
     <th width='10%' >ช่องทางการชำระเงิน</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
    if($row["od_status"] == 'New'){$od_status = '⚠ รอเจ้าหน้าที่ตรวจสอบ';}
    else if($row["od_status"] == 'TakeOrder'){$od_status = '✅ รับ Order';}
    else if($row["od_status"] == 'Delivery'){$od_status = '🚛 กำลังจัดส่ง';}
    else if($row["od_status"] == 'Success'){$od_status = '✅ เรียบร้อย';}
    else if($row["od_status"] == 'Cancel'){$od_status = 'ยกเลิกคำสั่งซื้อ';}

    if($row["od_pay_type"] == 'cash'){$od_pay_type = 'เงินสด';}
    else if($row["od_pay_type"] == 'transfer'){$od_pay_type = 'โอนผ่านธนาคาร';}
    
    if($row["od_pay_status"] == '1'){$od_pay_status = '✅ ยืนยันการชำระเงินแล้ว';}
    else{$od_pay_status = '';}

    if($row["od_delivery"] == 'storefront'){$od_delivery = 'รับเองหน้าร้าน';}
    else if($row["od_delivery"] == 'byself'){$od_delivery = 'บริการขนส่ง <br>'.$row["od_employee"];}


  echo "<tr>";
    echo "<td >" .$i.  "</td> ";

    $od_created_at = explode(" ",$row["od_created_at"]);
    $date_od = explode("-",$od_created_at[0] );

    $time_od = $od_created_at[1];

    $_month_name = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.","05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");
		$yy=date($date_od[0]);
		$mm =date($date_od[1]);
		$dd=date($date_od[2]);
		if ($dd<10){
			$dd=substr($dd,1,2);
		}
		$date=$dd ." ".$_month_name[$mm]." ".$yy+= 543;	
    echo "<td>" .$row["od_tracking"] .'<hr>'.$date ." ". $time_od. "</td>";	

    echo "<td>";
    $sum = 0;
      $cd ="SELECT * FROM `tbl_basket`,tbl_product WHERE tbl_basket.bk_product = tbl_product.p_id AND `bk_order` = '".$row["od_tracking"] . "' ";
      $cdd = mysqli_query($con, $cd);
      while($row_cd = mysqli_fetch_array($cdd)) {
          echo $row_cd['p_name'].' จำนวน '.$row_cd['bk_QTY'].' ราคา '.$row_cd['bk_price'].' บาท <hr>';
      $sum = $row_cd['bk_price']+$sum;
    }

      echo "📌 รวม ".$sum.' บาท';
    echo "</td>";
    echo "<td >" .str_replace("|", "<br>",$row["od_data_buyer"] )."</td> ";
    echo "<td >" .$od_delivery ."</td> ";
    echo "<td >" .$od_pay_type."<br> <img src='../".$row['od_pay_file']."' width='100%'></td> ";
    echo "<td>" .$od_status.'<br>'.$od_pay_status.'<br>';
    if($row["od_status"] == 'New'){
       echo "<a href='order_db.php?action=update_status_order&ID=".$row['od_id']."' class='btn btn-warning btn-xs'>รับ Order</a>";
    }
    if($row["od_status"] == 'TakeOrder' && $row["od_pay_status"] == '0' ){
      echo "<a href='order_db.php?action=update_pay_status&ID=".$row['od_id']."' class='btn btn-warning btn-xs'>ยืนยันการชำระเงิน</a>";
      }
    if($row["od_pay_status"] == '1' && $row["od_status"] != 'Success'){
      if($row["od_delivery"] == 'storefront'){ // ถ้ามารับเองหน้าร้านจะขึ้นปุ่มรับสินค้าแล้ว
        echo "<a href='order_db.php?action=update_Delivery_status&ID=".$row['od_id']."&ss=storefront'
        class='btn btn-success btn-xs'>รับสินค้าแล้ว</a>";
      
      }else{
        echo "<a href='order_db.php?action=update_Delivery_status&ID=".$row['od_id']."&ss=byself'
        class='btn btn-warning btn-xs'>จัดส่ง</a>";
      if($row["od_delivery"] == 'Delivery'){
        echo "<a href='order_db.php?action=update_Delivery_status&ID=".$row['od_id']."&ss=storefront'
        class='btn btn-success btn-xs'>รับสินค้าแล้ว</a>";
      }
      }

      
      }
      
    echo "</td>";
    
    echo "</tr>";
    $i++; }

?>  


<?php
echo "</table>";



mysqli_close($con);
?>