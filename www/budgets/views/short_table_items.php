
<table class="table table-striped">
    <?php
    /**
     *     <thead>
      <tr>
      <th><?php _t("#"); ?></th>
      <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>
      <th><?php _t("Description"); ?></th>
      <th><?php _t("Quantity"); ?></th>
      <th class="text-right"><?php _t("Price U."); ?></th>
      <th class="text-right"><?php _t("Sub total"); ?></th>
      <th class="text-right"><?php _t("Discounts"); ?></th>
      <th class="text-right"><?php _t("Htva"); ?></th>
      <th class="text-right"><?php _t("Tax"); ?></th>
      <th class="text-right"><?php _t("Tvac"); ?></th>
      <th class="text-right"><?php _t("Edit"); ?></th>
      <th class="text-right"><?php _t("Delete"); ?></th>
      </tr>
      </thead>
     * 
     */
    ?>
    <thead>
        <tr>
            <th><?php _t("#"); ?></th>
            <th width="50%"><?php _t("Description"); ?></th>                            
            <th><?php _t("Quantity"); ?></th>
            <th class="text-right"><?php _t("Price U."); ?></th>
            <th class="text-right"><?php _t("Total"); ?></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody class="row_position">
        <?php
        // <tbody class="row_position">
//        $items = budget_lines_list_by_budget_id_without_transport($id);
        //$items = budget_lines_list_by_budget_id($id);

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
                include "short_edit_tr_price.php";
            } else {
                if ($budget_items['price'] == 0 || $budget_items['price'] == null) {
                    include "short_edit_tr_no_price.php";
                } else {
                    include "short_edit_tr_price.php";
                }
            }


            $class = "";
            $separator = false;
        }
        ?>


        <tr>

            <td colspan='7'>
                <a name="separator"></a>
                <?php include "short_modal_add_separator.php"; ?>
            </td>

        </tr>

        <?php
        // include "short_part_table_items_add.php"; 
        ?>



        <?php
        /**
         *         <tr>
          <th><?php _t("#"); ?></th>
          <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>
          <th><?php _t("Description"); ?></th>
          <th><?php _t("Quantity"); ?></th>
          <th class="text-right"><?php _t("Price U."); ?></th>
          <th class="text-right"><?php _t("Sub total"); ?></th>
          <th class="text-right"><?php _t("Discounts"); ?></th>
          <th class="text-right"><?php _t("Htva"); ?></th>
          <th class="text-right"><?php _t("Tax"); ?></th>
          <th class="text-right"><?php _t("Tvac"); ?></th>
          <th class="text-right"><?php _t("Edit"); ?></th>
          <th class="text-right"><?php _t("Delete"); ?></th>
          </tr>
         */
        ?>




        <?php
        /**
         *         <tr>
          <?php if (modules_field_module('status', 'audio')) { ?>
          <td></td>
          <?php } else { ?>
          <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>
          <?php } ?>
          <td colspan="2" class="text-right"><?php _t("Totals"); ?></td>
          <td class="text-right"><?php echo moneda($total_sub_total); ?></td>
          <td class="text-right"><?php echo moneda($total_discounts); ?></td>
          <td class="text-right"><?php echo moneda($total_sub_total - $total_discounts); ?></td>
          <td class="text-right"><?php echo moneda($total_tax); ?></td>
          <td class="text-right info"><b><?php echo moneda($total_tvac); ?></b></td>
          <td></td>
          <td></td>
          </tr>

         */
        ?>


        <?php
