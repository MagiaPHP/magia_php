<thead>
    <tr>
        <th><?php _t("#"); ?></th>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("code"); ?></th> <?php } ?>                                    
        <th><?php _t("Description"); ?></th>                            
        <th><?php _t("Quantity"); ?></th>            
        <th class="text-right"><?php _t("Price"); ?></th>
        <th class="text-right"><?php _t("SubTotal"); ?></th>
        <th class="text-right"><?php _t("Discounts"); ?></th>
        <th class="text-right"><?php _t("Htva"); ?></th>
        <th class="text-right"><?php _t("Tva"); ?></th>
        <th class="text-right"><?php _t("Tvac"); ?></th>                            
        <th><?php // _t("Edit"); ?></th>
        <th><?php //_t("Delete"); ?></th>
    </tr>
</thead>

<tbody class="row_position">

    <?php
    // $items = invoice_lines_list_by_invoice_id($id);
    $total_subtotal = 0;
    $total_totaltax = 0;
    $total_totaltvac = 0;
    $total_totaldiscounts = 0;
    $i = 1;
    $separator = false;
    foreach (invoice_lines_list_without_transport_by_invoice_id($id) as $key => $invoice_items) {



        $price = $invoice_items['price'];
        $sub_total = $invoice_items['quantity'] * $invoice_items['price'];
        $discounts = $invoice_items['discounts'];
        $discounts_mode = $invoice_items['discounts_mode'];

        if ($discounts_mode == "%") {
            $discounts_in_value = ($discounts > 0 ) ? ( ($sub_total * $discounts) / 100 ) : (0);
            $discounts_html = "-($discounts %) " . moneda($discounts_in_value);
        }


        if ($discounts_mode == "EUR") {
            $discounts_in_value = ($discounts > 0 ) ? ( ($sub_total - $discounts) ) : (0);
            $discounts_html = "-($discounts %) " . moneda($discounts_in_value);
        }


        if ($discounts_mode == "UNIT") {
            $discounts_in_value = ($discounts > 0 ) ? ( ( $invoice_items['discounts'] * $invoice_items['quantity']) ) : (0);
            $discounts_html = " - ( " . $invoice_items['discounts'] . " by unity) " . moneda($discounts_in_value);
        }

        $thtva = $sub_total - $discounts_in_value;
        $totaltax = ($thtva) ? ($thtva * $invoice_items['tax']) / 100 : 0;
        $ttvac = $thtva + $totaltax;

        ////////////////////////////////////////////////////////////////////////
        //////////////Totales generales

        if (stripos($invoice_items['description'], "---") !== FALSE) {
            $class = " success ";
            $separator = true;
        }

        
        //vardump(_options_option('config_invoices_show_tr_no_price')); 
        
        
        if (_options_option('config_invoices_show_tr_no_price')) {
            include "tr_part_edit.php";
        } else {
            if (intval($invoice_items['price'])) {
                include "tr_part_edit.php";
            } else {
                include "tr_part_edit_no_price.php";
            }
        }

        $i++;
        $class = "";
        $separator = false;
    }
    ?>

    <tr>
        <td></td>
        <td><?php include "modal_add_separator.php"; ?></td>
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
        <th><?php // _t("Edit"); ?></th>
        <th><?php // _t("Delete"); ?></th>
    </tr>

    <tr>
        <td></td>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th></th> <?php } ?>                                    
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><?php _t("Totals"); ?></td>                                                    
        <td class="text-right"><?php echo monedaf($total_totaldiscounts); ?></td>
        <td class="text-right"><?php echo monedaf($total_subtotal); ?></td>
        <td class="text-right"><?php echo monedaf($total_totaltax); ?></td>
        <td class="text-right info"><b><?php echo monedaf($total_totaltvac); ?></b></td>
        <td></td>
        <td></td>
    </tr>


