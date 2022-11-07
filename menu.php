<?php require_once('./condb.php');
$type_id=(isset($_GET['type_id'])?$_GET['type_id']:'') ;
 
    $query_type = "SELECT * FROM tbl_type ORDER BY type_id ASC";
    $result_type =mysqli_query($con, $query_type) ;
        // echo($query_type);
        // exit()
        
 
?>
 
<div class="list-group"> 
    <?php
        foreach ($result_type as $row )  { 
            if($type_id == $row["type_id"] ){ $textclass = "list-group-item-light";}
            else{$textclass = "list-group-item-warning";}
            ?>
        
 
         <a href="index.php?act=showbytype&type_id=<?php echo $row['type_id'];?>"
         class="list-group-item list-group-item-action <?php echo $textclass?>"> 
            <?php echo $row["type_name"]; ?></a>
 
    <?php } ?>                      
</div>
