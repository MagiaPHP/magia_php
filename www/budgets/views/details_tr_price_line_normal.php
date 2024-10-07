<tr class="<?php echo $class; ?>">
    <td><?php echo $i++; ?></td>   

    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td><?php echo $budget_items['code']; ?></td><?php } ?>                            




    <td><?php echo $description; ?></td>                    
    <td><?php echo "$budget_items[quantity]"; ?></td> 
    <td class="text-right"> <?php echo moneda($price); ?> </td>
    <td class="text-right"> <?php echo moneda($sub_total); ?> </td>
    <td class="text-right"> <?php echo "$discounts_html " ?></td>  
    <td class="text-right"> <?php echo moneda($thtva); ?> </td>
    <td class="text-right"> <?php echo "($budget_items[tax]%) " . moneda($totaltax); ?> </td>                                                                
    <td class="text-right"> <?php echo moneda($ttvac); ?> </td>

</tr>