<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Invoices related"); ?></div>
    <div class="panel-body">
        <p><?php _t("List of invoices created from this budget"); ?></p>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Invoice"); ?></th>    
                    <th class="text-right"><?php _t("Invoiced"); ?></th>
                </tr>
            </thead>

            <tbody>


                <?php
                //  echo vardump(budgets_total_by_budget_id($id)); 
                //foreach ( budget_invoices_list_by_budget_id($id) as $key => $value ) {
                //foreach ( budgets_invoices_search_invoice_id_by_budget($id) as $key => $value ) {
                //
                foreach (budgets_invoices_search_invoice_by_budget_id($id) as $key => $value) {

//                                $total = $value['total'] + $value['tax'] ;
//                                $totalBudget = budgets_field_id('total' , $id) + budgets_field_id("tax" , $id) ;
//                                $porcent = ( $total * 100 ) / $totalBudget ;
//                                $porcent = number_format($porcent , 2 , "," , "") ;
                    ?>
                    <tr>
                        <td><?php echo "$ value[invoice_id]"; ?></td>
                        <td class="text-right">
                            <?php //echo monedaf(invoices_field_id("total" , $value['invoice_id']) + invoices_field_id("tax" , $value['invoice_id'])) ; ?>
                        </td>
                        <td></td>
                    </tr>
                <?php } ?>
            </tbody>


            <tfoot>
                <tr>
                    <th><?php _t("Total invoiced"); ?></th>
                    <th class="text-right"><?php echo monedaf(1000) ?></th>
                </tr>
            </tfoot>
        </table>


    </div>
</div>

