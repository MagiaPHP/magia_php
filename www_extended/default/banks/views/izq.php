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
        <?php _menu_icon("top", 'banks'); ?>
        <?php echo _t("Banks"); ?>
    </a>

    <?php if (permissions_has_permission($u_rol, "banks", "create")) { ?>
        <a href="index.php?c=banks" class="list-group-item <?php echo ($c == 'banks') ? " list-group-item-info " : ""; ?> "><?php _t("Banks"); ?></a> 
    <?php } ?>    

    <?php if (permissions_has_permission($u_rol, "banks_lines", "create")) { ?>
        <a href="index.php?c=banks_lines" class="list-group-item <?php echo ($c == 'banks_lines') ? " list-group-item-info " : ""; ?> "><?php _t("Banks lines"); ?></a> 
    <?php } ?>    

    <?php if (permissions_has_permission($u_rol, "banks_lines_check", "create")) { ?>
        <a href="index.php?c=banks_lines_check" class="list-group-item <?php echo ($c == 'banks_lines_check') ? " list-group-item-info " : ""; ?> "><?php _t("Banks lines check"); ?></a> 
    <?php } ?>    


    <?php if (permissions_has_permission($u_rol, "banks_lines_status", "create")) { ?>
        <a href="index.php?c=banks_lines_status" class="list-group-item <?php echo ($c == 'banks_lines_status') ? " list-group-item-info " : ""; ?>"><?php _t("Banks lines status"); ?></a> 
    <?php } ?>    


    <?php if (permissions_has_permission($u_rol, "banks_lines_tmp", "create")) { ?>
        <a href="index.php?c=banks_lines_tmp" class="list-group-item <?php echo ($c == 'banks_lines_tmp') ? " list-group-item-info " : ""; ?>"><?php _t("Banks lines templates"); ?></a> 
    <?php } ?>    

    <?php if (permissions_has_permission($u_rol, "banks_templates", "create")) { ?>
        <a href="index.php?c=banks_templates" class="list-group-item <?php echo ($c == 'banks_templates') ? " list-group-item-info " : ""; ?>"><?php _t("Banks templates"); ?></a> 
    <?php } ?>    


    <?php if (permissions_has_permission($u_rol, "banks_transactions", "create")) { ?>
        <a href="index.php?c=banks_transactions" class="list-group-item <?php echo ($c == 'banks_transactions') ? " list-group-item-info " : ""; ?>"><?php _t("Banks transactions"); ?></a> 
    <?php } ?>    

</div>


<?php
/**
 * 


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", 'banks'); ?>
  <?php echo _t("Banks"); ?>
  </a>
  <a href="index.php?c=banks" class="list-group-item"><?php _t("List"); ?></a>
  <?php if (permissions_has_permission($u_rol, "banks", "create")) { ?>
  <a href="index.php?c=banks&a=add" class="list-group-item"><?php _t("Add"); ?></a>
  <?php } ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By contact_id"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("contact_id") as $contact_id) {
  if ($contact_id['contact_id'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_contact_id&contact_id=' . $contact_id['contact_id'] . '" class="list-group-item">' . $contact_id['contact_id'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By bank"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("bank") as $bank) {
  if ($bank['bank'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_bank&bank=' . $bank['bank'] . '" class="list-group-item">' . $bank['bank'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By account_number"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("account_number") as $account_number) {
  if ($account_number['account_number'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_account_number&account_number=' . $account_number['account_number'] . '" class="list-group-item">' . $account_number['account_number'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By bic"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("bic") as $bic) {
  if ($bic['bic'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_bic&bic=' . $bic['bic'] . '" class="list-group-item">' . $bic['bic'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By iban"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("iban") as $iban) {
  if ($iban['iban'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_iban&iban=' . $iban['iban'] . '" class="list-group-item">' . $iban['iban'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By code"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("code") as $code) {
  if ($code['code'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By codification"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("codification") as $codification) {
  if ($codification['codification'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_codification&codification=' . $codification['codification'] . '" class="list-group-item">' . $codification['codification'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By delimiter"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("delimiter") as $delimiter) {
  if ($delimiter['delimiter'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_delimiter&delimiter=' . $delimiter['delimiter'] . '" class="list-group-item">' . $delimiter['delimiter'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By date_format"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("date_format") as $date_format) {
  if ($date_format['date_format'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_date_format&date_format=' . $date_format['date_format'] . '" class="list-group-item">' . $date_format['date_format'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By thousands_separator"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("thousands_separator") as $thousands_separator) {
  if ($thousands_separator['thousands_separator'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_thousands_separator&thousands_separator=' . $thousands_separator['thousands_separator'] . '" class="list-group-item">' . $thousands_separator['thousands_separator'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By decimal_separator"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("decimal_separator") as $decimal_separator) {
  if ($decimal_separator['decimal_separator'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_decimal_separator&decimal_separator=' . $decimal_separator['decimal_separator'] . '" class="list-group-item">' . $decimal_separator['decimal_separator'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By invoices"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("invoices") as $invoices) {
  if ($invoices['invoices'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_invoices&invoices=' . $invoices['invoices'] . '" class="list-group-item">' . $invoices['invoices'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "banks"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (banks_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=banks&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>