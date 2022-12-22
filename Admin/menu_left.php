<?php
session_start();
include('condb.php');
?>
<div class="list-group">
<!-- ถ้าคลิก page ที่เกี่ยวข้องกับเมนูไหน เมนูนั้นจะเป็นตัวหนังสือสีฟ้า list-group-item -->
<?php  if($_GET['page'] == 'admin' || $_GET['page'] == 'admin_form_add' || $_GET['page'] == 'admin_form_edit'){?>
	<a href="index.php?page=admin" class="list-group-item list-group-item">จัดการผู้ดูแลระบบ</a>
<?php  }else{ ?>
<!-- ถ้าไม่ได้คลิกจะเป็นสีดำปกติ list-group-item-action -->
	<a href="index.php?page=admin" class="list-group-item list-group-item-action">จัดการผู้ดูแลระบบ</a>
<?php }

//เมนูจัดการสมาชิก
if($_GET['page'] == 'member' || $_GET['page'] == 'member_form_add' || $_GET['page'] == 'member_form_edit'){?>
	<a href="index.php?page=member" class="list-group-item list-group-item">จัดการสมาชิก</a>
<?php }else{ ?>
	<a href="index.php?page=member" class="list-group-item list-group-item-action">จัดการสมาชิก</a>
<?php }

//จัดการประเภทงานที่รับ
if($_GET['page'] == 'typeJob' || $_GET['page'] == 'typeJob_form_add' || $_GET['page'] == 'typeJob_form_edit'){?>
	<a href="index.php?page=typeJob" class="list-group-item list-group-item">จัดการประเภทงานที่รับ</a>
<?php }else{ ?>
<a href="index.php?page=typeJob" class="list-group-item list-group-item-action">จัดการประเภทงานที่รับ</a>
<?php } 
//จัดการประเภทสินค้า
if($_GET['page'] == 'type' || $_GET['page'] == 'type_form_add' || $_GET['page'] == 'type_form_edit'){?>
		<a href="index.php?page=type" class="list-group-item list-group-item">จัดการประเภทสินค้า</a>
<?php }else{ ?>
	<a href="index.php?page=type" class="list-group-item list-group-item-action">จัดการประเภทสินค้า</a>
<?php } 

//จัดการสินค้า
if($_GET['page'] == 'product' || $_GET['page'] == 'product_form_add' || $_GET['page'] == 'product_form_edit'){?>
		<a href="index.php?page=product" class="list-group-item list-group-item">จัดการสินค้า</a>
<?php }else{ ?>
	<a href="index.php?page=product" class="list-group-item list-group-item-action">จัดการสินค้า</a>
<?php } 

//จัดการวัตถุดิบ
if($_GET['page'] == 'stock' || $_GET['page'] == 'stock_form_add' || $_GET['page'] == 'stock_form_edit'){?>
	<a href="index.php?page=stock" class="list-group-item list-group-item">จัดการวัตถุดิบ</a>
<?php }else{ ?>
<a href="index.php?page=stock" class="list-group-item list-group-item-action">จัดการวัตถุดิบ</a>
<?php } 

//จัดการสั่งซื้อวัตถุดิบ
if($_GET['page'] == 'Buy' || $_GET['page'] == 'Buy_form_add' || $_GET['page'] == 'Buy_form_edit'){?>
		<a href="index.php?page=Buy" class="list-group-item list-group-item">จัดการสั่งซื้อวัตถุดิบ</a>
<?php }else{ ?>
	<a href="index.php?page=Buy" class="list-group-item list-group-item-action">จัดการสั่งซื้อวัตถุดิบ</a>
<?php } 
//จัดการเบิกวัตถุดิบ
if($_GET['page'] == 'withdraw' || $_GET['page'] == 'withdraw_form_add' || $_GET['page'] == 'withdraw_form_edit'){?>
		<a href="index.php?page=withdraw" class="list-group-item list-group-item">จัดการเบิกวัตถุดิบ</a>
<?php }else{ ?>
	<a href="index.php?page=withdraw" class="list-group-item list-group-item-action">จัดการเบิกวัตถุดิบ</a>
<?php } 
//จัดการรับคำสั่งซื้อ

$q = "SELECT COUNT(*)as num FROM `tbl_order` WHERE `od_status` = 'NEW'";

 $qq = mysqli_query($con, $q);
 $qqq = mysqli_fetch_array($qq);


if($_GET['page'] == 'order' || $_GET['page'] == 'order_form_add' || $_GET['page'] == 'order_form_edit'){?>
		<a href="index.php?page=order" class="list-group-item list-group-item">จัดการรับคำสั่งซื้อ <span class="badge badge-danger"><?php echo $qqq['num'];?></span></a>
<?php }else{ ?>
	<a href="index.php?page=order" class="list-group-item list-group-item-action">จัดการรับคำสั่งซื้อ <span class="badge badge-danger"><?php echo $qqq['num'];?></span></a>
<?php } ?>

	<a href="index.php?page=htstore" class="list-group-item list-group-item-action">บันทึกการขาย</a>
<?php 
//จัดการรายจ่าย
if($_GET['page'] == 'expenses' || $_GET['page'] == 'expenses_form_add' || $_GET['page'] == 'expenses_form_edit'){?>
		<a href="index.php?page=expenses" class="list-group-item list-group-item">บันทึกรายจ่าย</a>
<?php }else{ ?>
	<a href="index.php?page=expenses" class="list-group-item list-group-item-action">บันทึกรายจ่าย</a>
<?php } ?>
	<a href="../logout.php" class="list-group-item list-group-item-action">ออกจากระบบ</a>
</div>