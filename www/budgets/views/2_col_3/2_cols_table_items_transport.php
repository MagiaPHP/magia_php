
<?php
// mostramos solo si hay items transporte
if (modules_field_module('status', 'transport') || expense_lines_list_transport_by_expense_id($id)) {
    ?>

    <tr>
        <th colspan='<?php echo count($cbects); ?>'>
            <?php _t("Transport"); ?></th>                    
        <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?><th><?php _t("Code"); ?></th><?php } ?>

    </tr>  



    <tr>            
        <?php if ($cbects['nl']) { ?> <th><?php _t("#"); ?></th><?php } ?>
        <?php if ((modules_field_module('status', 'products') || modules_field_module('status', 'audio')) && $cbects['code']) { ?> 
            <th><?php _t("Code"); ?></th> 
        <?php } ?>
            <?php if ($cbects['description']) { ?> <th><?php _t("Description"); ?></th><?php } ?>
        <?php if ($cbects['quantity']) { ?> <th><?php _t("Quantity"); ?></th><?php } ?>
        <?php if ($cbects['price']) { ?> <th><?php _t("Price U."); ?></th><?php } ?>
        <?php if ($cbects['subtotal']) { ?> <th><?php _t("Sub total"); ?></th><?php } ?>
        <?php if ($cbects['discounts']) { ?> <th><?php _t("Discounts"); ?></th><?php } ?>
        <?php if ($cbects['thtva']) { ?> <th><?php _t("Htva"); ?></th><?php } ?>
        <?php if ($cbects['tva']) { ?> <th><?php _t("Tva"); ?></th><?php } ?>
        <?php if ($cbects['ttvac']) { ?> <th><?php _t("Tvac"); ?></th><?php } ?>            
        <td></td>        
        <td></td>        
    </tr>  


    <?php
    $i = 1;

    foreach (expense_lines_list_transport_by_expense_id($id) as $key => $transport_item) {
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
            <td><?php // include "modal_items_edit.php";                                                                             ?></td>
            <td class="text-right">             
                <a class="btn btn-danger btn-md" href="index.php?c=expenses&a=ok_lines_delete&id=<?php echo "$transport_item[id]"; ?>&redi[redi]=1">
                    <span class="glyphicon glyphicon-trash"></span>

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
