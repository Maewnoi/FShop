
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
              }elseif($act=='productdetail'){
                include('product_detail.php');
              }elseif($act=='login'){
                include('login_member.php');
              }elseif($act=='login_admin'){
                include('from_login_admin.php');
              }elseif($act=='register'){
                include('./Admin/member_form_add.php');
              }elseif($act=='edit_profile'){
                include('./Admin/member_form_edit.php');
              }elseif($act=='basket'){
                include('basket.php');
              }elseif($act=='buyer_data'){
                include('buyer_data.php');
              }elseif($act=='purchase'){
                include('purchase.php');
              }elseif($q!=''){ 
                include('show_product_q.php');
              }else{
                include('show_product.php');
              }
        ?> 

      </div>
    </div>   
    
    <?php include('footer.php');?> 
</div>

</body>
</html>