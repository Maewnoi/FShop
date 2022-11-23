<?php session_start();?>
<?php
include('h.php');
?>

    <div class="card text-center">
    <div class="card-header">
      <div class="label">สำหรับสมาชิก</div>

    </div>
  </div>
  <!-- Content here --------------------->
  <br>

  <span class="glyphicon glyphicon-lock"> </span>
      <form  name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">
        <div class="form-group row">
        <div class="col-sm-3"></div>
          <div class="col-sm-4">
            <input type="text"  name="username" class="form-control" required placeholder="Username" />
          </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-3"></div>
          <div class="col-sm-4">
            <input type="password" name="password" class="form-control" required placeholder="Password" />
          </div>
        </div>
        <div class="form-group row">
        <div class="col-sm-3"></div>
          <div class="col-sm-4" align="center">
            <button type="submit" class="btn btn-primary">ลงชื่อเข้าใช้งานระบบ</button>
          </div>
        </div>
  </form>
  <hr>
  
  <div class="form-group row">
               <div class="col-sm-3" align="center">
                <h6 align="center"><a href="index.php?act=register">สมัครสมาชิก</a></h6>
              </div>
              <div class="col-sm-3" align="center">
                <h6 align="center"><a href="index.php?act=login_admin">เข้าสู่ระบบสำหรับ Admin</a></h6>
              </div>
</div>