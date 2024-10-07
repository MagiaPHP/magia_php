<?php
echo $order_id;
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Quantity"); ?></th>
            <th><?php _t("Code"); ?></th>
            <th><?php _t("Description"); ?></th>
            <th class="text-right"><?php _t("Price"); ?></th>
            <th class="text-right"><?php _t("Tax"); ?></th>
            <th class="text-right"><?php _t("Discounts"); ?></th>
            <th class="text-right"><?php _t("HTVA"); ?></th>
            <th class="text-right"><?php _t("TVA"); ?></th>
            <th class="text-right"><?php _t("TVAC"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        //$items = budget_lines_list_by_budget_id($id);   
        $subtotal = 0;
        $tax = 0;
        $tvac = 0;
        $discounts = 0;
        $class = "";
        $separator = false;

        //foreach (budget_lines_list_by_budget_id($id) as $key => $budget_items) {
        foreach (budget_lines_list_by_order_id($order_id) as $key => $budget_items) {

            if (stripos($budget_items['description'], "---") !== FALSE) {
                $class = " success ";
                $separator = true;
            }

            $class = ( strstr($budget_items['code'], "ORDER") ) ? "info" : $class; // en la posicion cero   
            $class = ( strstr($budget_items['code'], "SIDE") ) ? "danger" : $class; // en la posicion cero  
            //
            // No traduzco en caso que sea

            if (
                    $budget_items['code'] == 'ORDER' ||
                    $budget_items['code'] == 'PAT' ||
                    $budget_items['code'] == 'POST'
            ) {
                $description = $budget_items['description'];
            } else {
                $description = _tr($budget_items['description']);
            }







            $subtotal = $subtotal + $budget_items['subtotal'];
            $tax = $tax + $budget_items['totaltax'];
            $tvac = $tvac + ($budget_items["subtotal"] + $budget_items["totaltax"]);
            $discounts = $discounts + ($budget_items["totaldiscounts"]);
            ?>   


            <tr class="<?php echo $class; ?>">
                <?php if (!$separator) { ?> 
                    <td><?php echo "$budget_items[quantity]"; ?></td>
                    <td><?php echo "$budget_items[code]"; ?></td>
                    <td><?php echo $description; ?></td>
                    <td class="text-right"><?php echo moneda($budget_items['price']); ?> </td>
                    <td class="text-right"><?php echo "$budget_items[tax]"; ?> %</td>
                    <td class="text-right">
                        <?php
                        echo ($budget_items['discounts_mode'] == '%') ?
                                " ( $budget_items[discounts]$budget_items[discounts_mode] ) " : "";
                        echo moneda($budget_items['totaldiscounts']);
                        ?>
                    </td>  


                    <td class="text-right"><?php echo moneda($budget_items['subtotal']); ?> </td>
                    <td class="text-right"><?php echo moneda($budget_items['totaltax']); ?> </td>                                                                
                    <td class="text-right"><?php echo moneda($budget_items['subtotal'] + $budget_items['totaltax']); ?> </td>
                <?php } else { ?>
                    <td colspan="9"><?php echo $description; ?></td>
                <?php } ?>
            </tr>


            <?php
            $class = "";
            $separator = false;
        }
        ?>
    </tbody>


















</table>


<br>
<br>
<br>
<br>
<br>
<br>


<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Quantity"); ?></th>
            <th><?php _t("Code"); ?></th>
            <th><?php _t("Description"); ?></th>
            <th class="text-right"><?php _t("Price"); ?></th>
            <th class="text-right"><?php _t("Tax"); ?></th>
            <th class="text-right"><?php _t("Discounts"); ?></th>
            <th class="text-right"><?php _t("HTVA"); ?></th>
            <th class="text-right"><?php _t("TVA"); ?></th>
            <th class="text-right"><?php _t("TVAC"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
//$items = budget_lines_list_by_budget_id($id);   
        $subtotal = 0;
        $tax = 0;
        $tvac = 0;
        $discounts = 0;
        $class = "";
        $separator = false;

        foreach (budget_lines_list_by_budget_id($id) as $key => $budget_items) {

            if (stripos($budget_items['description'], "---") !== FALSE) {
                $class = " success ";
                $separator = true;
            }

            $class = ( strstr($budget_items['code'], "ORDER") ) ? "info" : $class; // en la posicion cero  
            // No traduzco en caso que sea

            if (
                    $budget_items['code'] == 'ORDER' ||
                    $budget_items['code'] == 'PAT' ||
                    $budget_items['code'] == 'POST'
            ) {
                $description = $budget_items['description'];
            } else {
                $description = _tr($budget_items['description']);
            }







            $subtotal = $subtotal + $budget_items['subtotal'];
            $tax = $tax + $budget_items['totaltax'];
            $tvac = $tvac + ($budget_items["subtotal"] + $budget_items["totaltax"]);
            $discounts = $discounts + ($budget_items["totaldiscounts"]);
            ?>   


            <tr class="<?php echo $class; ?>">
                <?php if (!$separator) { ?> 
                    <td><?php echo "$budget_items[quantity]"; ?></td>
                    <td><?php echo "$budget_items[code]"; ?></td>
                    <td><?php echo $description; ?></td>
                    <td class="text-right"><?php echo moneda($budget_items['price']); ?> </td>
                    <td class="text-right"><?php echo "$budget_items[tax]"; ?> %</td>
                    <td class="text-right">
                        <?php
                        echo ($budget_items['discounts_mode'] == '%') ?
                                " ( $budget_items[discounts]$budget_items[discounts_mode] ) " : "";
                        echo moneda($budget_items['totaldiscounts']);
                        ?>
                    </td>  


                    <td class="text-right"><?php echo moneda($budget_items['subtotal']); ?> </td>
                    <td class="text-right"><?php echo moneda($budget_items['totaltax']); ?> </td>                                                                
                    <td class="text-right"><?php echo moneda($budget_items['subtotal'] + $budget_items['totaltax']); ?> </td>
                <?php } else { ?>
                    <td colspan="9"><?php echo $description; ?></td>
                <?php } ?>
            </tr>


            <?php
            $class = "";
            $separator = false;
        }
        ?>
    </tbody>

    <tr>
        <th><?php _t("Quantity"); ?></th>
        <th><?php _t("Code"); ?></th>
        <th><?php _t("Description"); ?></th>
        <th class="text-right"><?php _t("Price"); ?></th>
        <th class="text-right"><?php _t("Tax"); ?></th>
        <th class="text-right"><?php _t("Discounts"); ?></th>
        <th class="text-right"><?php _t("HTVA"); ?></th>
        <th class="text-right"><?php _t("TVA"); ?></th>
        <th class="text-right"><?php _t("TVAC"); ?></th>
    </tr>

    <tr>
        <td colspan="5" class="text-right"><?php _t("Totals"); ?></td>                                                    
        <td class="text-right"><?php echo moneda($discounts); ?></td>
        <td class="text-right"><?php echo moneda($subtotal); ?></td>
        <td class="text-right"><?php echo moneda($tax); ?></td>
        <td class="text-right info"><b><?php echo moneda($tvac); ?></b></td>               
    </tr>

    <?php # Tax items total ############################################      ?>
    <?php
    $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
//vardump($tax_by_country); 

    foreach ($tax_by_country as $key => $tax) {
        ?>                        
        <tr>
            <td colspan="5"></td>
            <td colspan="2" class="text-right">
                <?php
                _t("Total tax");
                echo " $tax[tax] %";
                ?>
            </td>
            <td class="text-right">
                <?php echo moneda(budget_lines_total_by_tax($id, $tax['tax'])); ?>
            </td>



            <td></td>
        </tr>
    <?php } ?>                    
    <?php # Tax items total ############################################    ?>
    <?php
    /*
      <tr>
      <td colspan="6"></td>
      <td class="text-right"><?php _t("Advance"); ?></td>
      <td class="text-right"><?php echo moneda(budgets_field_id("advance", $id)); ?></td>



      </tr> */
    ?>


    <tr>
        <td colspan="6"></td>
        <td colspan="2" class="text-right"><?php _t("To pay"); ?></td>                        
        <td class="text-right"><?php echo moneda($tvac - budgets_field_id("advance", $id)); ?></td>

    </tr>





</table>
