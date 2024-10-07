
<?php
// mostramos solo si hay items transporte
if (modules_field_module('status', 'transport') || invoice_lines_list_transport_by_invoice_id($id)) {
    //if( budget_lines_list_transport_by_budget_id($id)){ 
    ?>
    <tr>
        <th><?php _t("Transport"); ?></th>                    
        <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?><th></th><?php } ?>
        <th></th>
        <th></th>
        <th></th>
        <th></th>

        <th></th>
        <th></th>
        <th></th>
        <th></th>         
    </tr> 


    <tr>                                
        <th>#</th>                                        
        <th><?php _t("Quantity"); ?></th>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>   

        <th><?php _t("Description"); ?></th>
        <th class="text-right"><?php _t("Price U."); ?></th>
        <th class="text-right"><?php _t("Sub total"); ?></th>        
        <th class="text-right"><?php _t("Discounts"); ?></th>
        <th class="text-right"><?php _t("htva"); ?></th>
        <th class="text-right"><?php _t("Tva"); ?></th>
        <th class="text-right"><?php _t("Tvac"); ?></th>

    </tr>        
    <tr>
        <?php
        //$items = budget_lines_list_by_budget_id($id);   
//        $transport_subtotal = 0;
//        $transport_tax = 0;
//        $transport_tvac = 0;        
//        $transport_discounts = 0;
//        $transport_class = "";
//        $transport_separator = false;
        $i = 1;

        foreach (invoice_lines_list_transport_by_invoice_id($id) as $key => $transport_item) {
            $transport_subtotal = $transport_subtotal + $transport_item['subtotal'];
            $transport_tax = $transport_tax + $transport_item['totaltax'];
            $transport_tvac = $transport_tvac + ($transport_item["subtotal"] + $transport_item["totaltax"]);
            $transport_discounts = $transport_discounts + ($transport_item["totaldiscounts"]);
            $transport_description = $transport_item['description'];
            ?>   
        <tr class="<?php echo $class; ?>">

            <td><?php echo $i++; ?></td>
            <td><?php echo "$transport_item[quantity]"; ?></td>
            <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?><td><?php echo "$transport_item[code]"; ?></td><?php } ?>

            <td><?php echo $transport_description; ?></td>
            <td class="text-right"><?php echo moneda($transport_item['price']); ?> </td>
            <td class="text-right"><?php echo moneda($transport_item['quantity'] * $transport_item['price']); ?> </td>
            <td class="text-right">
                <?php
                echo ($transport_item['discounts_mode'] == '%') ?
                        " ( $transport_item[discounts]$transport_item[discounts_mode] ) " : "";
                echo moneda($transport_item['totaldiscounts']);
                ?>
            </td>  
            <td class="text-right"><?php echo moneda($transport_item['subtotal']); ?> </td>
            <td class="text-right">
                (<?php echo "$transport_item[tax]"; ?> %) <?php echo moneda($transport_item['totaltax']); ?> </td>                                                                
            <td class="text-right"><?php echo moneda($transport_item['subtotal'] + $transport_item['totaltax']); ?> </td>                                                        
        </tr>
        <?php
        $class = "";
        $separator = false;
    }
    ?>
    </tr>        
    <tr>

        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>                                    
        <td></td>
        <td></td>
        <td></td>        
        <td class="text-right"><?php _t("Totals"); ?></td>                                                    
        <td class="text-right"><?php echo moneda($transport_subtotal + $transport_discounts); ?></td>
        <td class="text-right"><?php echo moneda($transport_discounts); ?></td>
        <td class="text-right"><?php echo moneda($transport_subtotal); ?></td>
        <td class="text-right"><?php echo moneda($transport_tax); ?></td>
        <td class="text-right info"><b><?php echo moneda($transport_tvac); ?></b></td>                
    </tr>    

<?php } ?>    


