<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>


<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_create_monhtly">
    <input type="hidden" name="redi" value="2">


    <table class="table table-striped table-condensed" border >
        <thead>
            <tr class="info">
                <th><?php _t("#"); ?></th>
                <th><?php _t("Select"); ?></th>
                <th><?php _t("headoffice"); ?></th>
                <th class="text-center">
                    1) <?php _t("Unbilled shipping notes"); ?> <br>
                    <?php echo "$year"; ?> - <?php echo _tr(magia_dates_month($month)); ?>
                </th>
                <th class="text-center">
                    2) <?php _t("Monhtly invoice"); ?><br>
                    <?php echo "$year"; ?> - <?php echo _tr(magia_dates_month($month)); ?>
                </th>
                <th><?php _t("Billing method"); ?></th>
                <th><?php _t("Error"); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr class="info">
                <th><?php _t("#"); ?></th>
                <th><?php _t("Select"); ?></th>
                <th><?php _t("headoffice"); ?></th>
                <th class="text-center">
                    1) <?php _t("Unbilled shipping notes"); ?> <br>
                    <?php echo "$year"; ?> - <?php echo _tr(magia_dates_month($month)); ?>
                </th>
                <th class="text-center">
                    2) <?php _t("Monhtly invoice"); ?><br>
                    <?php echo "$year"; ?> - <?php echo _tr(magia_dates_month($month)); ?>
                </th>
                <th><?php _t("Billing method"); ?></th>
                <th><?php _t("Error"); ?></th>
            </tr>
        </tfoot>
        <tbody>

            <?php
            // Todas las empresas que tienen un devis el mes x, sin ser aun facturado

            $companies = budgets_search_headoffice_whith_budgets_not_invoices($year, $month);

            $i = 1;
            $link_update_billing_method = "";
            $error_mb = "";
            $checkbox = "";
            $tr_class = "";

            foreach ($companies as $headoffice) {

                // la empresa debe ser una sede
                // esta empresa ya tiene una factura mensual para el mes de xx
                // un array con lista de facturas de un mes x que tengan typo M 
                $mi = invoices_search_monthly_invoices_by_client_id_y_m($headoffice['owner_id'], $year, $month);

                // total de devis no facturados 
                //$budgets_total = budgets_total_by_client_id_status($headoffice['owner_id'], 10);
                //vardump($month_anterior_anterior);

                $budgets_total = count(budgets_search_by_client_id_status_year_month($headoffice['owner_id'], 10, $year, $month));

                // esta empresa tiene facturacion mensual?
                $billing_method = contacts_field_id("billing_method", $headoffice['owner_id']);

                // enlace al contacto 
                $headoffice_id_link = "<a href='index.php?c=contacts&a=details&id=" . $headoffice['owner_id'] . "'>" . ($headoffice['owner_id']) . "</a>";

                // contacts link
                $headoffice_link = "<a href='index.php?c=contacts&a=details&id=" . $headoffice['owner_id'] . "'>" . contacts_formated($headoffice['owner_id']) . "</a>";

                // link to budgets no invoiced
                $link_to_no_invoiced = "<a href='index.php?c=contacts&a=budgets&id=" . $headoffice['owner_id'] . "&status=10'>$budgets_total</a>";

                // la factura que sea 
                // - mensual
                // - del año y mes
                // - de la empresa indicada
                // - que no sea anulada


                if ($billing_method !== 'M') {
                    $link_update_billing_method = "<a href='index.php?c=contacts&a=ok_billing_method&contact_id=" . $headoffice['owner_id'] . "&redi=2&billing_method=M'>" . _tr("Change to monhtly billing") . "</a>";
                    $error_mb = _tr("The method of billing is not monthly");
                }



                if ($billing_method == 'M' && count($mi) == 0) {
                    $checkbox = "<input type='checkbox' name='clients_id[]' value='" . $headoffice['owner_id'] . "' checked  >";
                } else {
                    $tr_class = " warning ";
                }


                $error_mi = ($mi) ? _tr("Invoice already exist") : false;

                echo "<tr >
            <td>" . $i++ . "</td>
            <td>$checkbox</td>                    

          
            <td class='$tr_class' >$headoffice_link</td>
            ";
                ?>

                <?php
                /**
                 *             <table class = "table table-condensed" border>
                  <tr>
                  <td>#</td>
                  <td>name</td>
                  <td>order</td>
                  </tr>

                  <?php
                  $i=1;
                  //vardump(budgets_search_offices_by_headoffice_whith_budgets_not_invoices($headoffice['owner_id']));
                  foreach (budgets_search_offices_by_headoffice_whith_budgets_not_invoices($headoffice['owner_id']) as $budget) {
                  echo "<tr>

                  <td>".$i++."</td>
                  <td>".($budget['client_id'])."</td>
                  <td>".contacts_formated($budget['client_id'])."</td>
                  <td><a href='index.php?c=budgets&a=details&id=$budget[id]'>".$budget['id']."</a></td>
                  <td>$ budget[addresses_billing]</td>
                  </tr>";



                  }
                  ?>
                  </table>
                 */
                ?>



                <?php
                echo "
            
            <td class='text-center'>$link_to_no_invoiced</td>";
                ?>


                <?php
                echo "
            <td>";

                foreach ($mi as $invoice_monthly) {
                    echo "Invoice " . $invoice_monthly[0] . " ";
                    echo invoice_status_by_status($invoice_monthly['status']) . "<br>";
                }

                echo "</td>            
            <td class='$tr_class'> $link_update_billing_method</td>         
            <td class='$tr_class'>
            <p>$error_mi</p>
            <p>$error_mb</p>
</td>
        </tr>";

                // reset la class
                $tr_class = "";
                $link_update_billing_method = "";
                $error_mb = "";
                $checkbox = "";
            }
            ?>


        </tbody>

    </table>









    <p>
        <?php _t("Create monthly invoices for each of these companies"); ?>
    </p>


    <div class="form-group">
        <label class="" for="all"><?php _t("Select all"); ?></label>
        <input type="checkbox" name="all" id="all" onclick="sellectAll(this);" checked="" /> 
        <span id="year" class="help-block"><?php _t("Items"); ?></span>

    </div>

    <div class="form-group">
        <label class="sr-only" for="year"><?php _t("Year"); ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="year" >            
            <?php
