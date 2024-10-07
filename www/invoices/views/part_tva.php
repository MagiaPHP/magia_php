<?php //include "modal_form_items_add.php" ;      ?>

<?php # Tax items total ############################################   ?>
<?php
$tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

foreach ($tax_by_country as $key => $tax) {
    ?>                        
    <tr>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>                                    
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        
        <td class="text-right"colspan="2" ><?php _t("Total tax");  echo " $tax[tax] %"; ?></td>
        <td class="text-right"><?php echo monedaf(invoice_lines_total_by_tax($id, $tax['tax'])); ?></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
<?php } ?>                    
<?php # Tax items total ############################################       ?>

<tr>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>                                    
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="text-right" colspan="2" ><?php _t("Advance"); ?></td>
    <td class="text-right" ><?php echo monedaf(invoices_field_id("advance", $id)); ?></td>
    <td></td>
    <td></td>
</tr>


<tr>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>                                    
    <td></td>
    <td></td>
    <td></td>                
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="text-right" colspan="2" ><?php _t("To pay"); ?></td>                        
    <td class="text-right info"><b><?php echo monedaf(($total_totaltvac + $transport_tvac ) - invoices_field_id("advance", $id)); ?></b></td>                                                
    <td></td>
    <td></td>
</tr>
