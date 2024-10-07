<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>            
            <th><?php _t("Date"); ?></th>            
            <th><?php _t("Account"); ?></th>
            <th><?php _t("Operation number"); ?></th>
            <th class="text-right"><?php _t("Value"); ?></th>
            <th class="text-right"></th>
            <th></th>
        </tr>
    </thead>
    <tbody>                     
        <?php
        $i = 1;
        $total = 0;

        foreach (balance_list_by_expense($expense->getId()) as $key => $balance_item) {

            $total = $total + ($balance_item["sub_total"] + $balance_item["tax"]);
            $balance_total = $balance_item["sub_total"] + $balance_item["tax"];
            $class = ($balance_item['canceled_code'] ) ? " danger " : "";
            ?>
            <tr class="<?php echo $class; ?>">
                <td>
                    <a href="index.php?c=balance&a=details&id=<?php echo $balance_item['id']; ?>"><?php echo $balance_item['id']; ?></a>
                </td>

                <td>
                    <?php echo $balance_item['date']; ?> 
                </td>
                <td>
                    <?php echo $balance_item['account_number']; ?> 
                </td>
                <td>
                    <?php echo $balance_item['ref']; ?> 
                </td>
                <td class="text-right"><?php echo moneda($balance_total); ?> </td>
                <td class="text-right">
                    <a href="index.php?c=balance&a=details&id=<?php echo $balance_item['id']; ?>">
                        <?php echo icon('eye-open'); ?>
                    </a>
                </td>
                <td class="">    
                    <?php if (expenses_field_id("status", $id) >= 20 && !$balance_item['canceled_code']) { ?>
                        <?php include "modal_cancel_payments_list.php"; ?>
                        <?php
                    } else {
                        echo "<a href=\"index.php?c=balance&a=search&w=cancelCode&txt=$balance_item[canceled_code]\" >$balance_item[canceled_code]</a>";
                    }
                    ?>
                </td>

            </tr>                
            <?php
            $i++;
        }
        ?>                       
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="text-right"><?php _t("Total"); ?></td>
            <td class="text-right"><?php echo moneda($total); ?></td>
            <td></td>
            <td></td>
        </tr>
    </tfoot>




</table>
