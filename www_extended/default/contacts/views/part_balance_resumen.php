<?php
// facturas
$resumen_a = (invoices_total_by_client_id_multi_code_year($id, array(10, 20, 30), $year)) ?? 0;
// cobros del cliente
//$resumen_b = (balance_total_payments_received_by_client_id_year($id, $year));
$resumen_b = balance_total_all_transactions_by_client_id_year($id, $year) ?? 0;
// notas de credito q debo pagar al cliente
// 10 Registado (debo pagar)
// 20 money returned (ya pagado)
// -10 (anuladas)
$resumen_c = (credit_notes_total_by_client_id_multi_code_year($id, array(10, 20), $year)) ?? 0;
// pagos que hice al cliente
$resumen_d = (balance_total_payments_send_to_client_by_client_id_year($id, $year)) ?? 0;

//vardump(
//        array(
//            $resumen_a,
//            $resumen_b,
//            $resumen_c,
//            $resumen_d
//        )
//);
// situacion actual 
$resumen_e = ($resumen_a - $resumen_b) - ($resumen_c - abs($resumen_d));
?>


<table class="table table-striped table-condensed table-bordered">
    <tr>
        <td>
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__) . '_invoices');
            }
            ?>


            <?php _t('Invoices'); ?></td>
        <td>a</td>
        <td class="text-right">
            <span class="label label-info">
                <?php echo moneda($resumen_a); ?>
            </span>
        </td>
    </tr>


    <tr>
        <td>
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__) . '_payements');
            }
            ?>



            <?php _t("Payments"); ?></td>
        <td>b</td>
        <td class="text-right">
            <span class="label label-warning">
                <?php echo moneda($resumen_b); ?>
            </span>
        </td>
    </tr>

    <tr>
        <td>
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__) . '_credit_notes');
            }
            ?>



            <?php _t('Credit notes'); ?></td>
        <td>c</td>
        <td class="text-right">
            <span class="label label-danger">
                <?php echo moneda($resumen_c); ?>
            </span>
        </td>
    </tr>





    <?php
    /**
     *  <tr>
      <td>Pague al cliente, notas de credito u otros</td>
      <td><?php _t('Pagos'); ?></td>
      <td>d</td>
      <td class="text-right"><?php echo moneda($resumen_d); ?></td>
      </tr>
     */
    ?>
    <tr>
        <td>
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__) . '_situation');
            }
            ?>



            <?php _t("Situation"); ?> : 

            <?php
//            $resumen_e = 0;

            if ($resumen_e < 0) {
                echo _t("I must pay the client");
            } elseif ($resumen_e > 0) {
                echo _t("The client must pay me");
            } else {
                echo _t("Everything ok");
            }
            ?>
        </td>
        <td>a - b - c</td>
        <td class="text-right"><b><?php echo moneda($resumen_e); ?></b></td>
    </tr>

</table>

