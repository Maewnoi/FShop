<?php

session_start();
$p_id = $_GET["id"];
?>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <div class="row">
      <?php
      $sql = "SELECT * FROM tbl_product as p 
              INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
               AND p_id = $p_id ";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result);

      ?>
      <div class="col-md-10">
        <div class="container" style="margin-top: 50px">
          <div class="row">
            <div class="col-md-6">
              <div class="polaroid">
                <?php echo"<img src='./p_img/".$row['p_img']."'width='100%'>";?>
                  <div class="container_di">
                    <center><p><?php echo $row["p_name"];?></p></center>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <h3><b><?php echo $row["p_name"];?></b></h3>
              <p> ประเภท <?php echo $row["type_name"];?></p>
              <br>
              <?php echo $row["p_detail"];?>
              <hr>
              <h2>฿ <?php echo $row["p_price"];?></h2>
              <hr>
              <?php 
                $q = "SELECT * FROM `tbl_basket` WHERE `bk_product` = '$p_id'
                AND `bk_buyer` = '".$_SESSION['ID']."' AND `bk_status` = 'wait' ";
                $qq = mysqli_query($con, $q);
                $qqq = mysqli_num_rows($qq);

                if($qqq >= '1'){ //ถ้าเพิ่มลงตะกร้าแล้วจะเป็นปุ่มลบออกจากตะกร้า
              ?>
              <form  name="addBuy" action="basket_add.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
              <input type="hidden"  name="p_id" value="<?php echo $row["p_id"];?>" />
              <button type="submit" class="btn btn-danger" name="bgdelete">ลบออกจากตะกร้า</button>
      
            </form>
                  
              <?php }else{ //ถ้ายังไม่เพิ่มลงตะกร้าแล้วจะเป็นปุ่มเพิ่มลงตะกร้า?>
                  <form  name="addBuy" action="basket_add.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
                    <input type="hidden"  name="p_id" value="<?php echo $row["p_id"];?>" />
                    <input type="hidden"  name="p_price" value="<?php echo $row["p_price"];?>" />
                    <input type="number" min='1' name="p_QTY" value="1" style="width: 58px;"/>
                    <button type="submit" class="btn btn-success" name="bgadd"><i class='fas fa-shopping-cart'></i></button>
            
                  </form>
              <?php } ?>

                
            </div>
          </div>

        </div>
      </div>
</div>
