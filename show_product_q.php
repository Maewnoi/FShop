<?php
$q=$_GET['q'];
$query_product = "SELECT * FROM tbl_product as p
inner join tbl_type as t
on p.type_id = t.type_id
where p.p_name Like '%$q%'
ORDER BY p.p_id ASC";
    $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
        //echo($query_product);
         //exit() 
?>
<div class="row">
<?php foreach ($result_pro as $row_pro) {?>
  
<div class="card text-white bg-info mb-3" style="width: 18rem; margin-top:10px;">
  <img class="card-img-top" src="back\p_img\/<?php echo$row_pro['p_img']; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo$row_pro['p_name'] ?></h5>
    <p class="card-text">
        ประเภทสินค้า:<?php echo$row_pro['type_name'];?>
    </p>
    <a href="product_detail.php?id=<?php echo $row_pro['p_id'];?>" class="btn btn-primary">รายละเอียด</a>
  </div>
  </div>
  <?php }?>
</div>