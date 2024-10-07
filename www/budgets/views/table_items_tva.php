
<?php
$tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

foreach ($tax_by_country as $key => $tax) {
    ?>                        
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><?php _t("Total tax"); ?> <?php echo $tax['tax']; ?>%</td>
        <td class="text-right"><?php echo moneda(budget_lines_total_by_tax($id, $tax['tax'])); ?></td>                                                        
        <td></td>
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
        <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>        
        <td></td>
        <td></td>
    </tr>
<?php } ?>               

<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="text-right"><b><?php _t("Total"); ?></b></td>                                                
    <td colspan="0"class="text-right info"  >
        <b>
            <?php echo moneda(($total_tvac + $transport_tvac ) - budgets_field_id("advance", $id)); ?>
        </b>
    </td>
    <td></td>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
    <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>  
    <td></td>
</tr>
