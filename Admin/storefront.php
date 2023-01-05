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