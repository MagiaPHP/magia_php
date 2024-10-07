<?php
//
if (!budgets_invoices_list_budgets_by_invoice_id($id)) {
    message("info", "Not items");
} else {
    ?>


    <table class="table table-striped">
        <thead>
            <tr>                            
                <th></th>
                <th><?php _t("Budget"); ?></th>
                <th><?php _t("Date"); ?></th>    
                <th><?php _t("Client"); ?></th>    
                <th class="text-right"><?php _t("Total"); ?></th>                                                                                 
            </tr>                                               
        </thead>

        <tbody>

            <?php
            $totalGeneral = 0;

            foreach (budgets_invoices_list_budgets_by_invoice_id($id) as $budget) {
                $totalGeneral = $totalGeneral + ($budget['total'] + $budget['tax']);
                ?>

            <form action="index.php" method="post" class="form-inline">                                                                                                                              
                <input type="hidden" name="c" value="invoices">                               
                <input type="hidden" name="a" value="ok_linesDeleteMonthly">                                 
                <input type="hidden" name="budget_id" value="<?php echo "$budget[id]"; ?>"> 
                <input type="hidden" name="invoice_id" value="<?php echo $id; ?>"> 

                <tr>  
                    <td colspan="">
                        <button type="submit" class="btn btn-default"><< <?php _t("Remove"); ?>
                            <?php echo "$budget[id]"; ?>
                        </button>
                    </td>

                    <td>                        
                        <?php echo $budget['id']; ?>
                    </td> 

                    <td><?php echo $budget['date_registre']; ?></td>   

                    <td><?php echo contacts_formated($budget['client_id']); ?></td>  

                    <td class="text-right"><?php echo moneda($budget['total'] + $budget['tax']); ?></td>
                </tr> 


            </form>




        <?php } ?>

        <tr>
            <td colspan="5" class="text-right">
                <?php echo moneda($totalGeneral); ?>
            </td>
        </tr>    

    </tbody>                    

    </table>                    

<?php } ?>