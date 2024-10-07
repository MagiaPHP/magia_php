<div class="panel panel-default">
    <div class="panel-heading">
        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'create_partial_invoice');
        }
        ?>
        <?php _t("Create invoice"); ?>
    </div>

    <div class="panel-body">
        <p>
            <?php // _t("Create partia invoice by copying all budget items into the invoice") ;    ?>
        </p>

        <?php
        // si la suma de las facturas relacionadas con este presupuesto son iguales o superiores
        // al total de presupuesto, ya no puede agregar mas facturas 
        //
        //  echo vardump(invoices_total_invoiced_budget_id($id)); 

        if (budgets_invoices_total_invoiced_by_budget_id($id) >= $budget->getTotal_plus_tax()) {
            message('info', 'The total budget has been invoiced');
        } else {

//            echo "<p>" . monedaf(20) . " ( x % ) " . _tr("still to be invoiced") . "</p>" ;
            include "modal_invoice_create_partial.php";
        }
        ?>
    </div>
</div>