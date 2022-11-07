<?php session_start();?>
<?php
include('h.php');
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta  charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="java.js"></script>

  </head>
  <body>
    <div class="card text-center">
    <div class="card-header">
      <div class="label">สำหรับสมาชิก</div>

    </div>
  </div>
  <!-- Content here --------------------->
  <P>

  <span class="glyphicon glyphicon-lock"> </span>
      Form Login </h3>
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
    <div class="col-sm-6" align="center">
      <button type="submit" class="btn btn-primary">ลงชื่อเข้าใช้งานระบบ</button>
    </div>
  </form>

<?php
//ส่วนของการตรวจสอบ username และ password
  if(isset($_POST['email'])){
  
  //คำสั่ง Foreach 
  
  //คำสั่ง  SQL

  //ลงทะเบียนตัวแปร SESSION

  }

 ?>

  </body>
</html>