// mostramos solo si hay items transporte
        if (modules_field_module('status', 'transport') || budget_lines_list_transport_by_budget_id($id)) {
            //if( budget_lines_list_transport_by_budget_id($id)){ 
            ?>
            <?php ##################################################################### ?>
            <?php ### T R A N S P O R T ############################################### ?>    
            <?php ##################################################################### ?>
            <?php ##################################################################### ?>
            <?php ##################################################################### ?>
            <?php ##################################################################### ?>    
            <tr>
                <th><?php _t("Transport"); ?></th>                    
                <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?><th><?php _t("Code"); ?></th><?php } ?>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>         
            </tr>  




            <tr>                                
                <th>#</th>                                        
                <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>   
                <th><?php _t("Description"); ?></th>
                <th><?php _t("Quantity"); ?></th>
                <th class="text-right"><?php _t("Price U."); ?></th>
                <th class="text-right"><?php _t("Sub total"); ?></th>        
                <th class="text-right"><?php _t("Discounts"); ?></th>
                <th class="text-right"><?php _t("Htva"); ?></th>
                <th class="text-right"><?php _t("TVA"); ?></th>
                <th class="text-right"><?php _t("Tvac"); ?></th>
                <th class="text-right"><?php _t("Edit"); ?></th>
                <th class="text-right"><?php _t("Delete"); ?></th>
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

                    <td><?php echo $i++; ?></td>



                    <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?>
                        <td><?php echo "$transport_item[code]"; ?></td>
                    <?php } ?>

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
                    <td><?php // include "modal_items_edit.php";                                          ?></td>
                    <td class="text-right">             
                        <a class="btn btn-danger btn-md" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$transport_item[id]"; ?>&redi=1">
                            <span class="glyphicon glyphicon-trash"></span>
                            <?php _t("Delete"); ?>
                        </a>            
                    </td>                    
                </tr>
                <?php
                $class = "";
                $separator = false;
            }
            ?>
            </tr> 


            <tr>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right"><?php _t("Totals"); ?></td>                                                    
                <td class="text-right"><?php echo moneda($transport_subtotal + $transport_discounts); ?></td>
                <td class="text-right"><?php echo moneda($transport_discounts); ?></td>
                <td class="text-right"><?php echo moneda($transport_subtotal); ?></td>
                <td class="text-right"><?php echo moneda($transport_tax); ?></td>
                <td class="text-right info"><b><?php echo moneda($transport_tvac); ?></b></td> 
                <td></td>
                <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>   

            </tr>    

            <?php #####################################################################  ?>
            <?php ###  // T R A N S P O R T ###########################################  ?>    
            <?php ##################################################################### ?>
            <?php ##################################################################### ?>
            <?php ##################################################################### ?>
        <?php } ?>    
    </tbody>

    <?php # TAX ############################################    ?>
    <?php # TAX ############################################    ?>
    <?php # TAX ############################################    ?>
    <?php # TAX ############################################    ?>
    <?php # TAX ############################################    ?>
    <?php # TAX ############################################    ?>
    <?php # TAX ############################################    ?>
    <?php
    $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
//vardump($tax_by_country); 

    foreach ($tax_by_country as $key => $tax) {
        ?>                        
        <?php // foreach (tax_list_by_status(1) as $key => $tax) {  ?>                        
        <tr>          
            <td></td>
            <td class="text-right"><?php _t("Total tax"); ?> <?php echo $tax['tax']; ?>%</td>
            <td class="text-right"><?php echo moneda(budget_lines_total_by_tax($id, $tax['tax'])); ?></td>                                                        
            <td></td>
            <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
            <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>        
            <td></td>

        </tr>
    <?php } ?>      

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><b><?php _t("Total Htva"); ?></b></td>
        <td class="text-right"><b><?php echo moneda($total_sub_total - $total_discounts); ?></b></td>                    
        <td></td>
        <td></td>            
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><b><?php _t("Total Tva"); ?></b></td>
        <td class="text-right"><b><?php echo moneda($total_tax); ?></b></td>                    
        <td></td>
        <td></td>            
    </tr>




    <tr>
        <td></td>
        <td></td>        
        <td></td>
        <td class="text-right"><b><?php _t("Total Tvac"); ?></b></td>                                                
        <td colspan="0"class="text-right info"  >
            <b>
                <?php echo moneda(($total_tvac + $transport_tvac ) - budgets_field_id("advance", $id)); ?>
            </b>
        </td>

        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
        <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>  

    </tr>





</table>


<?php order_by_create_javascript_html('budget_lines'); ?>




