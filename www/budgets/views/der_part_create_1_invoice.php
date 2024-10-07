<div class="panel panel-default">
    <div class="panel-heading"><?php _t("1 Invoice"); ?></div>
    <div class="panel-body">
        <p><?php _t("Create a single invoice by copying all budget items into the invoice"); ?></p>
        <?php
        //  echo var_dump(invoices_search_by_budget_id($id)); 
        // si no existe facturas realcionadas con esta devis
        if (!invoices_search_by_budget_id($id)) {
            include "modal_invoice_create_one.php";
        } else {
            message('info', 'If you want to create more invoices, choose "Partials invoices"');
        }
        ?>
    </div>
</div>