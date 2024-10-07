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


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'tax'); ?>
        <?php echo _t("Tax"); ?>
    </a>
    <a href="index.php?c=tax" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=tax&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'country_tax'); ?>
        <?php echo _t("Country_tax"); ?>
    </a>
    <a href="index.php?c=country_tax" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "country_tax", "create")) { ?>
        <a href="index.php?c=country_tax&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "country_tax"); ?>
        <?php echo _t("By country"); ?>
    </a>
    <?php
    foreach (country_tax_unique_from_col("country") as $country) {
        if ($country['country'] != "") {
            echo '<a href="index.php?c=country_tax&a=search&w=by_country&country=' . $country['country'] . '" class="list-group-item">' . $country['country'] . '</a>';
        }
    }
    ?>
</div>



<?php
/**
 * 
 * 
 * <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "country_tax"); ?>
  <?php echo _t("By tax"); ?>
  </a>
  <?php
  foreach (country_tax_unique_from_col("tax") as $tax) {
  if ($tax['tax'] != "") {
  echo '<a href="index.php?c=country_tax&a=search&w=by_tax&tax=' . $tax['tax'] . '" class="list-group-item">' . $tax['tax'] . '</a>';
  }
  }
  ?>
  </div>
 * 

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "country_tax"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (country_tax_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=country_tax&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "country_tax"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (country_tax_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=country_tax&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>