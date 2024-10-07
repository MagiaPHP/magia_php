<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
        <?php include view("invoices", "izq_home"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

        <?php // include view("invoices", "nav"); ?>

        <h1>Home</h1>
        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }


        $invoices_total = invoices_total_by_multi_code_year(array(10, 20, 30), 2023)['total'];
        $invoices_tax = invoices_total_by_multi_code_year(array(10, 20, 30), 2023)['tax'];
        $total_sell = ($invoices_total + $invoices_tax);
//
//
        $total_credit_notes_total = credit_notes_total_by_multi_code_year(array(10, 20), 2023)['total'];
        $total_credit_notes_tax = credit_notes_total_by_multi_code_year(array(10, 20), 2023)['tax'];
        $total_credit_notes = $total_credit_notes_total + $total_credit_notes_tax;
//
//
        $total_expenses_total = expenses_total_by_multi_code_year(array(0, 10, 20, 30), 2023)['total'];
        $total_expenses_tax = expenses_total_by_multi_code_year(array(0, 10, 20, 30), 2023)['tax'];
        $total_expenses = $total_expenses_total + $total_expenses_tax;
//

        $total_resultat = $total_sell - ($total_credit_notes + $total_expenses)
        ?>

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="text-right"><?php _t("Valor"); ?></th>
                    <th class="text-right"><?php _t("Valor"); ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ventas</td>
                    <td></td>
                    <td class="text-right"><?php echo moneda($invoices_total + $invoices_tax); ?></td>
                </tr>
                <tr>
                    <td><?php _t("Credit notes"); ?></td>
                    <td class="text-right"><?php echo moneda($total_credit_notes); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php _t("Expenses"); ?></td>
                    <td class="text-right"><?php echo moneda($total_expenses); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td><?php _t("Resultat"); ?></td>
                    <td></td>
                    <td class="text-right info"><?php echo moneda($total_resultat); ?></td>
                </tr>
            </tbody>

        </table>




        <?php //include view("invoices", "top");   ?>

        <?php ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 




