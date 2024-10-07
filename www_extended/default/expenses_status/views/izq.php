

<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "uxxxxxxxxxxxxxxpdate") && modules_field_module("status", "panels")) { ?>

    <?php include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'expenses_status'); ?>
        <?php echo _t("Expenses status"); ?>
    </a>
    <a href="index.php?c=expenses_status" class="list-group-item"><?php _t("List"); ?></a>
    <?php if (permissions_has_permission($u_rol, "expenses_status", "creassssssssssssssssssssssssssssste")) { ?>
        <a href="index.php?c=expenses_status&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    
    <a href="index.php?c=expenses" class="list-group-item"><?php _t("Expenses"); ?></a> 
</div>


<?php /**


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_status"); ?>
  <?php echo _t("By code"); ?>
  </a>
  <?php
  foreach (expenses_status_unique_from_col("code") as $code) {
  if ($code['code'] != "") {
  echo '<a href="index.php?c=expenses_status&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_status"); ?>
  <?php echo _t("By name"); ?>
  </a>
  <?php
  foreach (expenses_status_unique_from_col("name") as $name) {
  if ($name['name'] != "") {
  echo '<a href="index.php?c=expenses_status&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_status"); ?>
  <?php echo _t("By icon"); ?>
  </a>
  <?php
  foreach (expenses_status_unique_from_col("icon") as $icon) {
  if ($icon['icon'] != "") {
  echo '<a href="index.php?c=expenses_status&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_status"); ?>
  <?php echo _t("By color"); ?>
  </a>
  <?php
  foreach (expenses_status_unique_from_col("color") as $color) {
  if ($color['color'] != "") {
  echo '<a href="index.php?c=expenses_status&a=search&w=by_color&color=' . $color['color'] . '" class="list-group-item">' . $color['color'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_status"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (expenses_status_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=expenses_status&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_status"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (expenses_status_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=expenses_status&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>
 * 
 */ ?>

