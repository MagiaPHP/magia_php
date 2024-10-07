<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>

<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">
            <th><?php _t("#"); ?></th>
            <th><?php _t("Client"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Invoices"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Tax"); ?></th>
            <th class="text-right"><?php _t("Total + tax"); ?></th>
            <th class="text-right"><?php _t("Status"); ?></th>
        </tr>
    </thead>

    <tbody>

        <?php
        //
//        $balance_invoices_list = invoices_search_by_client_id_multi_code_year($id, array(10, 20, 30, -10, -20, 0), $year);
        $balance_invoices_list = invoices_search_by_client_id_multi_code_year($id, array(10, 20, 30, -10, -20, 0), $year);
        //
        $total_total = null;
        $total_tax = null;
        $total_advance = null;
        $tachado = "";
        $tachado_fin = "";

        if ($balance_invoices_list) {

            $i = 1;
            foreach ($balance_invoices_list as $key => $invoice) {
//                foreach (invoices_search_by_client_id($id) as $key => $invoice) {
//                foreach (invoices_search_by_client_id_for_balance($id) as $key => $invoice) {

                if ($invoice['status'] == '10' || $invoice['status'] == '20' || $invoice['status'] == '30') {
                    $total_total = $total_total + $invoice['total'];
                    $total_tax = $total_tax + $invoice['tax'];
                    $total_advance = $total_advance + $invoice['advance'];
                }

                if ($invoice['status'] == '-10' || $invoice['status'] == '-20' || $invoice['status'] == '0') {
                    $tachado = "<del>";
                    $tachado_fin = "</del>";
                }


                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . contacts_formated($invoice['client_id']) . '</td>';
                echo '<td>' . $invoice['date'] . '</td>';
                echo '<td><a href="index.php?c=invoices&a=details&id=' . $invoice['id'] . '">' . $invoice['id'] . '</a></td>';
                echo '<td>' . $invoice['title'] . '</td>';
                echo "<td class='text-right'>$tachado" . moneda($invoice['total']) . "$tachado_fin</td>";
                echo "<td class='text-right'>$tachado" . moneda($invoice['tax']) . "$tachado_fin</td>";
                echo "<td class='text-right'>$tachado" . moneda($invoice['total'] + $invoice['tax']) . "$tachado_fin</td>";
                echo "<td class='text-right'>" . _tr(invoice_status_by_status($invoice['status'])) . "</td>";

//                    echo '<table class="table table-striped table-condensed table-bordered">';
//                    foreach (balance_list_by_invoice($invoice['id']) as $key => $payement) {
//                        echo '
//                            <tr>
//                                <td>' . $payement['id'] . '</td>
//                                <td>' . $payement['date'] . '</td>
//                                <td class="text-right" >' . moneda($payement['sub_total'] + $payement['tax']) . '</td>
//                            </tr>
//                            ';
//                    }
//
//                    echo '</table>';
//
//                    echo '                    
//                        <td class="text-right">' . moneda($invoice['advance']) . '</td>
//                        <td class="text-right">' . moneda(($invoice['total'] + $invoice['tax']) - $invoice['advance']) . '</td>
//                    ';

                echo '</tr>';

                $tachado = "";
                $tachado_fin = "";
                $i++;
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">';
            echo message("info", "No items found");
            echo '</td>';
            echo '</tr>';
        }
        ?>   
    </tbody>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><?php echo moneda($total_total); ?></td>
        <td class="text-right"><?php echo moneda($total_tax); ?></td>
        <td class="text-right">
            <span class="label label-info">
                <b><?php echo moneda(($total_total + $total_tax)); ?></b>
            </span>
        </td>
        <td></td>
    </tr>
</table>

