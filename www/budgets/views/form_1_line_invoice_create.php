

<form method="get" action="index.php" class="form-inline">
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_invoice_create_mensual">

    <table class="table table-striped">
        <thead>
            <tr>                                 
                <th><?php _t("Quantity"); ?></th>
                <th><?php _t("Description"); ?></th>                  
                <th class="text-right"><?php _t("Subtotal"); ?></th>    
                <th class="text-right"><?php _t("Tax"); ?></th>    
                <th class="text-right"><?php _t("TVAC"); ?></th>    
            </tr>
        </thead>
        <tfoot>


        </tfoot>
        <tbody>

            <?php
            if (!isset($budgets)) {
                message("info", "No items");
            } else {
                ?>                

                <tr>
                    <td>1</td>                    
                    <td><input type="text" class="form-control" name="description" value="<?php _t("Budgets"); ?>"></td>                            
                    <td class="text-right"><?php echo monedaf($total); ?></td>
                    <td class="text-right"><?php echo monedaf($tax); ?></td>
                    <td class="text-right"><?php echo monedaf($total + $tax); ?></td>

                </tr>


            <?php } ?>	





        </tbody>

        <tr>
            <td colspan="4" class="text-right"><?php _t("Total"); ?></td>                    
            <td class="text-right"><?php echo moneda($total); ?></td>
        </tr>

        <tr>
            <td colspan="4" class="text-right"><?php _t("Tax"); ?></td>                    
            <td class="text-right"><?php echo moneda($tax); ?></td>
        </tr>

        <tr>
            <td colspan="4" class="text-right"><?php _t("Tvac"); ?></td>                    
            <td class="text-right"><?php echo moneda($total + $tax); ?></td>
        </tr>


    </table>

</form>

