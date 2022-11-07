<?php
  session_start();
  include('h.php');
?>
<style type="text/css">
  #btn{
    width:100%;
  }
</style>
<div class="container" style="padding-top:100px">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="background-color:#D6EAF8">
      <h3 align="center">
      <span class="glyphicon glyphicon-lock"> </span>
      เข้าสู่ระบบ</h3>
      <form  name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="username" class="form-control" required placeholder="Username" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="password" name="password" class="form-control" required placeholder="Password" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" id="btn">
            <span class="glyphicon glyphicon-log-in"> </span>
             Login </button>
               <label>
               <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
               </label>
               <div class="col-sm-12" align="center">
                <p><h6 align="center"><a href="back\member_from_add.php">สมัครสมาชิกใหม่</a></h6>
              </div>
             </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>