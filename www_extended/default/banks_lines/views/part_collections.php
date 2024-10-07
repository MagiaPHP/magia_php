
<form  class="form-inline" method="get" action="index.php">

    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="record_collections">
    <input type="hidden" name="show_invoice" value="1">

    <div class="form-group">
        <label for="txt" class="sr-only"><?php _t("txt"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            name="txt" 
            id="txt" 
            placeholder=""
            value="<?php echo clean($_GET['txt']) ?>"
            >
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Search sale invoice"); ?>
    </button>
</form>

<?php
//include "modal_record_collections_inv_cols_to_show.php"; 
?>

<h3>
    <?php _t("Sales invoices"); ?>
</h3>

Varios pago una factura y con un solo pago varias facturas


<table class="table table-condensed" border>
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th class="text-right"><?php _t("Total tvac"); ?></th>
            <th class="text-right"><?php _t("Already pay"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>
            <th><?php _t('Date'); ?></th>            
            <th><?php _t('Client'); ?></th>            
            <th><?php _t('Title'); ?></th>                               
            <th><?php _t('Status'); ?></th>                               
            <th><?php _t('Details'); ?></th>                               
        </tr>
    </thead>

    <tbody>        
        <?php
        foreach (invoices_search_by_multi_code_full(array(10, 20, 30), $txt) as $key => $il) {
            $invoice = new Invoices();
            $invoice->setInvoice($il['id']);

            $details_btn = '<form method="get" action="index.php">
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="record_collections_details">
    <input type="hidden" name="id" value="' . $invoice->getId() . '">
    <input type="hidden" name="redi[redi]" value="1">

    <button type="submit" class="btn btn-primary">
        ' . _tr("Details") . '
        ' . icon("chevron-right") . '
    </button>
</form>
';

            echo '
    <tr>
        <td>' . $invoice->getId() . '</td>        
        <td class="text-right">' . moneda($invoice->getTotal()) . '</td>
        <td class="text-right">' . moneda($invoice->getAdvance()) . '</td>
        <td class="text-right">' . moneda($invoice->getTotal() + $invoice->getTax() - abs($invoice->getAdvance())) . '</td>
        <td>' . $invoice->getDate() . '</td>
        <td>' . contacts_formated($invoice->getClient_id()) . '</td>
        <td>' . $invoice->getTitle() . '</td>                           
        <td>' . invoice_status_search_by_unique('status', 'code', $invoice->getStatus()) . '</td>                           
            
        <td>' . $details_btn . '</td>
    </tr>
    ';
        }
        ?>

    </tbody>

</table>



