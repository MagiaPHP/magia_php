<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'expenses'); ?>
        <?php echo _t("Purchase invoices"); ?>
    </a>


    <a href="index.php?c=expenses" class="list-group-item"><?php echo icon("list"); ?> <?php _t("List"); ?></a>

    <a href="index.php?c=expenses&a=add" class="list-group-item"><?php echo icon("plus"); ?> <?php _t("Add new expense"); ?></a> 


    <?php if (permissions_has_permission($u_rol, 'expenses_categories', 'read') && modules_field_module('status', 'expenses_categories')) { ?>
        <a href="index.php?c=expenses_categories" class="list-group-item"><?php _menu_icon("top", 'expenses'); ?> <?php _t("Expenses categories"); ?></a>
    <?php } ?>
        
        
    <?php if (permissions_has_permission($u_rol, 'banks_lines', 'read') && modules_field_module('status', 'banks_lines')) { ?>
        <a href="index.php?c=banks_lines" class="list-group-item"><?php _menu_icon("top", 'banks_lines'); ?> <?php _t("Bank lines"); ?></a>
    <?php } ?>


</div>

<?php
/**
 * 

  <?php
  foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
  $panel = new Panels();
  $panel->setPanels($pscas["id"]);
  include $panel->getPanel() . ".php";
  }
  ?>
  <?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

  <?php include view("panels", "panel_form_ok_show") ?>

  <?php } ?>


 */
?>

<?php
/**
 * 




  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", 'expenses_categories'); ?>
  <?php echo _t("Categories"); ?>
  </a>
  <a href="index.php?c=expenses_categories" class="list-group-item"><?php _t("List"); ?></a>

  <?php if (permissions_has_permission($u_rol, "expenses_categories", "createddddddddddddddddddddddddddddddd")) { ?>
  <a href="index.php?c=expenses_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a>
  <?php } ?>

  </div>


 */
?>
<?php
/**
 * <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_categories"); ?>
  <?php echo _t("By code"); ?>
  </a>
  <?php
  foreach (expenses_categories_unique_from_col("code") as $code) {
  if ($code['code'] != "") {
  echo '<a href="index.php?c=expenses_categories&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_categories"); ?>
  <?php echo _t("By father_code"); ?>
  </a>
  <?php
  foreach (expenses_categories_unique_from_col("father_code") as $father_code) {
  if ($father_code['father_code'] != "") {
  echo '<a href="index.php?c=expenses_categories&a=search&w=by_father_code&father_code=' . $father_code['father_code'] . '" class="list-group-item">' . $father_code['father_code'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_categories"); ?>
  <?php echo _t("By category"); ?>
  </a>
  <?php
  foreach (expenses_categories_unique_from_col("category") as $category) {
  if ($category['category'] != "") {
  echo '<a href="index.php?c=expenses_categories&a=search&w=by_category&category=' . $category['category'] . '" class="list-group-item">' . $category['category'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_categories"); ?>
  <?php echo _t("By description"); ?>
  </a>
  <?php
  foreach (expenses_categories_unique_from_col("description") as $description) {
  if ($description['description'] != "") {
  echo '<a href="index.php?c=expenses_categories&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_categories"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (expenses_categories_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=expenses_categories&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_categories"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (expenses_categories_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=expenses_categories&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>