
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("#"); ?></th>

            <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>
            <th><?php _t("Description"); ?></th>                            
            <th><?php _t("Quantity"); ?></th>
            <th class="text-right"><?php _t("Price U."); ?></th>
            <th class="text-right"><?php _t("Sub total"); ?></th>
            <th class="text-right"><?php _t("Discounts"); ?></th>
            <th class="text-right"><?php _t("Total htva"); ?></th>
            <th class="text-right"><?php _t("Tva"); ?></th>
            <th class="text-right"><?php _t("Tvac"); ?></th>                            
            <th class="text-right"></th>
            <th class="text-right"></th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>

            <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>
            <th><?php _t("Description"); ?></th>                            
            <th><?php _t("Quantity"); ?></th>
            <th class="text-right"><?php _t("Price U."); ?></th>
            <th class="text-right"><?php _t("Sub total"); ?></th>
            <th class="text-right"><?php _t("Discounts"); ?></th>
            <th class="text-right"><?php _t("Total htva"); ?></th>
            <th class="text-right"><?php _t("Tva"); ?></th>
            <th class="text-right"><?php _t("Tvac"); ?></th>                            
            <th class="text-right"></th>
            <th class="text-right"></th>
        </tr>
    </tfoot>


    <tbody class="row_position">
        <?php
        $total_sub_total = 0;
        $total_tax = 0;
        $total_tvac = 0;
        $total_discounts = 0;
        $class = "";
        $separator = false;
        //
        //Transport
        $transport_subtotal = 0;
        $transport_tax = 0;
        $transport_tvac = 0;
        $transport_discounts = 0;

        $i = 1;
        $class = "";
        $separator = false;

        foreach ($items as $key => $budget_items) {

            $price = $budget_items['price'];
            $sub_total = $budget_items['quantity'] * $budget_items['price'];
            $discounts = $budget_items['discounts'];
            $discounts_mode = $budget_items['discounts_mode'];

            if ($discounts_mode == "%") {
                $discounts_in_value = ($discounts > 0 ) ? ( ($sub_total * $discounts) / 100 ) : (0);
                $discounts_html = "-($discounts %) " . moneda($discounts_in_value);
            } else {
                $discounts_in_value = $discounts;
                $discounts_html = "-" . moneda($discounts);
            }

            $thtva = $sub_total - $discounts_in_value;
            $totaltax = ($thtva) ? ($thtva * $budget_items['tax']) / 100 : 0;
            $ttvac = $thtva + $totaltax;
            //////////////Totales generales
            $total_sub_total = $total_sub_total + $sub_total;
            $total_tax = $total_tax + $totaltax;
            $total_tvac = $total_tvac + $ttvac;
            $total_discounts = $total_discounts + $discounts_in_value;

            if (stripos($budget_items['description'], "---") !== FALSE) {
                $class = " success ";
                $separator = true;
            }


            if (_options_option('config_budgets_show_tr_no_price')) {
                include "edit_tr_price.php";
            } else {
                if ($budget_items['price'] == 0 || $budget_items['price'] == null) {
                    include "edit_tr_no_price.php";
                } else {
                    include "edit_tr_price.php";
                }
            }


            $class = "";
            $separator = false;
        }
        ?>

        <tr>
            <td></td>
            <td colspan='10'>
                <a name="separator"></a>
                <?php include "modal_add_separator.php"; ?>
            </td>
        </tr>


        <tr>
            <?php if (modules_field_module('status', 'audio')) { ?>

                <td></td>
            <?php } else { ?>
                <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>
            <?php } ?>
            <td colspan="4" class="text-right"><?php _t("Totals"); ?></td>                                                    
            <td class="text-right"><?php echo moneda($total_sub_total); ?></td>
            <td class="text-right"><?php echo moneda($total_discounts); ?></td>
            <td class="text-right"><?php echo moneda($total_sub_total - $total_discounts); ?></td>
            <td class="text-right"><?php echo moneda($total_tax); ?></td>
            <td class="text-right info"><b><?php echo moneda($total_tvac); ?></b></td> 
            <td></td>
            <td></td>
        </tr>

        <?php include "table_items_transport.php"; ?>
        <?php include "table_items_tva.php"; ?>


</table>


<div class="well">
    <?php include "form_items_add.php"; ?>
</div>





<?php //order_by_create_javascript_html('budget_lines'); ?>




