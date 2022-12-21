<br>
เพิ่ม Admin ระบบ
<hr>
<form  name="admin" action="admin_form_add_db.php" method="POST" id="admin" class="form-horizontal">
          <div class="row">
            <div class="col-sm-3" align="right"> Username  </div>
            <div class="col-sm-6" align="left">
              <input  name="a_user" type="text" required class="form-control" id="a_user" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-3" align="right"> Password  </div>
            <div class="col-sm-6" align="left">
              <input  name="a_pass" type="password" required class="form-control" id="a_pass"  pattern="^[a-zA-Z0-9]+$" minlength="2" />
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-3" align="right"> ชื่อ-สกุล  </div>
            <div class="col-sm-6" align="left">
              <input  name="a_name" type="text" required class="form-control" id="a_name" />
            </div>
          </div>
          <br>
          
        <div class="row">
          
        <div class="col-sm-3" align="right">  ที่อยู่ : </div>
          <div class="col-sm-5" align="left">
          
            <textarea name="a_address" class="form-control" id="a_address" required  placeholder="ที่อยู่"></textarea> 
          </div>
        </div>
        <br>
          <center>
            <button type="submit" class="btn btn-success" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก</button>      
          </center>
        </form>