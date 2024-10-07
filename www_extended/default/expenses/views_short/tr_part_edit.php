<tr style="cursor: all-scroll" class="<?php echo $class; ?>" id="<?php echo "$expense_items[id]"; ?>">  

    <?php
//    vardump($expense->getId());
//    vardump($expense->getProvider_id());
    ?>

    <?php if (!$separator) { ?> 
        <td><?php echo $i; ?></td>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$expense_items[code]"; ?></td> <?php } ?>
        <td><?php echo "$expense_items[description]"; ?></td>
        <td><?php echo "$expense_items[quantity]"; ?></td>
        <td class="text-right"><?php echo monedaf($expense_items['price']); ?></td>
        <td class="text-right"><?php echo monedaf($expense_items['price'] * $expense_items['quantity']); ?></td>
        <td class="text-right">
            <?php
            echo ($expense_items['discounts_mode'] == '%') ?
                    " ( $expense_items[discounts]$expense_items[discounts_mode] ) " :
                    "";
            echo monedaf($expense_items['totaldiscounts']);
            ?>
        </td>
        <td class="text-right"><?php echo monedaf($expense_items['subtotal']); ?> </td>
        <td class="text-right">(<?php echo ($expense_items['tax']); ?> %) <?php echo monedaf($expense_items['totaltax']); ?> </td>                                
        <td class="text-right"><?php echo monedaf($expense_items["subtotal"] + $expense_items["totaltax"]); ?> </td>                                

        <td><?php
//            vardump($expense->getProvider_id());

            include "modal_items_edit.php";
            ?></td>
        <td><?php include "modal_items_delete.php"; ?></td>

        <?php
    } else {
        ?> 
        <td><?php echo strtoupper($expense_items['description']); ?></td>

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
            <a class="btn btn-danger" href="index.php?c=expenses&a=linesDeleteOk&id=<?php echo "$expense_items[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span> 
                <?php _t("Delete"); ?>
            </a>
        </td>
    <?php } ?>
</tr>   