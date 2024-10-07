<table class="table table-striped" border>
    <thead>
        <tr>         
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Invoice"); ?></th>                        
            <th><?php _t("Total"); ?></th>
            <th><?php _t("Credit note"); ?></th>                                
            <th><?php _t("Total"); ?></th>
            <th><?php _t("Invoice"); ?></th>
            <th><?php _t("Credit note"); ?></th>                                        
            <th class="text-right"><?php _t("Total"); ?></th>              
            <th class="text-right"><?php _t("Total"); ?></th>              
            <th><?php _t("Canceled code"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>   
    <tbody>
        <?php foreach ($balance as $balance_item) { ?>

            <tr>
                <td><?php echo contacts_formated($balance_item['contact_id']); ?></td>
                <td><?php echo ($balance_item['invoice_id']); ?></td>
                <td class="text-right"><?php echo ($balance_item['invoice_total']); ?></td>                
                <td class="text-right"><?php echo ($balance_item['cn_id']); ?></td>                
                <td class="text-right"><?php echo ($balance_item['cn_total']); ?></td>                

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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <tfoot>
        <tr>         
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Dates"); ?></th>                        
            <th><?php _t("Type"); ?></th>
            <th><?php _t("Client"); ?></th>                                
            <th><?php _t("Expense"); ?></th>
            <th><?php _t("Invoice"); ?></th>
            <th><?php _t("Credit note"); ?></th>                                        
            <th class="text-right"><?php _t("Total"); ?></th>              
            <th class="text-right"><?php _t("Total"); ?></th>              
            <th><?php _t("Canceled code"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
</table>

<?php
vardump($balance);
?>



