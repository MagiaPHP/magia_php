<div>
    <ul class="nav nav-tabs" role="tablist">

        <?php
        /**
         *         <li role="presentation" >
          <a href="#notInvoice" aria-controls="notInvoice" role="tab" data-toggle="tab">
          <?php _t("Not Invoice"); ?>
          </a>
          </li>

         */
        ?>
        <li role="presentation" <?php echo (!budgets_invoices_list_invoice_by_budget_id($id)) ? 'class="active" ' : ''; ?> >
            <a href="#one" aria-controls="one" role="tab" data-toggle="tab">
                <?php _t("Individual Invoice"); ?>
            </a>
        </li>


        <?php if (_options_option('config_budgets_create_partials_invoices')) { ?>
            <li role="presentation" <?php echo (budgets_invoices_list_invoice_by_budget_id($id)) ? 'class="active" ' : ''; ?> >
                <a href="#partial" aria-controls="partial" role="tab" data-toggle="tab">
                    <?php _t("Partial invoices"); ?>
                </a>
            </li>
        <?php } ?>



        <?php if (_options_option('config_invoices_monthly')) { ?>
            <li role="presentation" class="">
                <a href="#monthly" aria-controls="existing" role="tab" data-toggle="tab">
                    <?php _t("Monthly invoice"); ?>
                </a>
            </li>
        <?php } ?>

    </ul>





    <div class="tab-content">

        <?php
        /**
         * 
          <div role="tabpanel" class="tab-pane" id="notInvoice">
          <h3><?php _t("Not invoice"); ?></h3>
          <p><?php _t('Register as accepted, but do not create invoice, the invoice will be created later'); ?></p>
          <?php
          if ($budgets['status'] == 30) {
          message("info", "Budget alrerady accepted");
          } else {
          if (budgets_invoices_list_invoice_by_budget_id($id)) {
          message('info', "If there are one or more invoices created from this budget, this option is not available");
          } else {
          include "form_invoice_create_later.php";
          }
          }
          ?>
          </div>

         */
        ?>


        <div role="tabpanel" class="tab-pane <?php echo (!budgets_invoices_list_invoice_by_budget_id($id)) ? " active " : ""; ?>" id="one">
            <h3><?php // _t("Individual invoice");  ?></h3>
            <p><?php _t("Register as accepted and create an individual invoice"); ?></p>
            <p><?php message("info", "You will not be able to cancel this later"); ?></p>         
            <?php
            if (budgets_invoices_list_invoice_by_budget_id($id)) {
                message('info', "If there are one or more invoices created from this budget, this option is not available");
            } else {
                include "form_invoice_create_individual.php";
            }
            ?>
        </div>




        <?php if (_options_option('config_budgets_create_partials_invoices')) { ?>

            <div role="tabpanel" class="tab-pane <?php echo (budgets_invoices_list_invoice_by_budget_id($id)) ? " active " : ""; ?> " id="partial">
                <h3>
                    <?php _t("Create a partial invoice"); ?>
                </h3>

                <p>
                    <?php _t("With this option you can create several partial invoices, up to 100% of the budgeted amount"); ?>
                </p>

                <?php
                if (budgets_invoices_list_invoice_by_budget_id($id)) {
                    include "table_partials_invoices.php";
                }
                ?>


                <?php
                if (count(budget_lines_list_tax_budget_id($id)) == 1) {
                    echo "<h2>" . _tr('New invoice') . "</h2>";
                    include "form_invoice_create_partial.php";
                } else {
                    message('info', 'There must be only one type of VAT to use this option');
                }
                ?>
            </div> 

        <?php } ?>





        <?php if (_options_option('config_invoices_monthly')) { ?>
            <div role="tabpanel" class="tab-pane " id="monthly">
                <h3><?php _t("Monthly invoice"); ?></h3>            
                <p><?php _t("Register as accepted and add this budget to the monthly invoice of this company"); ?></p>
                <p><?php _t("This may change later"); ?></p>

                <?php
                // lista de facturas mensuales 
                // lista de facturas mensuales 
                // lista de facturas mensuales 
                // 
                // LISTA DE FACTURAS CON ESTATUS 0 // DRAFT                
                $montly_invoices_draft = invoices_search_by_client_id_type_status(offices_headoffice_of_office(budgets_field_id("client_id", $id)), "M", 0);

                // Lista de facturas con status 10 // REGISTRADAS
                $montly_invoices_registred = invoices_search_by_client_id_type_status(offices_headoffice_of_office(budgets_field_id("client_id", $id)), "M", 10);

                // a pedido de Jon solo muestro los draf
                // pongo a cero 
                $montly_invoices_registred = array();

                // agrego las registradas a las borrador 
                $montly_invoices = array_merge($montly_invoices_draft, $montly_invoices_registred);

                //vardump(offices_headoffice_of_office(budgets_field_id("client_id" , $id))); 
                //  include "tab_invoices_monthly.php" ;

                if ($montly_invoices) {
                    if (budgets_invoices_list_invoice_by_budget_id($id)) {
                        message('info', "If there are one or more invoices created from this budget, this option is not available");
                    } else {
                        include "form_add_to_existing_invoice.php";
                    }
                } else {
                    message('info', "This company does not have monthly invoices with proper status");
                    ?>

                    <h3><?php _t("Create a monthly invoice"); ?></h3>      

                    <p><?php _t("You can create a monthly invoice here"); ?></p>


                    <form class="form-horizontal" action="index.php" method="post" >
                        <input type="hidden" name="c" value="invoices">
                        <input type="hidden" name="a" value="ok_add">
                        <input type="hidden" name="budget_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="client_id" value="<?php echo $budgets['client_id']; ?>">
                        <input type="hidden" name="type" value="M">
                        <input type="hidden" name="redi" value="1">


                        <div class="form-group">
                            <label class="control-label col-sm-2" for=""></label>
                            <div class="col-sm-12">    
                                <input class="btn btn-primary active" type ="submit" value ="<?php _t("Create an invoice"); ?>">
                            </div>      							
                        </div>      							

                    </form>

                <?php } ?>                                                
            </div>

        <?php } ?>


    </div>
</div>
