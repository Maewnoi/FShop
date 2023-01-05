<?php session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Yodruk Flower</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">หน้าหลัก <span class="sr-only">(current)</span></a>
        </li>
        
    <?php if($_SESSION["ID"] ==NULL){?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?act=login">เข้าสู่ระบบ</a>
        </li>
      <?php }else{ 
     
        $q = "SELECT * FROM `tbl_basket` WHERE `bk_buyer` = '".$_SESSION['ID']."' AND `bk_status` = 'wait' ";
        $qq = mysqli_query($con, $q);
        $qqq = mysqli_num_rows($qq);
        ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=basket">ตะกร้าสินค้า<span class="badge badge-danger"><?php echo $qqq;?></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=order">สั่งซื้อ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?act=purchase">ติดตามการสั่งซื้อ</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php">ออกจากระบบ</a>
        </li>
     <?php  }?>
    </ul>

    <a href="index.php?act=edit_profile&ID=<?php echo $_SESSION["ID"];?>"><?php echo $_SESSION["name"];?></a> &nbsp;&nbsp;&nbsp;
    <form  name="admin" action="navbar_Search.php" method="POST" id="admin" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>