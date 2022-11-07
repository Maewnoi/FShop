<?php 
include("./condb.php");
session_start();
  if(isset($_POST['username'])){
    

                  $sql="SELECT * FROM tbl_admin  WHERE  a_user='".$_POST['username']."'  AND  a_pass='".$_POST['password']."' ";
                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["ID"] = $row["a_id"];
                      $_SESSION["a_name"] = $row["a_name"];

                      Header("Location: Admin/index.php");
                 
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