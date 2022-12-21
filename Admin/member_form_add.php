<br>
<?php 
//ถ้ามีการ login ของ Admin จะเป็นหน้าเพิ่มสมาชิก
if($_SESSION['ID'] != NULL){echo 'เพิ่มข้อมูลสมาชิก';
  echo '<form  name="register" action="member_form_add_db.php" method="POST" class="form-horizontal">';
}
//ถ้าไม่มี จะเป็นหน้าสมัครสมาชิก
else{ echo 'สมัครสมาชิก';
  echo '<form  name="register" action="./Admin/member_form_add_db.php" method="POST" class="form-horizontal">';
}?>
<hr>
<form  name="register" action="member_form_add_db.php" method="POST" class="form-horizontal">
       <div class="form-group row">
          <div class="col-sm-5" align="left">
            Username :
            <input  name="m_user" type="text" required class="form-control" id="m_user" placeholder="Username" minlength="2"  />
          </div>
          <div class="col-sm-5" align="left">
            Password :
            <input  name="m_pass" type="password" required class="form-control" id="m_pass" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5" align="left">
          ชื่อ-สกุล :
            <input  name="m_name" type="text" required class="form-control" id="m_name" placeholder="ชื่อ-สกุล " />
          </div>
          <div class="col-sm-5" align="left">
          อีเมล์ :
            <input  name="m_email" type="email" class="form-control" id="m_email"   placeholder=" อีเมล์ name@hotmail.com"/>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-5" align="left">
          เบอร์โทรศัพท์ :
            <input  name="m_tel" type="text" class="form-control" id="m_tel"  placeholder="เบอร์โทรศัพท์ ตัวเลขเท่านั้น" />
          </div>
          <div class="col-sm-5" align="left">
          ที่อยู่ :
            <textarea name="m_address" class="form-control" id="m_address" required  placeholder="ที่อยู่"></textarea> 
          </div>
        </div>
      <div class="form-group">
          <div class="col-sm-5" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> สมัครสมาชิก  </button>
          </div>     
      </div>
      </form>