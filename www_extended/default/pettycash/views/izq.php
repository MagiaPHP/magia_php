

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
        <?php _menu_icon("top", 'pettycash'); ?>
        <?php echo _t("Pettycash"); ?>
    </a>
    <a href="index.php?c=pettycash" class="list-group-item"><?php _t("List"); ?></a>

    <?php if (permissions_has_permission($u_rol, "pettycash", "create")) { ?>
        <a href="index.php?c=pettycash&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="panel panel-default">
    <div class="panel-heading">

        <?php _menu_icon("top", "pettycash"); ?>
        <?php echo _t("By date"); ?>


    </div>
    <div class="panel-body">



        <form method="post" action="index.php">

            <input type="hidden" name="c" value="pettycash">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="by_date">



            <div class="form-group">
                <label for="date"><?php _t("date"); ?></label>
                <input type="date" class="form-control" name="date" id="date" placeholder="">
            </div>


            <button type="submit" class="btn btn-default">
                <?php echo icon("ok"); ?> 
                <?php _t("Submit"); ?>
            </button>

        </form>


    </div>
</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "pettycash"); ?>
        <?php echo _t("By date"); ?>
    </a>
    <?php
    foreach (pettycash_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=pettycash&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "pettycash"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (pettycash_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=pettycash&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<?php
/**
 * 
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "pettycash"); ?>
  <?php echo _t("By total"); ?>
  </a>
  <?php
  foreach (pettycash_unique_from_col("total") as $total) {
  if ($total['total'] != "") {
  echo '<a href="index.php?c=pettycash&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "pettycash"); ?>
  <?php echo _t("By date_registre"); ?>
  </a>
  <?php
  foreach (pettycash_unique_from_col("date_registre") as $date_registre) {
  if ($date_registre['date_registre'] != "") {
  echo '<a href="index.php?c=pettycash&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "pettycash"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (pettycash_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=pettycash&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "pettycash"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (pettycash_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=pettycash&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>