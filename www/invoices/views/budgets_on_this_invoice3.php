<table class="table table-striped">
    <thead>
        <tr>         
            <th><?php _t("Order"); ?></th>  
            <th><?php _t("Budget"); ?></th>
            <th><?php _t("Invoice"); ?></th>               
            <th><?php _t("Date_registre"); ?></th>                    
            <th><?php _t("Cliente_id"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>                                                            
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>         
            <th><?php _t("Order"); ?></th> 
            <th><?php _t("Budget"); ?></th>
            <th><?php _t("Invoice"); ?></th>               
            <th><?php _t("Date_registre"); ?></th>                    
            <th><?php _t("Cliente_id"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>                                                            
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
    <tbody>

        <?php
        if (!budgets_invoices_list_budgets_by_invoice_id($id)) {
            message("info", "No items");

            //   vardump(budgets_invoices_list_budgets_by_invoice_id($id));
        } else {

            // vardump(budgets_invoices_list_budgets_by_invoice_id($id));
            //foreach ($liste_info as $address) {
            foreach (budgets_invoices_list_budgets_by_invoice_id($id) as $key => $budget) {

                $from_order = orders_budgets_search_order_by_budget($budget['id']);
                $invoice_id = budgets_invoices_search_invoice_by_budget_id($budget['id']);
                ?>                
                <tr>
                    <?php
                    /*  <td>

                      <div class="checkbox">
                      <label>
                      <input name="id[]" type="checkbox" id="uno" value="<?php echo "$budget[id]" ; ?>">
                      </label>
                      </div>


                      </td> */
                    ?>


                    <td><a href="index.php?c=orders&a=details&id=<?php echo "$from_order"; ?>"><?php echo "$from_order"; ?></a></td>

                    <td><a href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]"; ?>"><?php echo "$budget[id]"; ?></a></td>


                    <td><a href="index.php?c=invoices&a=details&id=<?php echo "$invoice_id"; ?>"><?php echo invoices_numberf($invoice_id); ?></a></td>

                    <?php
                    /*
                      <td><a href="index.php?c=invoices&a=details&id=<?php echo "$budget[invoice_id]" ; ?>"><?php echo "$budget[invoice_id]" ; ?></a></td>
                     */
                    ?>
                    <td><?php echo "$budget[date_registre]"; ?></td>

                    <td>
                        <a href="index.php?c=contacts&a=details&id=<?php echo $budget['client_id']; ?>">
                            <?php echo contacts_formated($budget['client_id']); ?>
                        </a>
                    </td>

                    <td class="text-right"><?php echo monedaf($budget['total'] + $budget['tax']); ?></td>
                    <td><?php echo budget_status_by_status($budget['status']); ?></td>


                    <td>
                        <a class="btn btn-primary btn-sm" href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]"; ?>">
                            <?php _t("Details"); ?>
                        </a>
                    </td>


                    <?php
                    /* <td>
                      <div class="dropdown">
                      <button
                      class="btn btn-default dropdown-toggle"
                      type="button"
                      id="dropdownMenu1"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="true">

                      <?php _t("Actions") ; ?>
                      <span class="caret"></span>
                      </button>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]" ; ?>"><?php _t("Details") ; ?></a></li>
                      <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]" ; ?>"><?php _t("Edit") ; ?></a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]" ; ?>"><?php _t("Pdf") ; ?></a></li>
                      </ul>
                      </div>
                      </td> */
                    ?>



                </tr>

                <?php
            }
        }
        ?>	





    </tbody>


</table>