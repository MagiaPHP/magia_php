
<div class="well text-center">
    <h1>
        <?php _t("Invoice"); ?> : <?php //echo invoices_numberf($id);  ?> <?php echo invoices_numberf_to_print($id, 1); ?>    
    </h1>
</div>

<div class="row">

    <div class="col-sm-12 col-md-3 col-lg-3">                     
        <?php include "part_details_office.php"; ?>  
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">                     
        <?php include "part_details_company.php"; ?>  
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">                     
        <?php include "part_details_billing_address.php"; ?>  
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">                                
        <?php
        if (_options_option('config_address_use_delivery')) {
            include "part_details_delivery_address.php";
        }
        ?>                
    </div>

</div>

<div class="panel panel-default">
    <div class="panel-heading">

        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'items', array('c' => $c, 'a' => $a, 'id' => $id));
        }
        ?>

        <?php _t("Items"); ?></div>
    <div class="panel-body">

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>#</th>
                    <?php if (modules_field_module('status', 'audio')) { ?><th>##</th><?php } ?>
                    <?php if (modules_field_module('status', 'products')) { ?><th><?php _t("Code"); ?></th><?php } ?>
                    <th><?php _t("Description"); ?></th>
                    <th><?php _t("Quantity"); ?></th>
                    <th class="text-right"><?php _t("Price U."); ?></th>
                    <th class="text-right"><?php _t("Sub total"); ?></th>
                    <th class="text-right"><?php _t("Discounts"); ?></th>
                    <th class="text-right"><?php _t("HTax"); ?></th>
                    <th class="text-right"><?php _t("Tax"); ?></th>
                    <th class="text-right"><?php _t("Taxc"); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $subtotal = 0;
                $tax = 0;
                $tvac = 0;
                $discounts = 0;
                $separator = false;
                $class = "";
                $i = 1;
                $j = 2;
                $q = 1;
                $count_orders = 0; // cuenta los pedidos
                $new_order = false;
                $class_code = "";

                foreach (invoice_lines_list_without_transport_by_invoice_id($id) as $key => $invoice_items) {







                    // items
                    $subtotal = $subtotal + $invoice_items['subtotal'];
                    $tax = $tax + $invoice_items['totaltax'];
                    $tvac = $tvac + ($invoice_items["subtotal"] + $invoice_items["totaltax"]);
                    $discounts = $discounts + ($invoice_items["totaldiscounts"]);
                    $discounts_mode = ($invoice_items['discounts_mode'] == '%') ? "( $invoice_items[discounts]$invoice_items[discounts_mode] )" : "";
//
                    if ($invoice_items['description']) {
                        if (stripos($invoice_items['description'], "---") !== FALSE) {
                            $class = " success ";
                            $separator = true;
                        }
                    }

                    //----------------------------------------------------------
                    if ($invoice_items['code']) {
                        $class = ( strstr($invoice_items['code'], "BUDGET") ) ? "info" : $class; // en la posicion cero  
                        $class = ( strstr($invoice_items['code'], "ORDER") ) ? "danger" : $class; // en la posicion cero 

                        $class_code = (
                                strstr($invoice_items['code'], "SIDEL") ||
                                strstr($invoice_items['code'], "SIDER") ||
                                strstr($invoice_items['code'], "SIDES")
                                ) ? "danger" : $class; // en la posicion cero
                    }
                    //    
                    // No traduzco en caso que sea

                    if (
                            $invoice_items['code'] == 'ORDER' ||
                            $invoice_items['code'] == 'BUDGET' ||
                            $invoice_items['code'] == 'PAT' ||
                            $invoice_items['code'] == 'POST'
                    ) {
                        $description = $invoice_items['description'];
                    } else {
                        // solo  si audio esta activo 
                        if (modules_field_module('status', 'audio')) {
                            $description = _tr($invoice_items['description']);
                        } else {
                            $description = ($invoice_items['description']);
                        }
                    }


                    $new_order = ( $invoice_items['code'] == 'BUDGET' ) ? true : false;
                    ?>    


                    <?php
                    if ($new_order && $i > 1) {
                        $q = 1;
                        ?> 
                        <tr class="warning">
                            <th><?php echo $j++; ?></th>
                            <?php if (modules_field_module('status', 'audio')) { ?><th>##</th><?php } ?>
                            <?php if (modules_field_module('status', 'products')) { ?><th><?php _t("Code"); ?></th><?php } ?>
                            <th><?php _t("Description"); ?></th>
                            <th><?php _t("Quantity"); ?></th>
                            <th class="text-right"><?php _t("Price U."); ?></th>
                            <th class="text-right"><?php _t("Sub total"); ?></th>
                            <th class="text-right"><?php _t("Discounts"); ?></th>
                            <th class="text-right"><?php _t("HTax"); ?></th>
                            <th class="text-right"><?php _t("Tax"); ?></th>
                            <th class="text-right"><?php _t("Taxc"); ?></th>
                        </tr>

                        <?php
                    }
                    /////////////////////////////////////////////////////////////
                    if (_options_option('config_invoices_show_tr_no_price')) {
                        include "tr_details.php";
                    } else {
                        if ($invoice_items['price'] == 0 || $invoice_items['price'] == null) {

                            include "tr_details_no_price.php";
                        } else {
                            include "tr_details.php";
                        }
                    }
                    ///////////////////////////////////////////////////////////
                    $class = "";
                    $separator = false;
                } // fin de la bucle de items
                ?>
            </tbody>






            <tr>
                <th>#</th>
                <?php if (modules_field_module('status', 'audio')) { ?><th>##</th><?php } ?>                <?php if (modules_field_module('status', 'products')) { ?><th><?php _t("Code"); ?></th><?php } ?>
                <th><?php _t("Description"); ?></th>
                <th><?php _t("Quantity"); ?></th>
                <th class="text-right"><?php _t("Price U."); ?></th>
                <th class="text-right"><?php _t("Sub total"); ?></th>
                <th class="text-right"><?php _t("Discounts"); ?></th>
                <th class="text-right"><?php _t("HTax"); ?></th>
                <th class="text-right"><?php _t("Tax"); ?></th>
                <th class="text-right"><?php _t("Taxc"); ?></th>
            </tr>

            <tr>
                <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>
                <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>
                <td></td>
                <td></td>
                <td></td>

                <td class="text-right"><?php _t("Totals"); ?></td>                                                    
                <td class="text-right"><?php echo moneda($subtotal + $discounts); ?></td>

                <td class="text-right"><?php echo moneda($discounts); ?></td>
                <td class="text-right"><?php echo moneda($subtotal); ?></td>
                <td class="text-right"><?php echo moneda($tax); ?></td>
                <td class="text-right info"><b><?php echo moneda($tvac); ?></b></td>               
            </tr>

            <?php
            $transport_tvac = 0;

            if (modules_field_module('status', 'transport')) {
                ?>
                <?php #####################################################################  ?>
                <?php ### T R A N S P O R T ############################################### ?>    
                <?php ##################################################################### ?>
                <?php ##################################################################### ?>
                <?php #####################################################################   ?>
                <?php #####################################################################     ?>    
                <tr>

                    <th colspan="8"><?php _t("Transport"); ?></th>       
                    <th></th>
                    <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
                    <?php if (modules_field_module('status', 'transport')) { ?><td></td><?php } ?>        
                </tr> 

                <tr>
                    <?php if (modules_field_module('status', 'audio')) { ?>
                        <th>#</th>
                        <th>##</th>
                    <?php } else { ?>
                        <th>#</th>
                    <?php } ?>
                    <th><?php _t("Code"); ?></th>
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
                    $transport_subtotal = 0;
                    $transport_tax = 0;
                    $transport_tvac = 0;

                    $transport_discounts = 0;
                    $transport_class = "";
                    $transport_separator = false;

                    $i = 1;

                    foreach (invoice_lines_list_transport_by_invoice_id($id) as $key => $transport_item) {
                        $transport_subtotal = $transport_subtotal + $transport_item['subtotal'];
                        $transport_tax = $transport_tax + $transport_item['totaltax'];
                        $transport_tvac = $transport_tvac + ($transport_item["subtotal"] + $transport_item["totaltax"]);
                        $transport_discounts = $transport_discounts + ($transport_item["totaldiscounts"]);
                        $transport_description = $transport_item['description'];
                        ?>   
                    <tr class="<?php echo $class; ?>">
                        <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>  
                        <td><?php echo $i++; ?></td>
                        <td><?php echo "$transport_item[code]"; ?></td>
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

                    <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>
                    <?php if (modules_field_module('status', 'transport')) { ?><td></td><?php } ?>
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
                <?php #####################################################################     ?>
                <?php ###  // T R A N S P O R T ###########################################   ?>    
                <?php #####################################################################  ?>
                <?php ##################################################################### ?>
                <?php #####################################################################   ?>
            <?php } ?>    
            <tr>
                <th></th>       
                <th colspan="8"></th>       
                <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'transport')) { ?><td></td><?php } ?>        
            </tr>  

            <?php # Tax items total ############################################          ?>
            <?php
            $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

            foreach ($tax_by_country as $key => $tax) {
                ?>                        
                <tr>
                    <td></td>
                    <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>
                    <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="3" class="text-right"><?php
                        _t("Total tva");
                        echo " $tax[tax] %";
                        ?>
                    </td>
                    <td colspan="1" class="text-right"><?php echo moneda(invoice_lines_total_by_tax($id, $tax['tax'])); ?></td>
                    <td></td>
                </tr>                        
            <?php } ?>
            <?php # Tax items total ############################################               ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>
                <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>
                <td></td>
                <td colspan="2"class="text-right"><?php _t("Advance"); ?></td>
                <td class="text-right"><?php echo moneda(invoices_field_id("advance", $id)); ?></td>
            </tr>

            <tr>
                <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>
                <?php if (modules_field_module('status', 'audio')) { ?><td></td><?php } ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right"><b><?php _t("To pay"); ?></b></td>                        
                <td class="text-right info"><b><?php echo moneda($transport_tvac + ($tvac - invoices_field_id("advance", $id))); ?></b></td>
            </tr>
        </table>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">

        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'ce', array('c' => $c, 'a' => $a, 'id' => $id));
        }
        ?>

        <?php _t("Comunication"); ?></div>
    <div class="panel-body">
        <?php echo $invoices['ce']; ?>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'comments', array('c' => $c, 'a' => $a, 'id' => $id));
        }
        ?>
        <?php _t("Comments"); ?></div>
    <div class="panel-body">                
        <?php echo $invoices['comments']; ?></h3>
    </div>
</div>




<?php
$budgets = budgets_invoices_search_budgets_by_invoice_id($id);

if ($budgets) {
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">

    <?php
    if (modules_field_module('status', "docu")) {
        echo docu_modal_bloc($c, $a, 'budgets_in_invoice');
    }
    ?>


    <?php _t("Budgets on this invoice"); ?>

        </div>
        <div class="panel-body">
    <?php
    include "table_details_budgets_in_invoice.php";
    ?>
        </div>
    </div> 

<?php } ?>


<?php
// los comentarios estan en el footer de home
?>


<?php
//echo "<h3>" . _t("Budgets on this invoice") . "</h3>" ;
//if ( $invoices['type'] == "M" ) {
//    $budgets = budgets_invoices_search_budgets_by_invoice_id($id) ;
//    include "table_details_budgets_in_invoice.php" ;
//}
//  $budgets = budgets_invoices_search_budgets_by_invoice_id($id) ;
//include "table_details_budgets_in_invoice.php" ;
//include "budgets_on_this_invoice3.php" ;
// $budgets = budgets_invoices_search_budgets_by_invoice_id($id); 
// include "table_budgets_in_invoice.php"
?>

