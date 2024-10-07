<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>

    <div class="col-sm-10 col-md-10 col-lg-10">

        <?php include "nav_budgets.php"; ?>  

        <?php // include "nav_invoices.php"; ?>  


        <?php include "top_details_company.php"; ?>




        <?php
        if ($budgets) {

            if ($status == 10) {
                ?>

                <form class="form-inline" action="index.php" method="post" onsubmit='disableButton()'>
                    <input type="hidden" name="c" value="budgets">
                    <input type="hidden" name="a" value="ok_add_multi_budget_to_invoice">
                    <input type="hidden" name="uniqid" value="<?php echo magia_uniqid(); ?>">
                    <input type="hidden" name="redi" value="1">

                    <?php include "table_contacts_budgets.php"; ?>

                    <?php //message("info", "If you want to change the status of several orders at the same time, the selected ones must have the same delivery address");   ?>

                    <div class="form-group">

                        <label class="sr-only" for="all"></label>

                        <input 
                            type="checkbox" 
                            id="all" 
                            onclick="sellectAll(this);" 
                            checked=""

                            />                 
                            <?php _t("Select all"); ?>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for=""></label>
                        <?php // el numero de la factura a la cual se debe agregar   ?>
                        <select class="form-control" name="invoice_id">
                            <option value="false"><?php _t("Add to invoice"); ?></option>
                            <?php
                            /**
                             *                         <option value="new"><?php _t("Create a new"); ?></option>
                             */
                            ?>

                            <?php
                            $i = 1;
                            // Mostrar solo con estatus draf
                            //foreach (budgets_search_by_client_id_status($id, 10) as $key => $budgets_id) {
                            foreach (invoices_search_by_client_id_status($id, 0) as $key => $invoice_id) {
                                $date_registre = magia_dates_formated($invoice_id['date_registre']);

//                                $total_orders_in_budget = count(orders_budgets_list_orders_by_budget($invoice_id['id']));

                                $invoice_status = invoice_status_by_status($invoice_id['status']);

                                $company_name = contacts_formated($invoice_id['client_id']);

//                                echo '<option value="' . $invoice_id['id'] . '">' . $invoice_id['id'] . ' - ' . $invoice_id['type'] . ' - ' . $date_registre . ' (' . $total_orders_in_budget . ') - ' . _tr($invoice_status) . ' - ' . $company_name . '</option>';
                                echo '<option value="' . $invoice_id['id'] . '">' . $invoice_id['id'] . ' - ' . $invoice_id['type'] . ' - ' . $date_registre . ' ' . _tr($invoice_status) . ' - ' . $company_name . '</option>';
                                $i++;
                            }
                            ?>

                        </select>
                    </div>

                    <?php
                    // esto desactiva el boton si se hace clic
                    // pongo esto en el footer para desactivar botones en donde sea 
                    ?>
                    <script>
                        //            function disableButton() {
                        //              var btn = document.getElementById('btn_send');
                        //            btn.disabled = true;
                        //          btn.innerText = 'Sending.....'
                        }
                    </script>
                    <button type="submit" id="btn_send" class="btn btn-default"><?php _t("Add"); ?></button>        
                </form>
                <?php
            } else {
                include "table_contacts_budgets.php";
            }
        } else {

            message('info', 'No items');
        }
        ?>



    </div>
</div>
<?php include view("home", "footer"); ?>  







