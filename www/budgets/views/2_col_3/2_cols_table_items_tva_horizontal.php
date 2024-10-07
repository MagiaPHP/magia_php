
<tr>
    <td colspan='<?php echo count($cbects) - 6; ?>'>     
        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'items_tva_horizontal');
        }
        ?>

        <?php _t("TVA"); ?>

        <?php if (permissions_has_permission($u_rol, 'config', "update")) { ?>
            <a href="index.php?c=expenses&a=ok_2_cols_table_items_tva&data=v&redi[redi]=3&redi[id]=<?php echo $id; ?>"><?php echo icon("option-vertical"); ?></a>    
            <?php echo icon("option-horizontal"); ?>
        <?php } ?>

    </td>                    
    <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?><th><?php _t("Code"); ?></th><?php } ?>        


</tr>  


<tr>

    <?php
    for ($i = 1; $i <= count($cbects) - 14; $i++) {
        echo '<td></td>';
    }
    ?>


    <td class="text-right"><b><?php _t("Sub total"); ?></b></td>
    <td class="text-right"><b><?php _t("Discounts"); ?></b></td>
    <td class="text-right"><b><?php _t("Total htva"); ?></b></td>
    <td class="text-right"><b><?php _t("Tva"); ?></b></td>
    <td class="text-right"><b><?php _t("Total tvac"); ?></b></td>            
    <td></td>
    <td></td>
    <td></td>

</tr>

<tr>
    <?php
    for ($i = 1; $i <= count($cbects) - 14; $i++) {
        echo '<td></td>';
    }
    ?>
    <td class="text-right"><?php echo moneda(expenses_lines_sum_subtotal($expense->getId())); ?></td>
    <td class="text-right"><?php echo moneda(expenses_lines_sum_discounts($expense->getId())); ?></td>
    <td class="text-right"><?php echo moneda(expenses_lines_sum_htva($expense->getId())); ?></td>
    <td class="text-right"><?php echo moneda(expenses_lines_sum_tax($expense->getId())); ?></td>
    <td class="text-right"><?php echo moneda(expenses_lines_sum_tvac($expense->getId())); ?></td>
    <td></td>
    <td></td>
    <td></td>
</tr>


<?php
$tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id(u_owner_id())['country']);
//vardump($tax_by_country); 

foreach ($tax_by_country as $key => $tax) {
    ?>                        
    <tr>
        <?php
        for ($i = 1; $i <= count($cbects) - 12; $i++) {
            echo '<td></td>';
        }
        ?>
        <td colspan="1" class="text-right"><?php _t("Tva"); ?> <?php echo $tax['tax']; ?>%</td>

        <td class="text-right"><?php echo moneda(expenses_lines_total_by_tax($id, $tax['tax'])); ?></td>                                                        

        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        

        <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>        

        <td></td>
        <td></td>
        <td></td>
        <td></td>


    </tr>
<?php } ?>               




<tr>
    <?php
    for ($i = 1; $i <= count($cbects) - 11; $i++) {
        echo '<td></td>';
    }
    ?>
    <td class="text-right"><b><?php _t("Total"); ?></b></td>                                                
    <td colspan="0"class="text-right info"  >
        <b>
            <?php echo moneda(( expenses_lines_sum_tvac($expense->getId()) + $transport_tvac)); ?>
        </b>
    </td>

    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
    <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>  
    <td></td>
    <td></td>
    <td></td>
</tr>
</table>