<h3>
    <?php _t("Sales invoices"); ?>
</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th><?php echo _tr("Id"); ?></th>
            <th><?php echo _tr("Client"); ?></th>
            <th><?php echo _tr("Date"); ?></th>
            <th><?php echo _tr("Total tvac"); ?></th>
            <th><?php echo _tr("Advance"); ?></th>
            <th class="text-right"><?php echo _tr("Solde"); ?></th>
            <th><?php echo _tr("ce"); ?></th>
            <th><?php echo _tr("Status"); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $txt = "";

        foreach (invoices_search($txt) as $key => $invoice) {
            echo '<tr>
                    
                    <td><a href="index.php?c=invoice&a=details&id=' . $invoice['client_id'] . '">' . ($invoice['id']) . '</a></td>
                    <td><a href="index.php?c=contacts&a=details&id=' . $invoice['client_id'] . '">' . contacts_formated($invoice['client_id']) . '</a></td>
                    <td>' . ($invoice['date']) . '</td>
                    
                    <td  class="text-right">' . moneda($invoice['total'] + $invoice['tax']) . '</td>
                    <td  class="text-right">' . moneda($invoice['advance']) . '</td>
                    <td  class="text-right">' . moneda(($invoice['total'] + $invoice['tax']) - ($invoice['advance'])) . '</td>
                    <td>' . ($invoice['ce']) . '</td>
                    <td>' . ($invoice['status']) . '</td>
                </tr>';
        }
        ?>
    </tbody>

</table>