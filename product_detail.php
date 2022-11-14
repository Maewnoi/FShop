<?php
$p_id = $_GET["id"];
?>

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
                <?php echo"<img src='./Admin/p_img/".$row['p_img']."'width='100%'>";?>
                  <div class="container_di">
                    <p><?php echo $row["p_name"];?></p>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <h3><b><?php echo $row["p_name"];?></b></h3>
              <p>
                ประเภท <?php echo $row["type_name"];?>
              </p>
              <?php echo $row["p_detail"];?>
                 <p> 
            </div>
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500ee80057fdb99"></script>
          <div class="addthis_inline_share_toolbox_sf2w" style="margin-left: 400px"></div>
                  </p>
          </div>
        </div>
      </div>
</div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>