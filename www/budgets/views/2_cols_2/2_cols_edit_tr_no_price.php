<tr style="cursor: all-scroll" class="<?php echo $class; ?>" id="<?php echo "$line[id]"; ?>">  


    <?php if (!$separator && !$note) { ?> 

        <?php if ($cbects['nl']) { ?> <td><?php echo "$i"; ?></td> <?php } ?>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$line[code]"; ?></td> <?php } ?>
        <?php if ($cbects['description']) { ?>      <td><?php echo "$line[description]"; ?></td> <?php } ?>
        <?php if ($cbects['quantity']) { ?>         <td class="text-right"><?php echo "$line[quantity]"; ?></td> <?php } ?>
        <?php if ($cbects['price']) { ?>            <td class="text-right">  </td><?php } ?>
        <?php if ($cbects['subtotal']) { ?>         <td class="text-right">  </td> <?php } ?>
        <?php if ($cbects['discounts']) { ?>        <td class="text-right">  </td> <?php } ?>
        <?php if ($cbects['thtva']) { ?>            <td class="text-right">  </td> <?php } ?>
        <?php if ($cbects['tva']) { ?>              <td class="text-right"> </td> <?php } ?>
        <?php if ($cbects['ttvac']) { ?>            <td class="text-right"> </td> <?php } ?>
        <?php if ($cbects['category']) { ?>            <td class="text-right"> </td> <?php } ?>

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


        <?php if ($cbects['description']) { ?>
            <td colspan='<?php echo ( count($cbects) - 8 ); ?>'>
                <?php echo "$line[description]"; ?>
            </td> 
        <?php } ?>



        <td><?php include "modal_items_edit.php"; ?></td>
        <td class="text-right"> 
            <a class="btn btn-danger" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$line[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span> 

            </a>
        </td>
    <?php } ?>


</tr>   