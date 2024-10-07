

<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "conssssssssssssssfig", "update") && modules_field_module("status", "panels")) { ?>

    <?php include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">

    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'holidays_categories'); ?>
        <?php echo _t("Holidays categories"); ?>
    </a>

    <a href="index.php?c=holidays_categories" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "holidays_categories", "create")) { ?>
        <a href="index.php?c=holidays_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

    <a href="index.php?c=holidays" class="list-group-item"><?php _t("Holidays"); ?></a>

</div>





<?php
/**
 * <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "holidays_categories"); ?>
  <?php echo _t("By code"); ?>
  </a>
  <?php
  foreach (holidays_categories_unique_from_col("code") as $code) {
  if ($code['code'] != "") {
  echo '<a href="index.php?c=holidays_categories&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "holidays_categories"); ?>
  <?php echo _t("By category"); ?>
  </a>
  <?php
  foreach (holidays_categories_unique_from_col("category") as $category) {
  if ($category['category'] != "") {
  echo '<a href="index.php?c=holidays_categories&a=search&w=by_category&category=' . $category['category'] . '" class="list-group-item">' . $category['category'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "holidays_categories"); ?>
  <?php echo _t("By color"); ?>
  </a>
  <?php
  foreach (holidays_categories_unique_from_col("color") as $color) {
  if ($color['color'] != "") {
  echo '<a href="index.php?c=holidays_categories&a=search&w=by_color&color=' . $color['color'] . '" class="list-group-item">' . $color['color'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "holidays_categories"); ?>
  <?php echo _t("By icon"); ?>
  </a>
  <?php
  foreach (holidays_categories_unique_from_col("icon") as $icon) {
  if ($icon['icon'] != "") {
  echo '<a href="index.php?c=holidays_categories&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "holidays_categories"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (holidays_categories_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=holidays_categories&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "holidays_categories"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (holidays_categories_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=holidays_categories&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>