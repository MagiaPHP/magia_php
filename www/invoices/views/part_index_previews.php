<?php

/**
 * <form class="form-inline" action="index.php" method="get" target="_print" onsubmit='disableButton()'>
  <input type="hidden" name="c" value="invoices">
  <input type="hidden" name="a" value="export_pdf_multi">
  <input type="hidden" name="uniqid" value="<?php echo magia_uniqid(); ?>">
  <input type="hidden" name="redi" value="1">

 */
?>

<?php include view('invoices', 'table_index_previews'); ?>

<?php

/**
 *    <div class="form-group">
  <label class="" for="all"><?php _t("Select all"); ?></label>
  <input type="checkbox" name="all" id="all" onclick="sellectAll(this);" />
  </div>

  <div class="form-group">
  <label class="sr-only" for=""></label>
  <select class="form-control" name="add_to">
  <option value="print"><?php _t("Print selected items"); ?></option>
  </select>
  </div>
  <div class="form-group">
  <label class="sr-only" for="all"></label>
  <input type="checkbox" name="resumen" value="1"  />
  <?php _t("Resumen"); ?>
  </div>

  <button type="submit" id="btn_send" class="btn btn-default"><?php _t("Ok"); ?></button>
  </form>

 */
?>
<?php

$pagination->createHtml();
?>

