<tr class="<?php echo $class; ?>">
    <?php if (!$separator) { ?> 
        <td><?php echo $i++; ?></td>  
        <?php if (modules_field_module('status', 'audio')) { ?><td><?php echo $q++; ?></td> <?php } ?> 

        <?php if (modules_field_module('status', 'audio')) { ?>
            <td><?php echo "$budget_items[code]"; ?></td>
        <?php } else { ?>
            <?php if (modules_field_module('status', 'products')) { ?><td><?php echo "$budget_items[code]"; ?></td><?php } ?>
        <?php } ?>
        <td><?php echo $description; ?></td>                    
        <td><?php echo "$budget_items[quantity]"; ?></td>    
        <td class="text-right"> <?php // echo  moneda($price);          ?> </td>
        <td class="text-right"> <?php //echo  moneda($sub_total);          ?> </td>
        <td class="text-right"> <?php //echo "$discounts_html "          ?></td>  
        <td class="text-right"> <?php //echo  moneda($thtva);          ?> </td>
        <td class="text-right"> <?php //echo "($budget_items[tax]%) " . moneda($totaltax);          ?> </td> 
        <td class="text-right"> <?php echo moneda($ttvac); ?> </td>
    <?php } else { ?>
        <td colspan="9"><?php echo $description; ?></td>
        <?php if (modules_field_module('status', 'products')) { ?> <td></td> <?php } ?>
        <?php if (modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>
    <?php } ?>
</tr>