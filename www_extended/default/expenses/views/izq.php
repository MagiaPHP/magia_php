<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "id" => null,
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => null,
            "redi" => array(
                "redi" => "30",
                "c" => $c,
                "id" => null 
            )
        ),
    );

    tasks_create_html('tmp_izq_index', $args);
}
?>


<?php include view("accounting", "izq"); ?>


<?php
foreach (panels_search_controller_action_status($c, 'index', 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas['id']);
    // include ""; 
    include $panel->getPanel() . '.php';
}
?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By offices"); ?>
    </a>

    <a href="index.php?c=expenses" class="list-group-item"><?php _t("All"); ?></a>
    <?php
    foreach (offices_list_by_headoffice($u_owner_id) as $office) {
        if ($office['id'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_office_id&office_id=' . $office['id'] . '" class="list-group-item">' . contacts_formated($office['id']) . '</a>';
        }
    }
    ?>
</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'expenses'); ?>
        <?php echo _t("Purchase invoices"); ?>
    </a>
    <a href="index.php?c=expenses" class="list-group-item"><?php echo icon("list"); ?> <?php _t("List"); ?></a>


    <a href="index.php?c=expenses_categories" class="list-group-item"><?php _menu_icon("top", 'expenses'); ?> <?php _t("Expenses categories"); ?></a>

    <?php if (permissions_has_permission($u_rol, 'banks_lines', 'read') && modules_field_module('status', 'banks_lines')) { ?>
        <a href="index.php?c=banks_lines" class="list-group-item"><?php _menu_icon("top", 'banks_lines'); ?> <?php _t("Bank lines"); ?></a>
    <?php } ?>


</div>

<?php
/**
 * 
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", 'expenses'); ?>

  <?php echo _t("Categories"); ?>
  </a>
  <a href="index.php?c=expenses_categories" class="list-group-item"><?php echo icon("list"); ?> <?php _t("List"); ?></a>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", 'banks_lines'); ?>

  <?php echo _t("Banks lines"); ?>
  </a>
  <a href="index.php?c=banks_lines" class="list-group-item"><?php echo icon("list"); ?> <?php _t("List"); ?></a>
  </div>
 */
?>
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
//    foreach (expenses_unique_from_col("status") as $status) {
    foreach (expenses_status_list_by_status(1) as $status) {


        $icon_status = ($status['icon']) ? icon($status['icon']) : "";

        $total_by_category = (expenses_total_by_status($status['code']) > 0) ? '<span class="badge">' . expenses_total_by_status($status['code']) . '</span>' : '';
        //if ($status['status'] != "") {
        echo '<a href="index.php?c=expenses&a=search&w=by_status&status=' . $status['code'] . '" class="list-group-item">' . $icon_status . ' ' . _tr($status['name']) . ' ' . $total_by_category . '</a>';
        //}
    }

    echo '<a href="index.php?c=expenses_status&" class="list-group-item">' . _tr("Colors configuration") . '</a>';
    ?>


</div>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses"); ?>
        <?php echo _t("By category"); ?>
    </a>
    <?php
    foreach (expenses_unique_from_col("category_code") as $category_code) {

        $total_by_category_code = (expenses_total_by_category_code($category_code['category_code']) > 0) ? '<span class="badge">' . expenses_total_by_category_code($category_code['category_code']) . '</span>' : '';

        if ($category_code['category_code'] != "") {
            echo '<a href="index.php?c=expenses&a=search&w=by_category_code&category_code=' . $category_code['category_code'] . '" class="list-group-item">' . expenses_categories_field_code('category', $category_code['category_code']) . ' ' . $total_by_category_code . '</a>';
        }
    }
    ?>
</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'contacts'); ?>
        <?php echo _t("By providers"); ?>
    </a>

    <?php
    foreach (expenses_unique_from_col('provider_id') as $key => $eufc) {
        echo '<a href="index.php?c=expenses&a=search&w=by_provider_id&provider_id=' . $eufc['provider_id'] . '" class="list-group-item">' . icon("user") . ' ' . contacts_formated($eufc['provider_id']) . '</a>';
    }
    ?>       
</div>





<?php
if (
// si user can cofig the system?
        permissions_has_permission($u_rol, 'config', 'update') &&
        // module panel is actived?
        modules_field_module('status', "panels")) {
    ?>

    <?php include view('panels', 'panel_form_ok_show') ?>

<?php } ?>



