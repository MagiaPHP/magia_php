
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

                $full_tax = 0;
                $full_total = 0;

                //foreach ($liste_info as $address) {
                foreach ($budgets as $id) {



                    $client_id = budgets_field_id("client_id", $id);
                    $status = budgets_field_id("status", $id);
                    $full_tax = $full_tax + budgets_field_id("tax", $id);
                    $full_total = $full_total + budgets_field_id("total", $id);
                    $status = budgets_field_id("status", $id);
                    ?>                
                    <tr>
                        <td>1</td>
                        <td><?php echo _t("Budget") . " $id"; ?></td>
                        <td class="text-right"><?php echo monedaf(budgets_field_id('total', $id)); ?></td>
                        <td class="text-right"><?php echo monedaf(budgets_field_id('tax', $id)); ?></td>
                        <td class="text-right"><?php echo monedaf(budgets_field_id('total', $id) + budgets_field_id('tax', $id)); ?></td>

                    </tr>

                    <?php
                }
            }
            ?>	





        </tbody>

        <tr>
            <td colspan="4" class="text-right"><?php _t("Total"); ?></td>                    
            <td class="text-right"><?php echo moneda($full_total); ?></td>
        </tr>

        <tr>
            <td colspan="4" class="text-right"><?php _t("Tax"); ?></td>                    
            <td class="text-right"><?php echo moneda($full_tax); ?></td>
        </tr>

        <tr>
            <td colspan="4" class="text-right"><?php _t("Tvac"); ?></td>                    
            <td class="text-right"><?php echo moneda($full_total + $full_tax); ?></td>
        </tr>


    </table>

</form>

