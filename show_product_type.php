<?php
$type_id=$_GET['type_id'];

$query_product_type = "SELECT * FROM tbl_product as p
inner join tbl_type as t
on p.type_id = t.type_id
where p.type_id =$type_id
ORDER BY p.p_id ASC";
    $result_pro =mysqli_query($con, $query_product_type);
       // echo($query_product_type);
        //exit() 
?>
<div class="row">
<?php foreach ($result_pro as $row_pro) {?>
  
  <div class=" col-md-4" style=" margin-bottom: 10px;"style=" margin-top:10px;margin-right: 5px;">
    <div class="card  bg-light " style="width: 250px;height: 450px;" >
      <div class="card-header">
        <img class="card-img-top" src=".\Admin\p_img\/<?php echo $row_pro['p_img']; ?>" height="250px" width="auto" alt="Card image cap">
      </div>
      <div class="card-body">
          <h5 class="card-title"><?php echo$row_pro['p_name'] ?></h5>
          <p class="card-text">
            ประเภทสินค้า:<?php echo$row_pro['type_name'];?>
          </p>
          <center><a href="index.php?act=productdetail&type_id=<?php echo $type_id;?>&id=<?php echo $row_pro['p_id'];?>" class="btn btn-primary">รายละเอียด</a></center>
      </div>
    </div>
  </div>
  <?php }?>
</div>