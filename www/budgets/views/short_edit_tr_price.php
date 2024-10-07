<tr style="cursor: all-scroll" class="<?php echo $class; ?>" id="<?php echo "$budget_items[id]"; ?>">  


    <?php if (!$separator) { ?> 
        <td><?php echo "$i"; ?> <?php // echo "$budget_items[id]";                   ?></td>

        <?php /**
          <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$budget_items[code]"; ?></td> <?php } ?>
         * 
         */ ?>

        <td><?php echo "$budget_items[description]"; ?></td>
        <td><?php echo "$budget_items[quantity]"; ?></td>

        <td class="text-right"> <?php echo moneda($price); ?> </td>
        <td class="text-right"> <?php echo moneda($thtva); ?> </td>



        <?php
        /**
         *         <td class="text-right"> <?php echo moneda($sub_total); ?> </td>
         * <td class="text-right"> <?php echo "$discounts_html " ?></td>  
          <td class="text-right"> <?php echo moneda($thtva); ?> </td>
          <td class="text-right"> <?php echo "($budget_items[tax]%) " . moneda($totaltax); ?> </td>
          <td class="text-right"> <?php echo moneda($ttvac); ?> </td>

         */
        ?>
        <td><?php include "short_modal_items_edit.php"; ?></td>

        <td class="text-right"> 
            <a class="btn btn-danger btn-md" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$budget_items[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span>               
            </a>

        </td>

        <?php
        $i++;
    } else {
        ?> 

        <td colspan="5"><?php echo ($budget_items['description']); ?></td>


        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>


        <td class="text-right"> 

            <a class="btn btn-danger" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$budget_items[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span> <?php _t("Delete"); ?>
            </a>
        </td>


    <?php } ?>


</tr>   