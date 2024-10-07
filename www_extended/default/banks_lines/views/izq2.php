<?php
/**
 *
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", 'banks_lines'); ?>
  <?php echo _t("Banks_lines"); ?>
  </a>
  <a href="index.php?c=banks_lines" class="list-group-item"><?php _t("List"); ?></a>

  <a href="index.php?c=banks_lines&a=add" class="list-group-item"><?php _t("Add"); ?></a>


  </div>
 */
?>

<?php include "izq_import.php"; ?>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines"); ?>
        <?php echo _t("By type"); ?>
    </a>

    <a href="index.php?c=banks_lines" class="list-group-item">
        <?php echo icon("list"); ?>
        <?php _t("All"); ?>
    </a>


    <a href="index.php?c=banks_lines&a=search&w=by_type&type=in" class="list-group-item">
        <?php echo icon("plus"); ?>
        <?php _t("Money in"); ?>
    </a>

    <a href="index.php?c=banks_lines&a=search&w=by_type&type=out" class="list-group-item">

        <?php echo icon("minus"); ?>
        <?php _t("Money out"); ?>
    </a>

    <a href="index.php?c=banks_lines&a=import" class="list-group-item">

        <?php echo icon("import"); ?>
        <?php _t("Import"); ?>
    </a>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo icon("import"); ?>
        <?php _t("Import"); ?>
    </div>
    <div class="panel-body">




        <form method="get" action="index.php">

            <input type="hidden" name="c" value="banks_lines">
            <input type="hidden" name="a" value="import">


            <div class="form-group">
                <label for="account_number"><?php _t("Bank"); ?> : <?php echo _tr("Account number"); ?></label>
                <select class="form-control" name="account_number">
                    <?php
                    foreach (banks_list_by_contact_id($u_owner_id) as $key => $blbci) {

                        $selected = ($blbci['account_number'] == $account_number ) ? " selected " : "";

                        echo '<option value="' . $blbci['account_number'] . '" ' . $selected . '>' . $blbci['bank'] . ' ' . $blbci['account_number'] . '</option>';
                    }
                    ?>

                    <?php if (permissions_has_permission($u_rol, 'banks', "create")) { ?>
                        <option value="add_new"><?php _t("Add new account"); ?></option>
                    <?php } ?>

                </select>
            </div>

            <button type="submit" class="btn btn-default">
                <?php _t("Import"); ?>

            </button>
        </form>


    </div>
</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "banks_lines"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (banks_lines_status_list() as $blst_items) {
        $blst = new Banks_lines_status();
        $blst->setBanks_lines_status($blst_items["id"]);
        $banks_lines_total_by_status = banks_lines_total_by_status($blst->getCode());
        $total_items = ($banks_lines_total_by_status) ? '<span class="badge">' . $banks_lines_total_by_status . '</span>' : '';

        echo '<a href="index.php?c=banks_lines&a=search&w=by_status_code&status_code=' . $blst->getCode() . '" class="list-group-item">' . $total_items . ' ' . icon($blst->getIcon()) . ' ' . _tr($blst->getName()) . '</a>';
    }
    ?>
</div>





<?php
/**
 * 
  <div class="panel panel-default">
  <div class="panel-heading">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By account"); ?>
  </div>
  <div class="panel-body">

  <form>

  <div class="form-group">
  <label for="my_account"><?php _t("Account number"); ?></label>
  <select class="form-control"  name="my_account">
  <option value="all"><?php _t("All") ?></option>
  <?php
  foreach (banks_list() as $key => $bl_items) {
  $my_bank = new Banks();
  $my_bank->setBanks($bl_items['id']);
  echo '<option value="' . $my_bank->getAccount_number() . '">' . $my_bank->getBank() . ' - ' . $my_bank->getAccount_number() . '</option>';
  }
  ?>
  </select>
  </div>

  <div class="form-group">
  <label for="type"><?php _t("Type"); ?></label>
  <select class="form-control"  name="type">
  <option value="all"><?php _t("All") ?></option>
  <option value="in"><?php _t("Money in"); ?></option>
  <option value="out"><?php _t("Money out"); ?></option>
  </select>
  </div>



  <button type="submit" class="btn btn-default">Submit</button>

  </form>


  </div>
  </div>





 */
?>







<?php
/**
 * 
 * 
 * 
 * <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By my_account"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("my_account") as $my_account) {
  if ($my_account['my_account'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_my_account&my_account=' . $my_account['my_account'] . '" class="list-group-item">' . $my_account['my_account'] . '</a>';
  }
  }
  ?>
  </div>
 * 
 * 
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By operation"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("operation") as $operation) {
  if ($operation['operation'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_operation&operation=' . $operation['operation'] . '" class="list-group-item">' . $operation['operation'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By date_operation"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("date_operation") as $date_operation) {
  if ($date_operation['date_operation'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_date_operation&date_operation=' . $date_operation['date_operation'] . '" class="list-group-item">' . $date_operation['date_operation'] . '</a>';
  }
  }
  ?>
  </div>


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By description"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("description") as $description) {
  if ($description['description'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By type"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("type") as $type) {
  if ($type['type'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
  }
  }
  ?>
  </div>


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By total"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("total") as $total) {
  if ($total['total'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
  }
  }
  ?>
  </div>


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By currency"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("currency") as $currency) {
  if ($currency['currency'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_currency&currency=' . $currency['currency'] . '" class="list-group-item">' . $currency['currency'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By date_val"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("date_val") as $date_val) {
  if ($date_val['date_val'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_date_val&date_val=' . $date_val['date_val'] . '" class="list-group-item">' . $date_val['date_val'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By account"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("account") as $account) {
  if ($account['account'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_account&account=' . $account['account'] . '" class="list-group-item">' . $account['account'] . '</a>';
  }
  }
  ?>
  </div>


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By sender"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("sender") as $sender) {
  if ($sender['sender'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_sender&sender=' . $sender['sender'] . '" class="list-group-item">' . $sender['sender'] . '</a>';
  }
  }
  ?>
  </div>


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By comunication"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("comunication") as $comunication) {
  if ($comunication['comunication'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_comunication&comunication=' . $comunication['comunication'] . '" class="list-group-item">' . $comunication['comunication'] . '</a>';
  }
  }
  ?>
  </div>


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By ce"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("ce") as $ce) {
  if ($ce['ce'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_ce&ce=' . $ce['ce'] . '" class="list-group-item">' . $ce['ce'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By ref"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("ref") as $ref) {
  if ($ref['ref'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_ref&ref=' . $ref['ref'] . '" class="list-group-item">' . $ref['ref'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By ref2"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("ref2") as $ref2) {
  if ($ref2['ref2'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_ref2&ref2=' . $ref2['ref2'] . '" class="list-group-item">' . $ref2['ref2'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By ref3"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("ref3") as $ref3) {
  if ($ref3['ref3'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_ref3&ref3=' . $ref3['ref3'] . '" class="list-group-item">' . $ref3['ref3'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By date_registre"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("date_registre") as $date_registre) {
  if ($date_registre['date_registre'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks_lines"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (banks_lines_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=banks_lines&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>




 */
?>



