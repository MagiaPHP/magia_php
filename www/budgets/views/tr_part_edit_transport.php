<tr class="<?php echo $class; ?>" id="<?php echo "$transport_item[id]"; ?>">  


    <?php if (!$separator) { ?> 
        <td><?php echo "$i"; ?> <?php // echo "$transport_item[id]";     ?></td>
        <td><?php echo "$transport_item[quantity]"; ?></td>
        <td><?php echo "$transport_item[code]"; ?></td>
        <td><?php echo "$transport_item[description]"; ?></td>
        <td class="text-right"><?php echo moneda($transport_item['price']); ?></td>
        <td class="text-right"><?php echo moneda($transport_item['quantity'] * $transport_item['price']); ?></td>
        <td class="text-right"><?php
            echo ($transport_item['discounts_mode'] == '%') ? " ( $transport_item[discounts] $transport_item[discounts_mode] ) " : "";
            echo moneda($transport_item['totaldiscounts']);
            ?>
        </td>
        <td class="text-right"><?php echo moneda($transport_item['subtotal']); ?> </td>
        <td class="text-right">(<?php echo ($transport_item['tax']); ?> %) <?php echo moneda($transport_item['totaltax']); ?> </td>                                
        <td class="text-right"><?php echo moneda($transport_item["subtotal"] + $transport_item["totaltax"]); ?> </td>                                
        <td><?php include "modal_items_edit.php"; ?></td>
        <td class="text-right"> 

            <a class="btn btn-danger btn-md" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$transport_item[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span>
                <?php _t("Delete"); ?>
            </a>

            <?php /*
              <div class="dropdown">
              <button class="btn btn-default dropdown-toggle"
              type="button"
              id="dropdownMenu1"
              data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="true">
              <?php _t("Actions"); ?>
              <span class="caret"></span>
              </button>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

              <li role="separator" class="divider"></li>

              <li>
              <a href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$transport_item[id]"; ?>&redi=1">
              <?php _t("Delete"); ?>
              </a>
              </li>
              </ul>
              </div> */ ?>
        </td>

        <?php
        $i++;
    } else {
        ?> 
        <td><?php // echo "$transport_item[quantity]" ;        ?></td>        
        <td colspan="10"><?php echo strtoupper($transport_item['description']); ?></td>

        <td class="text-right"> 

            <a class="btn btn-danger" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$transport_item[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span> <?php _t("Delete"); ?>
            </a>
        </td>


    <?php } ?>


</tr>   