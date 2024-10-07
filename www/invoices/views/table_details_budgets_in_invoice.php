<table class="table table-striped">
    <thead>
        <tr>                     
            <th><?php _t("#"); ?></th>
            <th><?php _t("Budget"); ?></th>
            <th class="text-right"><?php // _t("Orders"); ?></th>
            <th class="text-right"><?php _t("THVA"); ?></th>  
            <th class="text-right"><?php _t("TVA"); ?></th>  
            <th class="text-right"><?php _t("TVAC"); ?></th>                                                                    
            <th class="text-right"><?php _t("SUM"); ?></th>                                                                    
        </tr>
    </thead>

    <tbody>

        <?php
        
        
        
        
        if (!isset($budgets)) {
            message("info", "No items");
        } else {

            $i = 1;

            $tvac = 0;
            $suma_total = 0;
            $suma_tax = 0;
            $suma = 0;

            $total_orders = 0;

            foreach ($budgets as $key => $budget) {

                $total = budgets_field_id('total', $budget['budget_id']);
                $tax = budgets_field_id('tax', $budget['budget_id']);
                $tvac = $total + $tax;

                //$total_orders = $total_orders + count(orders_budgets_list_orders_by_budget($budget['budget_id']));

                $suma_total = $suma_total + $total;
                $suma_tax = $suma_tax + $tax;
                ?>                
                <tr>
                    <td><?php echo "$i"; ?></td>
                    <td><a href="index.php?c=budgets&a=details&id=<?php echo "$budget[budget_id]"; ?>"><?php echo "$budget[budget_id]"; ?></a></td>
                    <td class="text-right"><?php // echo count(orders_budgets_list_orders_by_budget($budget['budget_id'])); ?></td>
                    <td class="text-right"><?php echo monedaf($total); ?></td>
                    <td class="text-right"><?php echo monedaf($tax); ?></td>
                    <td class="text-right"><?php echo monedaf($tvac); ?></td>
                    <td class="text-right"><?php echo monedaf($suma_total + $suma_tax); ?></td>
                </tr>


                <?php
                $i++;
            }
        }
        ?>	
        <tr>
            <td></td>
            <td class="text-right"><b><?php _t("Total"); ?></b></td>
            <td class="text-right"><b><?php echo $total_orders; ?></b></td>
            <td class="text-right"><b><?php echo monedaf($suma_total); ?></b></td>
            <td class="text-right"><b><?php echo monedaf($suma_tax); ?></b></td>
            <td class="text-right"><b><?php echo monedaf($suma_total + $suma_tax); ?></b></td>       
            <td></td>
        </tr>

    </tbody>
</table>


