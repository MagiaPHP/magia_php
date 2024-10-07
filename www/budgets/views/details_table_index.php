<table class="table table-striped" >
    <thead>
        <tr>
            <th>#</th>         
            <?php if (modules_field_module('status', 'audio')) { ?><th>##</th><?php } ?>        
            <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>                            

            <th><?php _t("Description"); ?></th>        
            <th><?php _t("Quantity"); ?></th> 
            <th class="text-right"><?php _t("Price U."); ?></th>
            <th class="text-right"><?php _t("Sub total"); ?></th>
            <th class="text-right"><?php _t("Discounts"); ?></th>
            <th class="text-right"><?php _t("Htva"); ?></th>
            <th class="text-right"><?php _t("TVA"); ?></th>
            <th class="text-right"><?php _t("Tvac"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
//$items = budget_lines_list_by_budget_id($id);   
        $total_sub_total = 0;
        $total_tax = 0;
        $total_tvac = 0;
        $total_discounts = 0;
        $class = "";
        $separator = false;
        $transport_subtotal = 0;
        $transport_tax = 0;
        $transport_tvac = 0;
        $transport_discounts = 0;
        $transport_class = "";
        $transport_separator = false;
        $i = 1;
        $j = 2;
        $q = 1;
        $new_order = false;
        $line_type = "normal";
//
//vardump($budget); 

        foreach (budget_lines_list_by_budget_id_without_transport($budget->getId()) as $key => $budget_items) {

            if (stripos($budget_items['description'], "---") !== FALSE) {
                $class = " success ";
                $separator = true;
                $line_type = "separator";
                $separator_description = substr($budget_items['description'], 3);
            }

            if (stripos($budget_items['description'], "***") !== FALSE) {
                $class = " info ";
                $note = true;
                $line_type = "note";
                $note_description = substr($budget_items['description'], 3);
            }

            // si hay un codigo
            if (isset($budget_items['code'])) {
                $class = ( strstr($budget_items['code'], "ORDER") ) ? "info" : $class; // en la posicion cero  
                $class = ( strstr($budget_items['code'], "SIDE") ) ? "danger" : $class; // en la posicion cero  
            }

            if (
                    $budget_items['code'] == 'ORDER' ||
                    $budget_items['code'] == 'PAT' ||
                    $budget_items['code'] == 'POST'
            ) {
                $description = $budget_items['description'];
            } else {
                // Si es modulo audio tradusco, sino 
                // no traduzco 
                $description = (modules_field_module('status', 'audio')) ? _tr($budget_items['description']) : ($budget_items['description']);
            }


            $new_order = ( $budget_items['code'] == 'ORDER' ) ? true : false;

            $price = $budget_items['price'];
            $sub_total = $budget_items['quantity'] * $budget_items['price'];
            $discounts = $budget_items['discounts'];
            $discounts_mode = $budget_items['discounts_mode'];

//                            if ($discounts_mode == "%") {
//                                $discounts_in_value = ($discounts > 0 ) ? ( ($sub_total * $discounts) / 100 ) : (0);
//                                $discounts_html = "-($discounts %) " . moneda($discounts_in_value);
//                            }


            if ($discounts_mode == "%") {
                $discounts_in_value = ($discounts > 0 ) ? ( ($sub_total * $discounts) / 100 ) : (0);
                $discounts_html = "-($discounts %) " . moneda($discounts_in_value);
            }


            if ($discounts_mode == "EUR") {
                $discounts_in_value = ($discounts > 0 ) ? ( ($sub_total - $discounts) ) : (0);
                $discounts_html = "-($discounts %) " . moneda($discounts_in_value);
            }


            if ($discounts_mode == "UNIT") {
                $discounts_in_value = ($discounts > 0 ) ? ( ( $budget_items['discounts'] * $budget_items['quantity']) ) : (0);
                $discounts_html = " - ( " . $budget_items['discounts'] . " by unity) " . moneda($discounts_in_value);
            }





//                            else {
//                                $discounts_in_value = $discounts;
//                                $discounts_html = "-" . moneda($discounts);
//                            }

            $thtva = $sub_total - $discounts_in_value;

            $totaltax = ($thtva) ? ($thtva * $budget_items['tax']) / 100 : 0;

            $ttvac = $thtva + $totaltax;

            //////////////Totales generales

            $total_sub_total = $total_sub_total + $sub_total;
            $total_tax = $total_tax + $totaltax;
            $total_tvac = $total_tvac + $ttvac;
            $total_discounts = $total_discounts + $discounts_in_value;
            ?>   


            <?php
            if ($new_order && $i > 1) {
                $q = 1;
                ?> 
                <tr>
                    <th><?php echo $i++; ?></th>         
                    <?php if (modules_field_module('status', 'audio')) { ?><th>##</th><?php } ?>  

                    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>                            
                    <th><?php _t("Description"); ?></th>                               
                    <th><?php _t("Quantity"); ?></th>        
                    <th class="text-right"><?php _t("Price U."); ?></th>
                    <th class="text-right"><?php _t("Sub total"); ?></th>
                    <th class="text-right"><?php _t("Discounts"); ?></th>
                    <th class="text-right"><?php _t("Htva"); ?></th>
                    <th class="text-right"><?php _t("TVA"); ?></th>
                    <th class="text-right"><?php _t("Tvac"); ?></th>
                </tr>
            <?php } ?>

            <?php
            include "details_tr_price.php";

//                            if (_options_option('config_budgets_show_tr_no_price')) {
//                                include "details_tr_price.php";
//                            } else {
//                                if ($budget_items['price'] == 0 || $budget_items['price'] == null) {
//                                    include "details_tr_no_price.php";
//                                } else {
//                                    include "details_tr_price.php";
//                                }
//                            }
            ?>

            <?php
            $class = "";
            $separator = false;
            $line_type = 'normal';
        }
        ?>
    </tbody>

    <tr>
        <th>#</th>                        
        <?php if (modules_field_module('status', 'audio')) { ?><th>##</th><?php } ?>        
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>                            
        <th><?php _t("Description"); ?></th>                               
        <th><?php _t("Quantity"); ?></th> 
        <th class="text-right"><?php _t("Price U."); ?></th>
        <th class="text-right"><?php _t("Sub total"); ?></th>
        <th class="text-right"><?php _t("Discounts"); ?></th>
        <th class="text-right"><?php _t("Htva"); ?></th>
        <th class="text-right"><?php _t("TVA"); ?></th>
        <th class="text-right"><?php _t("Tvac"); ?></th>
    </tr>

    <tr>
        <?php if (modules_field_module('status', 'audio')) { ?>
            <td></td>
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
    </tr>

    <?php if (modules_field_module('status', 'transport') || budget_lines_list_transport_by_budget_id($id)) { ?>
        <?php #####################################################################    ?>
        <?php ### T R A N S P O R T ###############################################   ?>    
        <?php #####################################################################  ?>
        <?php #####################################################################  ?>
        <?php #####################################################################  ?>
        <?php #####################################################################   ?>    
        <tr>
            <th colspan="8"><?php _t("Transport"); ?></th>       
            <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
            <?php if (modules_field_module('status', 'transport')) { ?><td></td><?php } ?>        
        </tr>    
        <tr>
            <th>#</th>        
            <?php if (modules_field_module('status', 'audio')) { ?> <th>##</th> <?php } ?>            
            <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>        
            <th><?php _t("Description"); ?></th>
            <th><?php _t("Quantity"); ?></th>    
            <th class="text-right"><?php _t("Price U."); ?></th>
            <th class="text-right"><?php _t("Sub total"); ?></th>        
            <th class="text-right"><?php _t("Discounts"); ?></th>
            <th class="text-right"><?php _t("Htva"); ?></th>
            <th class="text-right"><?php _t("TVA"); ?></th>
            <th class="text-right"><?php _t("Tvac"); ?></th>
        </tr>        
        <tr>
            <?php
            //$items = budget_lines_list_by_budget_id($id);   
//        $transport_subtotal = 0;
//        $transport_tax = 0;
//        $transport_tvac = 0;        
//        $transport_discounts = 0;
//        $transport_class = "";
//        $transport_separator = false;
            $i = 1;

            foreach (budget_lines_list_transport_by_budget_id($id) as $key => $transport_item) {
                $transport_subtotal = $transport_subtotal + $transport_item['subtotal'];
                $transport_tax = $transport_tax + $transport_item['totaltax'];
                $transport_tvac = $transport_tvac + ($transport_item["subtotal"] + $transport_item["totaltax"]);
                $transport_discounts = $transport_discounts + ($transport_item["totaldiscounts"]);
                $transport_description = $transport_item['description'];
                ?>   
            <tr class="<?php echo $class; ?>">
                <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>  
                <td><?php echo $i++; ?></td>                                
                <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td><?php echo "$transport_item[code]"; ?></td> <?php } ?>  
                <td><?php echo $transport_description; ?></td>
                <td><?php echo "$transport_item[quantity]"; ?></td>
                <td class="text-right"><?php echo moneda($transport_item['price']); ?> </td>
                <td class="text-right"><?php echo moneda($transport_item['quantity'] * $transport_item['price']); ?> </td>
                <td class="text-right">
                    <?php
                    echo ($transport_item['discounts_mode'] == '%') ?
                            " ( $transport_item[discounts]$transport_item[discounts_mode] ) " : "";
                    echo moneda($transport_item['totaldiscounts']);
                    ?>
                </td>  
                <td class="text-right"><?php echo moneda($transport_item['subtotal']); ?> </td>
                <td class="text-right">
                    (<?php echo "$transport_item[tax]"; ?> %) <?php echo moneda($transport_item['totaltax']); ?> </td>                                                                
                <td class="text-right"><?php echo moneda($transport_item['subtotal'] + $transport_item['totaltax']); ?> </td>                                
            </tr>
            <?php
            $class = "";
            $separator = false;
        }
        ?>
    </tr>        
    <tr>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>  

        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><?php _t("Totals"); ?></td>                                                    
        <td class="text-right"><?php echo moneda($transport_subtotal + $transport_discounts); ?></td>
        <td class="text-right"><?php echo moneda($transport_discounts); ?></td>
        <td class="text-right"><?php echo moneda($transport_subtotal); ?></td>
        <td class="text-right"><?php echo moneda($transport_tax); ?></td>
        <td class="text-right info"><b><?php echo moneda($transport_tvac); ?></b></td> 


    </tr>    

    <?php #####################################################################       ?>
    <?php ###  // T R A N S P O R T ###########################################    ?>    
    <?php #####################################################################   ?>
    <?php #####################################################################  ?>
    <?php #####################################################################  ?>
<?php } ?>    

<?php # Tax items total ############################################         ?>
<?php
/// TVA
/// TVA
/// TVA
/// TVA
/// TVA
/// TVA
/// TVA
/// TVA
/// TVA

$tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

//vardump($tax_by_country); 

foreach ($tax_by_country as $key => $tax) {
    ?> 



    <?php // foreach (country_tax_list_by_country(config_system_country()) as $key => $tax) {  ?> 
    <tr>
        <th></th>        
        <?php if (modules_field_module('status', 'audio')) { ?>
            <th></th>
            <th></th>
            <th></th>
        <?php } else { ?>
            <th></th>
            <?php if (modules_field_module('status', 'products')) { ?><th></th><?php } ?>
        <?php } ?>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" class="text-right">
            <?php echo _t("Total tva") . ' ' . "$tax[tax] %"; ?>
        </td>
        <td class="text-rigdht">
            <?php
//            vardump(budget_lines_total_by_tax($id, $tax['value']));

            echo moneda(budget_lines_total_by_tax($id, $tax['tax']));
            ?>
        </td>
        <td></td>
    </tr>

<?php } ?>                    
<?php # Tax items total ############################################         ?>

<tr>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>
    <?php if (modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>
    <td></td>   
    <td></td>   
    <td></td>   
    <td></td>   
    <td></td>   
    <td></td>   
    <td colspan="2" class="text-right"><b><?php _t("Total"); ?></b></td>                        
    <td class="text-right info"><b><?php echo moneda(($total_tvac + $transport_tvac) - budgets_field_id("advance", $id)); ?></b></td>
</tr>
</table>