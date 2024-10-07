        
<table class="table table-striped">           
    <thead>
        <tr>                    
            <th><?php _t("#"); ?></th>    
            <th><?php _t("Code"); ?></th>    
            <th><?php _t("Product name"); ?></th>  
            <th><?php _t("Quantity"); ?></th>              
            <th class="text-right"><?php _t("SubTotal"); ?></th>  
            <th class="text-right"><?php _t("Discounts"); ?></th>  
            <th class="text-right"><?php _t("Total"); ?></th>       

        </tr>
    </thead>
    <tfoot>


    </tfoot>

    <tbody>
        <?php
        //  vardump($office_id) ;

        $i = 1;
        foreach (shop_stats_invoices_by_offices($office_id) as $key => $value) {

            $dont_show = array(
                "ORDER", "PAT", "SIDEL", "SIDER", "SIDES", "BUDGET"
            );

            if (!in_array($value['code'], $dont_show)) {
                ?>                                  

                <tr>
                    <td>
                        <?php echo $i; ?>
                    </td>

                    <td>
                        <?php echo $value['code']; ?>
                    </td>

                    <td>
                        <?php echo products_get_name_by_code($value['code']); ?>
                    </td>

                    <td>
                        <?php echo ($value['quantity']); ?>
                    </td>



                    <td class="text-right">
                        <?php echo monedaf($value['subtotal']); ?>
                    </td>

                    <td class="text-right">
                        <?php echo monedaf($value['discounts']); ?>
                    </td>

                    <td class="text-right">
                        <?php echo monedaf($value['subtotal'] - $value['discounts']); ?>
                    </td>

                </tr>
                <?php
                $i++;
            }
        }
        ?>                                               
    </tbody>                                               
</table>