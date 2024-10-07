<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">

                <?php _menu_icon("top", 'contacts'); ?>


                <?php _t("Provider") ?>
            </div>
            <div class="panel-body">
                <?php
                if (!permissions_has_permission($u_rol, 'expenses', 'update')) {
                    echo $expense->getInvoice_number();
                } else {
//                    include "form_invoice_number_update.php";
//                    include "form_provider_id_update.php";
                    // include "form_provider_id_invoice_number_update.php";
                }
                echo contacts_formated($expense->getProvider_id());
                ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-<?php echo ($expense->getDate()) ? "default" : "primary"; ?>">
            <div class="panel-heading">
                <?php echo icon("calendar"); ?>
                <?php _t("Invoice date"); ?>
            </div>
            <div class="panel-body">               
                <?php
                if (permissions_has_permission($u_rol, 'expenses', 'update') && $a != 'registre_payement') {
                    include "form_date_update.php";
                } else {
                    echo $expense->getDate();
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-<?php echo ($expense->getDeadline()) ? "default" : "primary"; ?>">
            <div class="panel-heading">
                <?php echo icon("calendar"); ?>
                <?php _t("Date deadline"); ?>
            </div>
            <div class="panel-body">               
                <?php
                if (permissions_has_permission($u_rol, 'expenses', 'update') && $a != 'registre_payement') {
                    include "form_deadline_update.php";
                } else {
                    echo $expense->getDeadline();
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-<?php echo ($expense->getInvoice_number()) ? "default" : "primary"; ?>">
            <div class="panel-heading">

                <?php _menu_icon("top", 'invoices'); ?>

                <?php _t("Invoice number"); ?>

            </div>
            <div class="panel-body">               
                <?php
                if (permissions_has_permission($u_rol, 'expenses', 'update') && $a != 'registre_payement') {
                    include "form_invoice_number_update.php";
                } else {
                    echo $expense->getInvoice_number();
                }
                ?>
            </div>
        </div>
    </div>
</div>


<?php
/**
 * 
  <div class="panel panel-<?php echo ($expense->getTitle()) ? "default" : "primary"; ?>">
  <div class="panel-heading">
  <h3 class="panel-title">
  <?php _t("Title"); ?>
  </h3>
  </div>
  <div class="panel-body">
  <?php echo $expense->getTitle(); ?>

  <?php
  if (!permissions_has_permission($u_rol, 'expenses', 'update')) {
  echo $expense->getDate();
  } else {
  include "form_title_update.php";
  }
  ?>
  </div>
  </div>
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">        
        <?php _t("Items"); ?>                                                                                
        <?php
        if (permissions_has_permission($u_rol, 'config', "update")) {
            include "2_cols_modal_edit.php";
        }
        ?>
    </div>
    <div class="panel-body">
        <?php
//        vardump($expense->getLines());
//        vardump($expense);

        if ($expense->getLines() == NULL) {
            include "part_details_add_total_tva.php";
        } else {
            include "part_details_table_items.php";
        }
        ?>


    </div>
</div>

