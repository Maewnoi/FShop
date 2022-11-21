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

//จัดการสั่งซื้อวัตถุดิบ
if($_GET['page'] == 'Buy' || $_GET['page'] == 'Buy_form_add' || $_GET['page'] == 'Buy_form_edit'){?>
		<a href="index.php?page=Buy" class="list-group-item list-group-item">จัดการสั่งซื้อวัตถุดิบ</a>
<?php }else{ ?>
	<a href="index.php?page=Buy" class="list-group-item list-group-item-action">จัดการสั่งซื้อวัตถุดิบ</a>
<?php } 

//จัดการรับคำสั่งซื้อ
if($_GET['page'] == 'order' || $_GET['page'] == 'order_form_add' || $_GET['page'] == 'order_form_edit'){?>
		<a href="index.php?page=order" class="list-group-item list-group-item">จัดการรับคำสั่งซื้อ</a>
<?php }else{ ?>
	<a href="index.php?page=order" class="list-group-item list-group-item-action">จัดการรับคำสั่งซื้อ</a>
<?php } ?>

	<a href="#" class="list-group-item list-group-item-action">จัดการขาย</a>
<?php 
//จัดการเบิกวัตถุดิบ
if($_GET['page'] == 'withdraw' || $_GET['page'] == 'withdraw_form_add' || $_GET['page'] == 'withdraw_form_edit'){?>
		<a href="index.php?page=withdraw" class="list-group-item list-group-item">จัดการเบิกวัตถุดิบ</a>
<?php }else{ ?>
	<a href="index.php?page=withdraw" class="list-group-item list-group-item-action">จัดการเบิกวัตถุดิบ</a>
<?php } ?>

	<a href="#" class="list-group-item list-group-item-action">จัดการจัดส่งสินค้า</a>
<?php 
//จัดการรายจ่าย
if($_GET['page'] == 'expenses' || $_GET['page'] == 'expenses_form_add' || $_GET['page'] == 'expenses_form_edit'){?>
		<a href="index.php?page=expenses" class="list-group-item list-group-item">จัดการรายจ่าย</a>
<?php }else{ ?>
	<a href="index.php?page=expenses" class="list-group-item list-group-item-action">จัดการรายจ่าย</a>
<?php } ?>
	<a href="../logout.php" class="list-group-item list-group-item-action">ออกจากระบบ</a>
</div>