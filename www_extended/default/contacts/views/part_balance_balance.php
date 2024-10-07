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
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Ref"); ?></th>
            <th><?php _t("Description"); ?></th>
            <th><?php _t("c/e"); ?></th>
            <th><?php _t("Canceled"); ?></th>
            <th><?php _t("Cancel Code"); ?></th>
            <th><?php _t("Type"); ?></th>
            <th class="text-right"><?php _t("Total"); ?></th>
        </tr>
    </thead>
    <tbody>

        <?php
        $month_actual = null;
        $month = null;
        $strike = false;
        $total_bal_sub_total = null;
        $total_bal_tax = false;
        $i = 1;
        if (balance_all_transactions_by_client_id_year($id, $year)) {
            foreach (balance_all_transactions_by_client_id_year($id, $year) as $bal) {

                $total_bal_sub_total = $total_bal_sub_total + $bal['sub_total'];
                $total_bal_tax = $total_bal_tax + $bal['tax'];
                $month_actual = magia_dates_get_month_from_date($bal['date_registre']);
                ?>
                <?php
                if ($month_actual != $month) {
                    $month = $month_actual;
                    ?>            
                    <tr>
                        <td colspan="11"><b><?php echo _trc(magia_dates_month($month_actual)); ?></b></td>
                    </tr>
                <?php } ?>  
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo contacts_formated($bal['client_id']); ?></td>
                    <td><?php echo $bal['id']; ?></td>
                    <td><?php echo $bal['date_registre']; ?></td>
                    <td><?php echo $bal['ref']; ?></td>
                    <td><?php echo $bal['description']; ?></td>
                    <td><?php echo $bal['ce']; ?></td>
                    <td><?php echo $bal['canceled']; ?></td>
                    <td><?php echo $bal['canceled_code']; ?></td>
                    <td><?php echo $bal['type']; ?></td>
                    <td class="text-right"><?php echo moneda($bal['sub_total'] + $bal['tax']) ?></td>
                </tr>
                <?php
                $strike = false;
                $i++;
            }
        } else {
            echo '<tr>';
            echo '<td colspan="11">';
            echo message("info", "No items found");
            echo '</td>';
            echo '</tr>';
        }
        ?>	
    </tbody>
    <tr>
        <td colspan="10"></td>
        <td class="text-right">
            <span class="label label-warning">
                <b><?php echo moneda($total_bal_sub_total + $total_bal_tax); ?></b>
            </span>
        </td>        
    </tr>
</table>