<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
/**
 * <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">
  <?php _t("Search"); ?>
  </h3>
  </div>
  <div class="panel-body">


  <form  action="index.php" method="get">

  <input type="hidden" name="c" value="expenses">
  <input type="hidden" name="a" value="search">
  <input type="hidden" name="w" value="short">


  <div class="form-group">
  <label for="provider_id">
  <?php _t("Provider"); ?>
  </label>

  <select class="form-control selectpicker" data-live-search="true" name="provider_id" required="">
  <option value="all"><?php _t("All"); ?></option>

  <?php foreach (contacts_headoffice_list(array("order_by" => 'ORDER BY name ASC')) as $key => $headoffice) { ?>
  <option value="<?php echo $headoffice['owner_id']; ?>">
  <?php echo contacts_formated($headoffice['owner_id']); ?>
  </option>
  <?php } ?>
  </select>

  </div>

  <div class="form-group">
  <label for="year"><?php _t('Year'); ?></label>
  <select class="form-control" name="year">
  <?php
  for ($i = 2021; $i < date('Y') + 1; $i++) {
  // selecciono el año presente
  $selected = ($i == date('Y')) ? " selected " : "";
  echo '<option value="' . $i . '"  ' . $selected . '  >' . $i . '</option>';
  }
  ?>
  </select>
  </div>

  <div class="form-group">
  <label for="trimester">
  <?php _t("Trimester"); ?>
  </label>
  <?php
  $selected_1 = false;
  $selected_2 = false;
  $selected_3 = false;
  $selected_4 = false;

  switch (date("m")) {
  case "01":
  case "02":
  case "03":
  $selected_1 = " selected ";
  break;

  case "04":
  case "05":
  case "06":
  $selected_2 = " selected ";
  break;

  case "07":
  case "08":
  case "09":
  $selected_3 = " selected ";
  break;

  case "10":
  case "11":
  case "12":
  $selected_4 = " selected ";
  break;

  default:
  break;
  }
  ?>


  <select class="form-control" name="m">

  <?php
  for ($i = 1; $i < 13; $i++) {

  $selected = ($i == date('n')) ? " selected " : "";
  ?>
  <option value="<?php echo $i; ?>"   <?php // echo $selected;                                ?>   ><?php echo _tr(magia_dates_month($i)); ?></option>
  <?php } ?>

  <option value="null" disabled=""><?php _t("By Trimester"); ?></option>

  <option value="t1" <?php echo $selected_1 ?>>
  <?php _t("January"); ?>,
  <?php _t("February"); ?>,
  <?php _t("March"); ?>
  </option>
  <option value="t2" <?php echo $selected_2 ?>>
  <?php _t("April"); ?>,
  <?php _t("May"); ?>,
  <?php _t("June"); ?>
  </option>
  <option value="t3" <?php echo $selected_3 ?>>
  <?php _t("July"); ?>,
  <?php _t("August"); ?>,
  <?php _t("September"); ?>
  </option>
  <option value="t4" <?php echo $selected_4 ?>>
  <?php _t("October"); ?>,
  <?php _t("November"); ?>,
  <?php _t("December"); ?>
  </option>
  </select>
  </div>


  <?php
  foreach (expenses_status_list() as $key => $ist) {
  echo ' <div class="checkbox" >
  <label>
  <input type="checkbox" name="status[]" value="' . $ist['code'] . '" checked> ' . $ist['name'] . '
  </label>
  </div>';
  }
  ?>

  <button type="submit" class="btn btn-default">
  <span class="glyphicon glyphicon-search"></span>
  <?php _t("Search"); ?>
  </button>
  </form>

  </div>
  </div>



  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By provider_id"); ?>
  </a>

  <a href="index.php?c=expenses" class="list-group-item"><?php _t("All"); ?></a>



  <?php
  foreach (expenses_unique_from_col("provider_id") as $provider_id) {
  if ($provider_id['provider_id'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_provider_id&provider_id=' . $provider_id['provider_id'] . '" class="list-group-item">' . contacts_formated($provider_id['provider_id']) . '</a>';
  }
  }
  ?>
  </div>



  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By invoice_number"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("invoice_number") as $invoice_number) {
  if ($invoice_number['invoice_number'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_invoice_number&invoice_number=' . $invoice_number['invoice_number'] . '" class="list-group-item">' . $invoice_number['invoice_number'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By budget_id"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("budget_id") as $budget_id) {
  if ($budget_id['budget_id'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_budget_id&budget_id=' . $budget_id['budget_id'] . '" class="list-group-item">' . $budget_id['budget_id'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By credit_note_id"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("credit_note_id") as $credit_note_id) {
  if ($credit_note_id['credit_note_id'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_credit_note_id&credit_note_id=' . $credit_note_id['credit_note_id'] . '" class="list-group-item">' . $credit_note_id['credit_note_id'] . '</a>';
  }
  }
  ?>
  </div>



  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By seller_id"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("seller_id") as $seller_id) {
  if ($seller_id['seller_id'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_seller_id&seller_id=' . $seller_id['seller_id'] . '" class="list-group-item">' . $seller_id['seller_id'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By clon_from_id"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("clon_from_id") as $clon_from_id) {
  if ($clon_from_id['clon_from_id'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_clon_from_id&clon_from_id=' . $clon_from_id['clon_from_id'] . '" class="list-group-item">' . $clon_from_id['clon_from_id'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By title"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("title") as $title) {
  if ($title['title'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By addresses_billing"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("addresses_billing") as $addresses_billing) {
  if ($addresses_billing['addresses_billing'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_addresses_billing&addresses_billing=' . $addresses_billing['addresses_billing'] . '" class="list-group-item">' . $addresses_billing['addresses_billing'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By addresses_delivery"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("addresses_delivery") as $addresses_delivery) {
  if ($addresses_delivery['addresses_delivery'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_addresses_delivery&addresses_delivery=' . $addresses_delivery['addresses_delivery'] . '" class="list-group-item">' . $addresses_delivery['addresses_delivery'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By date"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("date") as $date) {
  if ($date['date'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By date_registre"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("date_registre") as $date_registre) {
  if ($date_registre['date_registre'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By deadline"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("deadline") as $deadline) {
  if ($deadline['deadline'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_deadline&deadline=' . $deadline['deadline'] . '" class="list-group-item">' . $deadline['deadline'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By total"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("total") as $total) {
  if ($total['total'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_total&total=' . $total['total'] . '" class="list-group-item">' . $total['total'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By tax"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("tax") as $tax) {
  if ($tax['tax'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_tax&tax=' . $tax['tax'] . '" class="list-group-item">' . $tax['tax'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By advance"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("advance") as $advance) {
  if ($advance['advance'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_advance&advance=' . $advance['advance'] . '" class="list-group-item">' . $advance['advance'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By balance"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("balance") as $balance) {
  if ($balance['balance'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_balance&balance=' . $balance['balance'] . '" class="list-group-item">' . $balance['balance'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By comments"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("comments") as $comments) {
  if ($comments['comments'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_comments&comments=' . $comments['comments'] . '" class="list-group-item">' . $comments['comments'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By comments_private"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("comments_private") as $comments_private) {
  if ($comments_private['comments_private'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_comments_private&comments_private=' . $comments_private['comments_private'] . '" class="list-group-item">' . $comments_private['comments_private'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By r1"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("r1") as $r1) {
  if ($r1['r1'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_r1&r1=' . $r1['r1'] . '" class="list-group-item">' . $r1['r1'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By r2"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("r2") as $r2) {
  if ($r2['r2'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_r2&r2=' . $r2['r2'] . '" class="list-group-item">' . $r2['r2'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By r3"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("r3") as $r3) {
  if ($r3['r3'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_r3&r3=' . $r3['r3'] . '" class="list-group-item">' . $r3['r3'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By fc"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("fc") as $fc) {
  if ($fc['fc'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_fc&fc=' . $fc['fc'] . '" class="list-group-item">' . $fc['fc'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By date_update"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("date_update") as $date_update) {
  if ($date_update['date_update'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_date_update&date_update=' . $date_update['date_update'] . '" class="list-group-item">' . $date_update['date_update'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By days"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("days") as $days) {
  if ($days['days'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_days&days=' . $days['days'] . '" class="list-group-item">' . $days['days'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By ce"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("ce") as $ce) {
  if ($ce['ce'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_ce&ce=' . $ce['ce'] . '" class="list-group-item">' . $ce['ce'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By code"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("code") as $code) {
  if ($code['code'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By type"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("type") as $type) {
  if ($type['type'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By every"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("every") as $every) {
  if ($every['every'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_every&every=' . $every['every'] . '" class="list-group-item">' . $every['every'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By times"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("times") as $times) {
  if ($times['times'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_times&times=' . $times['times'] . '" class="list-group-item">' . $times['times'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By date_start"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("date_start") as $date_start) {
  if ($date_start['date_start'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_date_start&date_start=' . $date_start['date_start'] . '" class="list-group-item">' . $date_start['date_start'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By date_end"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("date_end") as $date_end) {
  if ($date_end['date_end'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_date_end&date_end=' . $date_end['date_end'] . '" class="list-group-item">' . $date_end['date_end'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (expenses_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=expenses&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>


