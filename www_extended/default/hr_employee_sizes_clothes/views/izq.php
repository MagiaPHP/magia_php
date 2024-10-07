<?php include view('hr', 'izq') ?>


<?php 
/**
 * 
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'hr_employee_sizes_clothes'); ?>
        <?php echo _t("Hr_employee_sizes_clothes"); ?>
    </a>
    <a href="index.php?c=hr_employee_sizes_clothes" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "hr_employee_sizes_clothes", "create")) { ?>
        <a href="index.php?c=hr_employee_sizes_clothes&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_sizes_clothes"); ?>
        <?php echo _t("By employee_id"); ?>
    </a>
    <?php
    foreach (hr_employee_sizes_clothes_unique_from_col("employee_id") as $employee_id) {
        if ($employee_id['employee_id'] != "") {
            echo '<a href="index.php?c=hr_employee_sizes_clothes&a=search&w=by_employee_id&employee_id=' . $employee_id['employee_id'] . '" class="list-group-item">' . contacts_formated($employee_id['employee_id']) . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_employee_sizes_clothes"); ?>
        <?php echo _t("By clothes_code"); ?>
    </a>
    <?php
    foreach (hr_employee_sizes_clothes_unique_from_col("clothes_code") as $clothes_code) {
        if ($clothes_code['clothes_code'] != "") {
            echo '<a href="index.php?c=hr_employee_sizes_clothes&a=search&w=by_clothes_code&clothes_code=' . $clothes_code['clothes_code'] . '" class="list-group-item">' . $clothes_code['clothes_code'] . '</a>';
        }
    }
    ?>
</div>


<?php
/**
 * 
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "hr_employee_sizes_clothes"); ?>
  <?php echo _t("By size"); ?>
  </a>
  <?php
  foreach (hr_employee_sizes_clothes_unique_from_col("size") as $size) {
  if ($size['size'] != "") {
  echo '<a href="index.php?c=hr_employee_sizes_clothes&a=search&w=by_size&size=' . $size['size'] . '" class="list-group-item">' . $size['size'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "hr_employee_sizes_clothes"); ?>
  <?php echo _t("By notes"); ?>
  </a>
  <?php
  foreach (hr_employee_sizes_clothes_unique_from_col("notes") as $notes) {
  if ($notes['notes'] != "") {
  echo '<a href="index.php?c=hr_employee_sizes_clothes&a=search&w=by_notes&notes=' . $notes['notes'] . '" class="list-group-item">' . $notes['notes'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "hr_employee_sizes_clothes"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (hr_employee_sizes_clothes_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=hr_employee_sizes_clothes&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "hr_employee_sizes_clothes"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (hr_employee_sizes_clothes_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=hr_employee_sizes_clothes&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>

