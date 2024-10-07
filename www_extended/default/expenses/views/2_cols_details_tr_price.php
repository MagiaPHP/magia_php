
<tr style = "cursor: all-scroll" class = "<?php echo $class; ?>" id = "<?php echo $line->getId(); ?>">


    <?php if (!$separator && !$note) { ?> 

        <?php if (isset($cbects['nl'])) { ?> <td><?php echo "$i"; ?></td> <?php } ?>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$line[code]"; ?></td> <?php } ?>
        <?php if (isset($cbects['description'])) { ?>      <td><?php echo $line->getDescription(); ?></td> <?php } ?>
        <?php if (isset($cbects['quantity'])) { ?>         <td class="text-right"><?php echo $line->getQuantity(); ?></td> <?php } ?>
        <?php if (isset($cbects['price'])) { ?>            <td class="text-right"> <?php echo moneda($line->getPrice()); ?> </td> <?php } ?>
        <?php if (isset($cbects['subtotal'])) { ?>         <td class="text-right"> <?php echo moneda($line->getSubtotal()); ?> </td> <?php } ?>
        <?php if (isset($cbects['discounts'])) { ?>        <td class="text-right"> <?php echo $line->getDiscount_html(); ?> </td> <?php } ?>
        <?php if (isset($cbects['thtva'])) { ?>            <td class="text-right"> <?php echo moneda($line->getThtva()); ?> </td> <?php } ?>
        <?php if (isset($cbects['tva'])) { ?>              <td class="text-right"> <?php echo moneda($line->getTtva()); ?> </td> <?php } ?>        
        <?php if (isset($cbects['ttvac'])) { ?>            <td class="text-right"> <?php echo moneda($line->getTtvac()); ?> </td> <?php } ?>
        <?php if (isset($cbects['category'])) { ?>         <td class="text-right"> <?php echo $line->getCategory(); ?> </td> <?php } ?>

        <?php
        $i++;
    } else {
        ?> 
        <td><?php echo $i; ?></td>
        <td colspan='<?php echo count($cbects) - 9; ?>'>
            <?php echo $line->getDescription(); ?>
        </td>

    <?php } ?>


</tr>   