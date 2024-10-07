<tr style="cursor: all-scroll" class="<?php echo $class; ?>" id="<?php echo "$line[id]"; ?>">  


    <?php if (!$separator && !$note) { ?> 
        <?php if (isset($cbects['nl'])) { ?> 

            <td>
                <?php echo "$i"; ?>
            </td> 
        <?php } ?>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$line[code]"; ?></td> <?php } ?>

        <?php if (isset($cbects['description'])) { ?>      
            <td>
                <?php echo "$line[description]"; ?>
            </td> 
        <?php } ?>

        <?php if (isset($cbects['quantity'])) { ?>         <td class="text-right"><?php echo $line['quantity']; ?></td> <?php } ?>
        <?php if (isset($cbects['price'])) { ?>            <td class="text-right"> <?php echo moneda($line['price']); ?> </td> <?php } ?>
        <?php if (isset($cbects['subtotal'])) { ?>         <td class="text-right"> <?php echo moneda($line['subtotal']); ?> </td> <?php } ?>
        <?php if (isset($cbects['discounts'])) { ?>        <td class="text-right"> <?php echo '(' . $line['discounts'] . ' ' . $line['discounts_mode'] . ') ' . moneda($line['total_discounts']); ?> </td> <?php } ?>
        <?php if (isset($cbects['thtva'])) { ?>            <td class="text-right"> <?php echo moneda(($line['subtotal']) - $line['total_discounts']); ?> </td> <?php } ?>
        <?php if (isset($cbects['tva'])) { ?>              <td class="text-right"> <?php echo "($line[tax]%) " . moneda($line['total_tva']); ?> </td> <?php } ?>        
        <?php if (isset($cbects['ttvac'])) { ?>            <td class="text-right"> <?php echo moneda(($line['subtotal']) - $line['total_discounts'] + $line['total_tva']); ?> </td> <?php } ?>
        <?php if (isset($cbects['category'])) { ?>         <td class="text-right"> <?php echo $line['category']; ?> </td> <?php } ?>

        <td><?php include "modal_items_edit.php"; ?></td>

        <td class="text-right"> 
            <a class="btn btn-danger btn-md" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$line[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>

        <?php
        $i++;
    } else {
        ?> 

        <td colspan='<?php echo count($cbects) - 8; ?>'>
            <?php echo ($line['description']); ?>
        </td>


        <td><?php include "modal_items_edit.php"; ?></td>

        <td class="text-right"> 
            <a class="btn btn-danger" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$line[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>


    <?php } ?>


</tr>   