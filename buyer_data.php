
  <style>
            .hide {
          display: none;
        }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        function show1(){
            document.getElementById('div1').style.display ='none';
          }
          function show2(){
            document.getElementById('div1').style.display = 'block';
          }
</script>
<br>
<h3>กรอกข้อมูลผู้สั่ง <?php echo $_SESSION['name'];?></h3>
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
<form  name="form_data_buyer" enctype="multipart/form-data" action="buyer_add_order.php" method="POST" class="form-horizontal">
       <div class="form-group row">
          <div class="col-sm-2" >ชื่อผู้สั่ง :</div>
          <div class="col-sm-5" align="left">
            <input  name="m_name" type="text" required class="form-control" id="m_name" value="<?php echo $qqq['m_name'];?>" />
          </div>
      </div> 
      <div class="form-group row">
          <div class="col-sm-2" >เบอร์ติดต่อ :</div>
          <div class="col-sm-5" align="left">
            <input  name="m_tel" type="text" required class="form-control" id="m_tel" value="<?php echo $qqq['m_tel'];?>" />
          </div>
      </div> 
      <div class="form-group row">
          <div class="col-sm-2" >E-mail :</div>
          <div class="col-sm-5" align="left">
            <input  name="m_email" type="text" required class="form-control" id="m_email"  value="<?php echo $qqq['m_email'];?>" />
          </div>
      </div> 
      <div class="form-group row">
          <div class="col-sm-2" >ที่อยู่ :</div>
          <div class="col-sm-5" align="left">
            <textarea name="m_address" rows="5" class="form-control"><?php echo $qqq['m_address'];?></textarea>
          </div>
      </div> 
      <hr>
      <div class="form-group row">
          <div class="col-sm-4">ช่องทางการรับสินค้า</div>
          <div class="col-sm-4">
            <input type="radio" id="b_delivery" name="b_delivery" value="storefront"  onclick="show1();"> รับเองหน้าร้าน <br>
            <input type="radio" id="b_delivery" name="b_delivery" value="byself" onclick="show2();"> บริการขนส่ง
          </div>
        </div>
        
      <div class="form-group row hide" id="div1" >
          <div class="col-sm-2" >ที่อยู่ผู้รับ :</div>
          <div class="col-sm-5" align="left">
            <textarea name="od_employee" rows="5" class="form-control">พิกัด lat lo</textarea>
          </div>
        </div>
        
      <div class="form-group row">
          <div class="col-sm-4">ช่องทางการชำระเงิน</div>
          <div class="col-sm-4">
            <!--<input type="radio" id="pay_type" name="pay_type" value="cash"> เงินสด <br>
            <input type="radio" id="pay_type" name="pay_type" value="transfer" checked> โอนเงินผ่านบัญชีธนาคาร
            <br>-->
            KBANK Kasikorn Bank Company <br>
            เลขที่บัญชี xxx-x-xxxxx-x
          </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-2 control-label"> รูปภาพหลักฐานการโอน : </div>
            <div class="col-sm-4">
            <input type="file" name="pay_file" required class="form-control" accept="image/*" onchange="readURL(this);"/>
            <img id="blah" src="#" alt="" width="250" class="img-rounded" style="margin-top: 10px;">
            </div>
        </div>
      <hr>
      <div class="form-group">
          <div class="col-sm-5" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> ดำเนินการสั่งซื้อ  </button>
          </div>     
      </div>
      </form>

<hr>
<?php

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
    </tr>


<?php

    echo "</table>";
echo "</table>";



mysqli_close($con);
?>