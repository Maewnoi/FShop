<?php
include('condb.php');

$search = $_POST['search'];
 
if($_GET['page'] == 'product'){
    
  echo "<script type='text/javascript'>";
  echo "window.location = 'index.php?page=product&search=".$search."' ";
  echo "</script>";
}else if($_GET['page'] == 'admin'){
    
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?page=admin&search=".$search."' ";
    echo "</script>";
  }else if($_GET['page'] == 'member'){
    
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?page=member&search=".$search."' ";
    echo "</script>";
  }else if($_GET['page'] == 'type'){
    
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?page=type&search=".$search."' ";
    echo "</script>";
  }else if($_GET['page'] == 'stock'){
    
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?page=stock&search=".$search."' ";
    echo "</script>";
  }else if($_GET['page'] == 'Buy'){
    
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?page=Buy&search=".$search."' ";
    echo "</script>";
  }else if($_GET['page'] == 'withdraw'){
    
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?page=withdraw&search=".$search."' ";
    echo "</script>";
  }else if($_GET['page'] == 'order'){
    
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?page=order&search=".$search."' ";
    echo "</script>";
  }else if($_GET['page'] == 'expenses'){
    
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?page=expenses&search=".$search."' ";
    echo "</script>";
  }else if($_GET['page'] == 'typeJob'){
    
    echo "<script type='text/javascript'>";
    echo "window.location = 'index.php?page=typeJob&search=".$search."' ";
    echo "</script>";
  }
    
    
?>