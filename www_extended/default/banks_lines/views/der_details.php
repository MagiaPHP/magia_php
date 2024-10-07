<h3>

    <?php _t("This bank line was used in:"); ?>

</h3>



<table class="table table-bordered">
    <thead>
        <tr>
            <th><?php _t("Record id"); ?></th>
            <th><?php _t("Contact"); ?></th>
            <th><?php _t("Document"); ?></th>

            <th><?php _t("Value"); ?></th>            
        </tr>
    </thead>

    <?php
    $doc_name = '';
    foreach (balance_search_by_account_ref($banks_lines->getMy_account(), $banks_lines->getOperation()) as $key => $bal) {

        $balance = balance_details($bal['id']);

        if ($balance['expense_id']) {
            $doc_name = 'Expense';
            $doc_id = $balance['expense_id'];
            $doc_link = '<a href="index.php?c=expenses&a=details&id=' . $doc_id . '">' . $doc_name . ' ' . $doc_id . '</a>';
        }
        if ($balance['invoice_id']) {
            $doc_name = 'Invoice';
            $doc_id = $balance['invoice_id'];
            $doc_link = '<a href="index.php?c=invoices&a=details&id=' . $doc_id . '">' . $doc_name . ' ' . $doc_id . '</a>';
        }
        if ($balance['credit_note_id']) {
            $doc_name = 'Credit note';
            $doc_id = $balance['credit_note_id'];
            $doc_link = '<a href="index.php?c=credit_notes&a=details&id=' . $doc_id . '">' . $doc_name . ' ' . $doc_id . '</a>';
        }

        echo '<tr>

            <td><a href = "index.php?c=balance&a=details&id=' . $balance['id'] . '">' . ($balance['id']) . '</a></td>
            <td><a href = "index.php?c=contacts&a=details&id=' . $balance['client_id'] . '">' . contacts_formated($balance['client_id']) . '</a></td>
            <td>' . ($doc_link) . '</td>

            <td>' . moneda($balance['total']) . '</td>
            </tr>';
        $doc_name = '';
    }
    ?>




</table>




<?php
if ($banks_lines->getTotal() < 0) {
    //  include "der_details_out.php";
} else {
    //  include "der_details_in.php";
}
?>