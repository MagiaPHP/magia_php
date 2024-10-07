<tr>
    <td colspan='<?php echo count($cbects) - 6; ?>'>    
        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'items_tva_vertical');
        }
        ?>

        <?php _t("TVA"); ?>
        <?php if (permissions_has_permission($u_rol, 'config', "update")) { ?>
            <?php echo icon("option-vertical"); ?>
            <a href="index.php?c=expenses&a=ok_2_cols_table_items_tva&data=h&redi[redi]=3&redi[id]=<?php echo $id; ?>"><?php echo icon("option-horizontal"); ?></a>    
        <?php } ?>
    </td>         

    <?php if (modules_field_module('status', 'audio') || modules_field_module('status', 'products')) { ?><th><?php _t("Code"); ?></th><?php } ?>        
</tr>  

<tr>    
    <?php
    for ($i = 1; $i <= count($cbects) - 11; $i++) {
        echo '<td></td>';
    }
    ?>

    <td class="text-right"><b><?php _t("Sub Total"); ?></b></td>                                                
    <td colspan="0"class="text-right info"  >
        <b>
            <?php echo moneda(expenses_lines_sum_subtotal($expense->getId())); ?>
        </b>
    </td>
    <td></td>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
    <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>  
    <td></td>
    <td></td>
</tr>


<tr>
    <?php
    for ($i = 1; $i <= count($cbects) - 11; $i++) {
        echo '<td></td>';
    }
    ?>

    <td class="text-right"><b><?php _t("Discounts"); ?></b></td>                                                
    <td colspan="0"class="text-right info"  >
        <b>
            <?php echo moneda(expenses_lines_sum_discounts($expense->getId())); ?>
        </b>
    </td>
    <td></td>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
    <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>  
    <td></td>
    <td></td>
</tr>





<tr>
    <?php
    for ($i = 1; $i <= count($cbects) - 11; $i++) {
        echo '<td></td>';
    }
    ?>

    <td class="text-right"><b><?php _t("Total Htva"); ?></b></td>                                                
    <td colspan="0"class="text-right info"  >
        <b>
            <?php echo moneda(expenses_lines_sum_htva($expense->getId())); ?>
        </b>
    </td>
    <td></td>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
    <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>  
    <td></td>
    <td></td>
</tr>


<?php
$tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
?>
<?php foreach ($tax_by_country as $key => $tax) { ?>                        
    <tr>

        <?php
        for ($i = 1; $i <= count($cbects) - 11; $i++) {
            echo '<td></td>';
        }
        ?>
        <td colspan="1" class="text-right"><?php _t("Tva"); ?> <?php echo $tax['tax']; ?>%</td>
        <td class="text-right"><?php echo moneda(expenses_lines_total_by_tax($expense->getId(), $tax['tax'])); ?></td>                                                        
        <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
        <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>        
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
            <?php echo moneda(expenses_lines_sum_tvac($expense->getId())); ?>
        </b>
    </td>
    <td></td>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?><td></td><?php } ?>        
    <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>  
    <td></td>
    <td></td>
</tr>


</table>