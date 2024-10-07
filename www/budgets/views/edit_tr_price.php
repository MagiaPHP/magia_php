<tr style="cursor: all-scroll" class="<?php echo $class; ?>" id="<?php echo "$budget_items[id]"; ?>">  
    <?php if (!$separator) { ?> 
        <td><?php echo "$i"; ?></td>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$budget_items[code]"; ?></td> <?php } ?>
        <td><?php echo "$budget_items[description]"; ?></td>
        <td><?php echo "$budget_items[quantity]"; ?></td>
        <td class="text-right"> <?php echo moneda($price); ?> </td>
        <td class="text-right"> <?php echo moneda($sub_total); ?> </td>
        <td class="text-right"> <?php echo "$discounts_html " ?></td>  
        <td class="text-right"> <?php echo moneda($thtva); ?> </td>               
        <td class="text-right"> <?php echo "($budget_items[tax]%) " . moneda($totaltax); ?> </td>
        <td class="text-right"> <?php echo moneda($ttvac); ?> </td>       
        <?php
        $i++;
    } else {
        ?> 
        <td colspan="9"><?php echo ($budget_items['description']); ?></td>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>

    <?php } ?>

    <td><?php include "modal_items_edit.php"; ?></td>
    <td><?php include "modal_items_delete.php"; ?></td>


</tr>   
