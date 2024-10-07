<tr style="cursor: all-scroll" class="<?php echo $class; ?>" id="<?php echo $line->getId(); ?>">  


    <?php if (!$separator && !$note) { ?> 

        <?php if ($cbects['nl']) { ?> <td><?php echo "$i"; ?></td> <?php } ?>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$line[code]"; ?></td> <?php } ?>

        <?php if (isset($cbects['description'])) { ?> <td> <?php echo $line->getDescription(); ?></td> <?php } ?>
        <?php if (isset($cbects['quantity'])) { ?> <td class="text-right"> <?php echo $line->getQuantity(); ?></td> <?php } ?>
        <?php if (isset($cbects['price'])) { ?> <td class="text-right">  </td> <?php } ?>
        <?php if (isset($cbects['subtotal'])) { ?> <td class="text-right">  </td> <?php } ?>
        <?php if (isset($cbects['discounts'])) { ?> <td class="text-right">  </td> <?php } ?>
        <?php if (isset($cbects['thtva'])) { ?> <td class="text-right">  </td> <?php } ?>
        <?php if (isset($cbects['tva'])) { ?> <td class="text-right">  </td> <?php } ?>
        <?php if (isset($cbects['ttvac'])) { ?> <td class="text-right">  </td> <?php } ?>
        <?php if (isset($cbects['category'])) { ?> <td class="text-right">  </td> <?php } ?>

        <td><?php include "modal_items_edit.php"; ?></td>

        <td class="text-right"> 
            <a class="btn btn-danger btn-md" href="index.php?c=budgets&a=ok_lines_delete&id=<?php echo $line->getId(); ?>&redi[redi]=1">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>

        <?php
        $i++;
    } else {
        ?> 


        <?php if ($cbects['description']) { ?>
            <td colspan='<?php echo ( count($cbects) - 8 ); ?>'>
                <?php echo $line->getDescription(); ?>
            </td> 
        <?php } ?>



        <td><?php include "modal_items_edit.php"; ?></td>
        <td class="text-right"> 
            <a class="btn btn-danger" href="index.php?c=budgets&a=ok_lines_delete&id=<?php echo $line->getId(); ?>&redi[redi]=1">
                <span class="glyphicon glyphicon-trash"></span> 

            </a>
        </td>
    <?php } ?>


</tr>   