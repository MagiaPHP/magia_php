

<thead>
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
</thead>
<tbody>
    <?php
    $items = invoice_lines_list_by_invoice_id($id);
    $total_subtotal = 0;
    $total_totaltax = 0;
    $total_totaltvac = 0;
    $total_totaldiscounts = 0;
    $i = 1;
    foreach ($items as $key => $invoice_items) {

        $total_subtotal = $total_subtotal + $invoice_items['subtotal'];
        $total_totaltax = $total_totaltax + $invoice_items['totaltax'];
        $total_totaltvac = $total_totaltvac + ($invoice_items["subtotal"] + $invoice_items["totaltax"]);
        $total_totaldiscounts = $total_totaldiscounts + ($invoice_items["totaldiscounts"]);
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo "$invoice_items[quantity]"; ?></td>
            <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?><td><?php echo "$invoice_items[code]"; ?></td><?php } ?>

            <td><?php echo $transport_description; ?></td>
            <td class="text-right"><?php echo moneda($invoice_items['price']); ?> </td>
            <td class="text-right"><?php echo moneda($invoice_items['quantity'] * $invoice_items['price']); ?> </td>
            <td class="text-right">
                <?php
                echo ($invoice_items['discounts_mode'] == '%') ?
                        " ( $invoice_items[discounts]$invoice_items[discounts_mode] ) " : "";
                echo moneda($invoice_items['totaldiscounts']);
                ?>
            </td>  
            <td class="text-right"><?php echo moneda($invoice_items['subtotal']); ?> </td>
            <td class="text-right">
                (<?php echo "$invoice_items[tax]"; ?> %) <?php echo moneda($invoice_items['totaltax']); ?> </td>                                                                
            <td class="text-right"><?php echo moneda($invoice_items['subtotal'] + $invoice_items['totaltax']); ?> </td>                                


        </tr>

    <?php } ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><?php _t("Totals"); ?></td>                                                    
        <td class="text-right"><?php echo monedaf($total_totaldiscounts); ?></td>
        <td class="text-right"><?php echo monedaf($total_subtotal); ?></td>
        <td class="text-right"><?php echo monedaf($total_totaltax); ?></td>
        <td class="text-right info"><b><?php echo monedaf($total_totaltvac); ?></b></td>        
    </tr>
</tbody>


