
<thead>
    <tr>
        <th><?php _t("#"); ?></th>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("code"); ?></th> <?php } ?>                                    
        <th><?php _t("Description"); ?></th>                            
        <th><?php _t("Quantity"); ?></th>            
        <th class="text-right"><?php _t("Price"); ?></th>
        <th class="text-right"><?php _t("Total"); ?></th>
        <th class="text-right"><?php _t("Discounts"); ?></th>
        <th class="text-right"><?php _t("Htva"); ?></th>
        <th class="text-right"><?php _t("Tva"); ?></th>
        <th class="text-right"><?php _t("Tvac"); ?></th>                            
        <th class="text-right"><?php _t("Edit"); ?></th>
        <th class=""><?php _t("Delete"); ?></th>
    </tr>
</thead>

<tbody class="row_position">

    <?php
    // $items = expense_lines_list_by_expense_id($id);
    $total_subtotal = 0;
    $total_totaltax = 0;
    $total_totaltvac = 0;
    $total_totaldiscounts = 0;
    $i = 1;
    $separator = false;
    foreach (expenses_lines_list_by_expense_id($expense->getId()) as $key => $expense_items) {

        $total_subtotal = $total_subtotal + $expense_items['subtotal'];
        $total_totaltax = $total_totaltax + $expense_items['totaltax'];
        $total_totaltvac = $total_totaltvac + ($expense_items["subtotal"] + $expense_items["totaltax"]);
        $total_totaldiscounts = $total_totaldiscounts + ($expense_items["totaldiscounts"]);
        $class = ( strstr($expense_items['description'], "ORDER") ) ? "info" : ""; // en la posicion cero

        if (stripos($expense_items['description'], "---") !== FALSE) {
            $class = " success ";
            $separator = true;
        }
        include "tr_part_edit.php";
        $i++;
        $class = "";
        $separator = false;
    }
    ?>
    <tr>
        <td></td>
        <td>
            <a name="separator"></a>
            <?php include "modal_add_separator.php"; ?></td>
        <td colspan="9"></td>
    </tr>
    <tr>
        <th><?php _t("#"); ?></th>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("code"); ?></th> <?php } ?>                                    
        <th><?php _t("Description"); ?></th>                            
        <th><?php _t("Quantity"); ?></th>            
        <th class="text-right"><?php _t("Price"); ?></th>
        <th class="text-right"><?php _t("Total"); ?></th>
        <th class="text-right"><?php _t("Discounts"); ?></th>
        <th class="text-right"><?php _t("Htva"); ?></th>
        <th class="text-right"><?php _t("Tva"); ?></th>
        <th class="text-right"><?php _t("Tvac"); ?></th>                            
        <th class="text-right"><?php _t("Edit"); ?></th>
        <th class=""><?php _t("Delete"); ?></th>
    </tr>
    <tr>
        <td></td>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th></th> <?php } ?>                                    
        <td></td>
        <td></td>

        <td></td>
        <td class="text-right"><?php echo monedaf($total_subtotal); ?></td>
        <td class="text-right"><?php echo monedaf($total_totaldiscounts); ?></td>
        <td class="text-right"><?php echo monedaf($total_subtotal); ?></td>
        <td class="text-right"><?php echo monedaf($total_totaltax); ?></td>
        <td class="text-right info"><b><?php echo monedaf($total_totaltvac); ?></b></td>
        <td></td>
        <td></td>
    </tr>



