<?php
  session_start();
  include('h.php');
?>
<style type="text/css">
  #btn{
    width:100%;
  }
</style>
<div class="container" style="padding-top:50px">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="background-color:#D6EAF8">
      <h3 align="center">
      <span class="glyphicon glyphicon-lock"> </span>
      เข้าสู่ระบบ</h3>
      <form  name="formlogin" action="checklogin_admin.php" method="POST" id="login" class="form-horizontal">
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
            </div>
             
          </div>
        </div>
      </form>
    </div>
  </div>
  
  <hr>
  
  <div class="form-group row">
               <div class="col-sm-3" align="center">
                <h6 align="center"><a href="index.php?act=register">สมัครสมาชิก</a></h6>
              </div>
              <div class="col-sm-3" align="center">
                <h6 align="center"><a href="index.php?act=login">เข้าสู่ระบบสำหรับสมาชิก</a></h6>
              </div>
</div>