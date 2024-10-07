


<?php
$resumen_total_invoices = invoices_total_by_client_id_multi_code_year($id, array(10, 20, 30), date('Y'));
$resumen_total_cn = credit_notes_total_by_client_id_multi_code_year($id, array(10, 20), date('Y'));
$resumen_total_balance = balance_total_all_transactions_by_client_id_year($id, date('Y'));
$resumen_total = $resumen_total_invoices - $resumen_total_cn - $resumen_total_balance;
?>
<h3>Resumen</h3>
<table class="table table-striped table-condensed table-bordered" >

    <tbody>

        <tr>
            <td>Total facturas en <?php echo date("Y"); ?></td>
            <td>a</td>
            <td class="text-right"><?php echo moneda($resumen_total_invoices); ?></td>
        </tr>

        <tr>
            <td>Total Notas de credito en 2023</td>
            <td>b</td>
            <td class="text-right"><?php echo moneda($resumen_total_cn); ?></td>
        </tr>

        <tr>
            <td>Resumen de pagos recibidos del cliente</td>
            <td>c</td>
            <td class="text-right"><?php echo moneda($resumen_total_balance); ?></td>
        </tr>

        <tr>
            <td>Situacion</td>
            <td>a - b - c</td>
            <td class="text-right"><?php echo moneda($resumen_total); ?></td>
        </tr>


    </tbody>  
</table>

<h3>Anos anteriores</h3>

<table class="table table-striped table-condensed table-bordered" >
    <tbody>
        <tr>
            <td>Cliente debe pagar</td>
            <td>2022</td>
            <td class="text-right"><?php echo moneda(1200); ?></td>
        </tr>
        <tr>
            <td>Debo pagar al cliente</td>
            <td>2021</td>
            <td class="text-right"><?php echo moneda(1200); ?></td>
        </tr>
    </tbody>  
</table>

