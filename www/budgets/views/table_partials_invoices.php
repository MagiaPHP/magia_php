


<table class="table table-condensed">
    <thead>
        <tr>
            <th><?php echo _t("#"); ?></th>
            <th><?php echo _t("Invoices"); ?></th>            
            <th class="text-right"><?php echo _t("Value"); ?></th>                        
            <th><?php echo _t("%"); ?></th>                        
            <th><?php echo _t('Status'); ?></th>                        
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $total_invoiced = 0;
        $total_invoice = null;
        $total_percent = 0;

        foreach (budgets_invoices_list_invoice_by_budget_id($id) as $key => $invoice) {

            $total_invoice = $invoice['total'] + $invoice['tax'];

            // para evitar la division por cero 
            $tvac = budgets_field_id('total', $id) + budgets_field_id('tax', $id);
            if ($tvac) {
                $percent = ( $total_invoice * 100) / ( $tvac );
            } else {
                $percent = ( $total_invoice * 100);
            }



            // si factura esta anulada no se suma 

            if (intval(invoices_field_id('status', $invoice['id']) != -10) && intval(invoices_field_id('status', $invoice['id']) != -20)) {
                $total_invoiced = $total_invoiced + $total_invoice;
            }


            $total_percent = $total_percent + $percent;

            echo '<tr>
            <td>' . $i . '</td>
            <td><a href="index.php?c=invoices&a=details&id=' . $invoice['id'] . '">' . _tr("Invoice") . ' ' . $invoice['id'] . '</a></td>
            <td class="text-right">' . moneda($total_invoice) . '</td>            
            <td>' . number_format($percent, 2) . '%</td>
                <td>' . _tr(invoice_status_by_status(invoices_field_id('status', $invoice['id']))) . '</td>
        </tr>';
            $i++;
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td class="text-right"><?php echo moneda($total_invoiced); ?></td>            
            <td><?php echo number_format($total_percent, 2); ?>% <?php _t("Total invoiced"); ?>  </td>  
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td class="text-right"><b><?php echo moneda($budgets['total'] + $budgets['tax'] - $total_invoiced); ?></b></td>            
            <td><?php echo number_format((100 - $total_percent), 2); ?>% <?php _t("Total budget"); ?>  </td>            
            <td></td>
        </tr>
    </tbody>
</table>

<?php
if ($total_invoiced > ($budgets['total'] + $budgets['tax'])) {
    message('danger', 'The amount invoiced is higher than the total budget');
}
?>
