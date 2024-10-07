

    
<tr style="cursor: all-scroll" id="<?php echo $invoice_items['id']; ?>" data-invoice-id="<?php echo $invoice_items['invoice_id']; ?>">



    <?php if (!$separator) { ?> 
        <td><?php echo $i; ?></td>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$invoice_items[code]"; ?></td> <?php } ?>
        <td><?php echo "$invoice_items[description]"; ?></td>
        <td><?php echo "$invoice_items[quantity]"; ?></td>
        <td class="text-right"><?php echo monedaf($invoice_items['price']); ?></td>
        <td class="text-right"><?php echo monedaf($invoice_items['price'] * $invoice_items['quantity']); ?></td>
        <td class="text-right"><?php echo $discounts_html; ?></td>
        <td class="text-right"><?php echo monedaf($thtva); ?> </td>
        <td class="text-right">(<?php echo ($invoice_items['tax']); ?> %) <?php echo monedaf($totaltax); ?> </td>                                
        <td class="text-right"><?php echo monedaf($ttvac); ?> </td>                                

        <td><?php include "modal_items_edit.php"; ?></td>
        <td><?php include "modal_items_delete.php"; ?></td>

        <?php
    } else {
        ?> 
        <td><?php echo strtoupper($invoice_items['description']); ?></td>

        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>                                    
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td> 
            <a class="btn btn-danger" href="index.php?c=invoices&a=linesDeleteOk&id=<?php echo "$invoice_items[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span> 
                <?php _t("Delete"); ?>
            </a>
        </td>
    <?php } ?>
</tr>   