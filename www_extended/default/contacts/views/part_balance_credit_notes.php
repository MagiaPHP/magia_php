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
            <th><?php _t("Credit note"); ?></th>
            <th><?php _t("Comment"); ?></th>
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Status"); ?></th>
        </tr>
    </thead>

    <tbody>

        <?php
        $credit_notes_list = credit_notes_search_by_client_id($id);

        $total_total = null;
        $total_tax = null;
        $total_returned = null;
        $tachado = "";
        $tachado_fin = "";

        $i = 1;
        if ($credit_notes_list) {
            foreach ($credit_notes_list as $key => $cn) {

                if ($cn['status'] == '10') {
                    $total_total = $total_total + $cn['total'];
                    $total_tax = $total_tax + $cn['tax'];
                    $total_returned = $total_returned + $cn['returned'];
                }

                if ($cn['status'] == '-10') {
                    $tachado = "<del>";
                    $tachado_fin = "</del>";
                }


                echo '<tr>';
                echo '<td>' . $i . '</td>';
                echo '<td>' . contacts_formated($cn['client_id']) . '</td>';
                echo '<td>' . $cn['date_registre'] . '</td>';
                echo '<td><a href="index.php?c=credit_notes&a=details&id=' . $cn['id'] . '">' . $cn['id'] . '</a></td>';
                echo '<td>' . $cn['comments'] . '</td>';
                echo "<td class='text-right'>$tachado" . moneda($cn['total'] + $cn['tax']) . "$tachado_fin</td>";
//                echo "<td class='text-right'>$tachado" . moneda($cn['returned']) . "$tachado_fin</td>";
//                echo "<td class='text-right'>$tachado" . moneda($cn['total'] + $cn['tax'] - $cn['returned']) . "$tachado_fin</td>";
                echo "<td class='text-right'>" . _tr(invoice_status_by_status($cn['status'])) . "</td>";

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

        <?php
        /**
         * <td class="text-right"><?php echo moneda($total_total + $total_tax); ?></td>
          <td class="text-right"><?php echo moneda($total_returned); ?></td>

         */
        ?>
        <td class="text-right">
            <span class="label label-danger">
                <b><?php echo moneda(($total_total + $total_tax - $total_returned)); ?></b>
            </span>
        </td>
        <td></td>
    </tr>
</table>
