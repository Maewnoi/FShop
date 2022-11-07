
<?php session_start();?>
<?php include('h.php');?>
<body>
  
<div class="container" style=" width: 1280px;">
  <div class="carousel-item active">
      <img  src="picture\Y1.png" alt="300" width="100%" height="275" class="d-block w-100,">
  </div>
    <?php include('navber.php');?>

    <div class="row">
      <div class="col-md-3">
        <?php include('menu.php');?> 
      </div>
      <div class="col-md-9">
        <?php 
            $act=(isset($_GET['act'])?$_GET['act']:'') ;
            $q=(isset($_GET['q'])?$_GET['q']:'') ;
              if($act=='showbytype'){
                  include('show_product_type.php');
              }elseif($q!=''){ 
                include('show_product_q.php');
              }else{
                include('show_product.php');
              }
        ?> 

      </div>
    </div>    
</div>

</body>
</html>