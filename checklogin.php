<?php 
include("./condb.php");
session_start();
  if(isset($_POST['username'])){
    

    $sql="SELECT * FROM `tbl_member` WHERE `m_user`='".$_POST['username']."'  AND `m_pass`='".$_POST['password']."' ";
    $result = mysqli_query($con,$sql);
// `member_id`, `m_user`, `m_pass`, `m_name`, `m_email`, `m_tel`, `m_address`, `date_save`
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["ID"] = $row["member_id"];
                      $_SESSION["name"] = $row["m_name"];
                      $_SESSION["email"] = $row["m_email"];
                      $_SESSION["tel"] = $row["m_tel"];
                      $_SESSION["address"] = $row["m_address"];

                      Header("Location: index.php");
                 
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
        }else{

          echo "<script>";
          echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
          echo "window.history.back()";
          echo "</script>";

 
        }
?>