<tr style="cursor: all-scroll" class="<?php echo $class; ?>" id="<?php echo "$budget_items[id]"; ?>">  


    <?php if (!$separator) { ?> 
        <td><?php echo "$i"; ?> <?php // echo "$budget_items[id]";      ?></td>
        <td><?php echo "$budget_items[quantity]"; ?></td>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$budget_items[code]"; ?></td> <?php } ?>

        <td><?php echo "$budget_items[description]"; ?></td>
        <td class="text-right"><?php // echo moneda($budget_items['price']);    ?></td>
        <td class="text-right"><?php // echo moneda($budget_items['quantity'] * $budget_items['price']);    ?></td>
        <td class="text-right">
            <?php
//            echo ($budget_items['discounts_mode'] == '%') ? " ( $budget_items[discounts] $budget_items[discounts_mode] ) " : "";
//            echo moneda($budget_items['totaldiscounts']);
            ?>
        </td>
        <td class="text-right"><?php // echo moneda($budget_items['subtotal']);    ?> </td>
        <td class="text-right"><?php // echo "($budget_items[tax]) %";    ?>  <?php // echo moneda($budget_items['totaltax']);    ?> </td>                                
        <td class="text-right"><?php echo moneda($budget_items["subtotal"] + $budget_items["totaltax"]); ?> </td>                                
        <td><?php include "modal_items_edit.php"; ?></td>
        <td class="text-right"> 

            <a class="btn btn-danger btn-md" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$budget_items[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span>
                <?php _t("Delete"); ?>
            </a>

        </td>

        <?php
        $i++;
    } else {
        ?> 

        <td colspan="4"><?php echo ($budget_items['description']); ?></td>


        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>


        <td><?php include "modal_items_edit.php"; ?></td>

        <td class="text-right"> 

            <a class="btn btn-danger" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$budget_items[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span> 
                <?php //_t("Delete"); ?>
            </a>
        </td>


    <?php } ?>


</tr>   