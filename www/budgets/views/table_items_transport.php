

<?php
// mostramos solo si hay items transporte
if (modules_field_module('status', 'transport') || budget_lines_list_transport_by_budget_id($id)) {
    //if( budget_lines_list_transport_by_budget_id($id)){ 
    ?>
    <tr>
        <th><?php _t("Transport"); ?></th>                    
        <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?><th><?php _t("Code"); ?></th><?php } ?>
        <th></th>
        <th></th>
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
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>   
        <th><?php _t("Description"); ?></th>
        <th><?php _t("Quantity"); ?></th>
        <th class="text-right"><?php _t("Price U."); ?></th>
        <th class="text-right"><?php _t("Sub total"); ?></th>        
        <th class="text-right"><?php _t("Discounts"); ?></th>
        <th class="text-right"><?php _t("Htva"); ?></th>
        <th class="text-right"><?php _t("TVA"); ?></th>
        <th class="text-right"><?php _t("Tvac"); ?></th>
        <th class="text-right"><?php _t("Edit"); ?></th>
        <th class="text-right"><?php _t("Delete"); ?></th>
    </tr>        
    <tr>
        <?php
        $i = 1;

        foreach (budget_lines_list_transport_by_budget_id($id) as $key => $transport_item) {
            $transport_subtotal = $transport_subtotal + $transport_item['subtotal'];
            $transport_tax = $transport_tax + $transport_item['totaltax'];
            $transport_tvac = $transport_tvac + ($transport_item["subtotal"] + $transport_item["totaltax"]);
            $transport_discounts = $transport_discounts + ($transport_item["totaldiscounts"]);
            $transport_description = $transport_item['description'];
            ?>   
        <tr class="<?php echo $class; ?>">

            <td><?php echo $i++; ?></td>



            <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?>
                <td><?php echo "$transport_item[code]"; ?></td>
            <?php } ?>

            <td><?php echo $transport_description; ?></td>
            <td><?php echo "$transport_item[quantity]"; ?></td>

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
            <td><?php // include "modal_items_edit.php";                                        ?></td>
            <td class="text-right">             
                <a class="btn btn-danger btn-md" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$transport_item[id]"; ?>&redi=1">
                    <span class="glyphicon glyphicon-trash"></span>
                    <?php _t("Delete"); ?>
                </a>            
            </td>                    
        </tr>
        <?php
        $class = "";
        $separator = false;
    }
    ?>
    </tr>        
    <tr>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><?php _t("Totals"); ?></td>                                                    
        <td class="text-right"><?php echo moneda($transport_subtotal + $transport_discounts); ?></td>
        <td class="text-right"><?php echo moneda($transport_discounts); ?></td>
        <td class="text-right"><?php echo moneda($transport_subtotal); ?></td>
        <td class="text-right"><?php echo moneda($transport_tax); ?></td>
        <td class="text-right info"><b><?php echo moneda($transport_tvac); ?></b></td> 

        <td></td>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>   

    </tr>    


<?php } ?>    