// selecciona el mes del presupuesto mas antiguo
            for ($i = budgets_get_year_1_budget(); $i <= date("Y"); $i++) {
                $selected = ($i == $year ) ? " selected " : "";
                ?>
                <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
            <?php } ?>
        </select>
        <span id="month" class="help-block"><?php _t("Year"); ?></span>
    </div>



    <div class="form-group">
        <label class="sr-only" for="month"><?php _t("month"); ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="month">            
            <?php
            for ($i = 1; $i <= 12; $i++) {
                $selected = ($i == $month ) ? " selected " : "";
                ?>
                <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?> <?php echo _t(magia_dates_month($i)); ?></option>
            <?php } ?>
        </select>
        <span id="month" class="help-block"><?php _t("Month"); ?></span>
    </div>

    <div class="form-group">
        <label class="sr-only" for="title"><?php _t("Title"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            name="title" 
            id="title" 
            placeholder="<?php _t("Invoice title"); ?>"
            value="<?php _t('Invoice'); ?>: <?php echo magia_dates_month($month); //echo _tr(magia_dates_month(magia_dates_get_month_from_date(magia_dates_remove_month(date("Y-m-d"), 1))))       ?>"
            >
        <span id="title" class="help-block"><?php _t("Invoice title"); ?></span>

    </div>

    <script>
        $(function () {
            $("#date").datepicker({
                maxDate: "+12M +0D",
                dateFormat: "yy-mm-dd"
            });
        });
    </script> 


    <div class="form-group">
        <label class="sr-only" for="invoice_date"><?php _t("Invoice date"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            name="invoice_date" 
            id="invoice_date" 
            placeholder="<?php _t("Invoice date"); ?>"
            value="<?php echo magia_dates_first_day_from_date("$year-$month-01"); ?>"
            >
        <span id="invoice_date" class="help-block"><?php _t("Invoice date"); ?></span>

    </div>



    <script>
        $(function () {
            $("#date_expiration2").datepicker({
                maxDate: "+12M +0D",
                dateFormat: "yy-mm-dd"
            });
        });
    </script> 





    <div class="form-group">
        <label class="sr-only" for="date_expiration2"><?php _t("Expiration date"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            name="date_expiration" 
            id="date_expiration2" 
            placeholder="<?php _t("Expiration date"); ?>"
            value="<?php //echo $date_expiration;    ?> <?php echo magia_dates_last_day_from_date("$year-$month-01"); ?>"
            >
        <span id="date_expiration2" class="help-block"><?php _t("Expiration date"); ?></span>

    </div>

    <div class="form-group">
        <label class="sr-only" for="send"><?php _t("Send"); ?></label>

        <button type="submit" class="btn btn-default">
            <?php _t('Create'); ?>
        </button>
        <span id="send" class="help-block">-</span>

    </div>




</form>








<?php
/**
 * // todos 
  http://localhost/jiho_23/index.php?c=contacts&a=ok_billing_method_all_contacts&redi=1
  // solo uno
  http://localhost/jiho_23/index.php?c=contacts&a=ok_billing_method&contact_id=54160&redi=1&billing_method=M


 */
?>




