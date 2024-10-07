<?php
//vardump(budgets_not_invoiced_by_company_id(invoices_field_id("client_id" , $id) , 30));

if (!budgets_not_invoiced_by_company_id(invoices_field_id("client_id", $id), 30)) {
    message('info', "No items");
} else {
    ?>

    <table class="table table-striped table-condensed">

        <thead>
            <tr>                            
                <th><?php _t("Budget"); ?></th>
                <th><?php _t("Date"); ?></th>    
                <th><?php _t("Client"); ?></th>    
                <th class="text-right"><?php _t("Total"); ?></th>
            </tr>                                               
        </thead>

        <tbody>
        <script>
            function sellectAll(source) {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i] != source)
                        checkboxes[i].checked = source.checked;
                }
            }
        </script>
        <form action="index.php" method="post" class="form-inline">                                                                                                                              
            <input type="hidden" name="c" value="invoices">                               
            <input type="hidden" name="a" value="ok_linesAddMonthly">                                 
            <input type="hidden" name="invoice_id" value="<?php echo "$id"; ?>"> 


            <?php
            $totalGeneral = 0;
            foreach (budgets_not_invoiced_by_company_id(invoices_field_id("client_id", $id), 30) as $key => $budget) {
                $totalGeneral = $totalGeneral + ($budget['total'] + $budget['tax']);
                ?>

                <tr>                                                                
                    <td>                        
                        <div class="checkbox">
                            <label>
                                <input name="id[]" type="checkbox" id="uno" value="<?php echo $budget['id']; ?>">
                                <?php echo $budget['id']; ?>
                            </label>
                        </div>
                    </td>                                                                                            

                    <td><?php echo $budget['date_registre']; ?></td>  

                    <td><?php echo contacts_formated($budget['client_id']); ?></td>                                
                    <td class="text-right"><?php echo moneda($budget['total'] + $budget['tax']); ?></td>

                </tr> 


            <?php } ?>

            <tr>
                <td>
                    <div class="form-group">
                        <label class="sr-only" for="all"></label>
                        <input 
                            type="checkbox" 
                            id="all" 
                            onclick="sellectAll(this);" /> 
                            <?php _t("Select all"); ?>
                    </div>

                </td>
                <td colspan="">
                    <button type="submit" class="btn btn-default"><?php _t("Add"); ?> >> </button>
                </td>
                <td colspan="2" class="text-right">
                    <?php echo moneda($totalGeneral); ?>
                </td>
            </tr>    



        </form>





    </tbody>                    


    </table>                    



<?php } ?>