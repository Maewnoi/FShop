<?php
include('condb.php');

$search = $_POST['search'];

  echo "<script type='text/javascript'>";
  echo "window.location = 'index.php?search=".$search."' ";
  echo "</script>";
?>