<tr class="<?php echo $class; ?>">
    <?php if (!$separator) { ?>
        <td><?php
            echo $i++;
            ;
            ?></td>
        <?php if (modules_field_module('status', 'audio')) { ?><td><?php
                echo $q++;
                ;
                ?></td><?php } ?>

        <td><?php echo "$invoice_items[quantity]"; ?></td>                        
        <?php if (modules_field_module('status', 'products')) { ?><td class="<?php echo $class_code; ?>"><?php echo "$invoice_items[code]"; ?></td><?php } ?>
        <td><?php echo "$invoice_items[description]"; ?></td>
        <td class="text-right"><?php echo moneda($invoice_items['price']); ?> </td>
        <td class="text-right"><?php echo moneda($invoice_items['price'] * $invoice_items['quantity']); ?> </td>
        <td class="text-right"><?php
            echo "$discounts_mode";
            echo moneda($invoice_items['totaldiscounts']);
            ?>
        </td>                                
        <td class="text-right"><?php echo moneda($invoice_items['subtotal']); ?> </td>
        <td class="text-right">(<?php echo "$invoice_items[tax]"; ?> %) <?php echo moneda($invoice_items['totaltax']); ?> </td>                                                                
        <td class="text-right"><?php echo moneda($invoice_items['subtotal'] + $invoice_items['totaltax']); ?> </td>
    <?php } else { ?>
        <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>
        <td colspan="9"><?php echo $description; ?></td>
    <?php } ?>
</tr>