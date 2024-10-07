<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>




<div>



    <?php
    /*
      <form class="navbar-form navbar-right" method="get" action="index.php">
      <input type="hidden" name="c" value="<?php echo $c; ?>">
      <input type="hidden" name="a" value="<?php echo $a; ?>">
      <input type="hidden" name="id" value="<?php echo $id; ?>">



      <div class="form-group">
      <select class="form-control" name="status">
      <?php
      for ($y = $config_start_year; $y <= date('Y'); $y++) {
      $selected = (date("Y") == $y) ? " selected " : "";
      ?>
      <option value="<?php echo $y; ?>" <?php echo $selected; ?>><?php echo $y;  ?></option>
      <?php } ?>
      </select>
      </div>
      <div class="form-group">
      <select class="form-control" name="status">
      <?php
      for ($m = 1; $m < 13; $m++) {
      $selected = (date("m") == $m) ? " selected " : "";
      ?>
      <option value="<?php echo $m; ?>" <?php echo $selected; ?>><?php echo _tr(magia_dates_month($m)) ?></option>
      <?php } ?>
      </select>
      </div>
      <div class="form-group">
      <select class="form-control" name="status">
      <?php
      for ($d = 1; $d < 31; $d++) {
      $selected = (date('d') == $d) ? " selected " : "";
      ?>
      <option value="<?php echo $d; ?>" <?php echo $selected; ?>><?php echo $d; ?></option>
      <?php } ?>
      </select>
      </div>

      <div class="form-group">
      <select class="form-control" name="status">
      <option value="all"><?php _t("All"); ?> (<?php echo invoices_total_by_client_id($id); ?>)</option>

      <?php
      foreach (invoice_status_list() as $key => $status_items) {

      $selected = ($status_items['code'] == $status) ? " selected " : "";

      $total = invoices_total_by_client_id_status($id, $status_items['code']);
      ?>
      <option value="<?php echo $status_items['code']; ?>" <?php echo $selected; ?>><?php _t($status_items['status']); ?> <?php echo ($total) ? "($total)" : ""; ?></option>
      <?php } ?>
      </select>
      </div>


      <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
      </form>

     */
    ?>



    <?php if (permissions_has_permission($u_rol, "isssssssssssnvoices", "create")) { ?>    
        <button 
            type="button" 
            class="btn btn-primary navbar-btn navbar-right" 
            data-toggle="modal" 
            data-target="#contacts_invoices_add"
            >
            <span class="glyphicon glyphicon-plus-sign"></span>
            <?php _t("New"); ?>
        </button>


        <div class="modal fade" 
             id="contacts_invoices_add" 
             tabindex="-1" 
             role="dialog" 
             aria-labelledby="contacts_invoices_addLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button 
                            type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="contacts_invoices_addLabel">
                            <?php _t("Add new invoice"); ?>    
                        </h4>
                    </div>
                    <div class="modal-body">
                        <?php include "form_contacts_invoices_add.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>    

</div>


<?php
/**
  <nav class="navbar navbar-default">
  <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="index.php?c=contacts&a=balance&id=<?php echo $id; ?>">
  <?php _menu_icon("top", "balance"); ?>
  <?php _t("Balance"); ?>
  </a>
  </div>
  </div>
  </nav>
 * 
 */
?>


