<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">
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
        //
        if ($balance_payments_received_by_client_id_year) {
            foreach ($balance_payments_received_by_client_id_year as $bal) {

                $total_bal_sub_total = $total_bal_sub_total + $bal['sub_total'];
                $total_bal_tax = $total_bal_tax + $bal['tax'];
                $month_actual = magia_dates_get_month_from_date($bal['date_registre']);
                ?>
                <?php
                if ($month_actual != $month) {
                    $month = $month_actual;
                    ?>            
                    <tr>
                        <td colspan="6"><b><?php echo _trc(magia_dates_month($month_actual)); ?></b></td>
                    </tr>
                <?php } ?>  
                <tr>
                    <td><?php echo $bal['id']; ?></td>
                    <td><?php echo $bal['date_registre']; ?></td>
                    <td><?php echo $bal['ref']; ?></td>
                    <td><?php echo $bal['description']; ?></td>
                    <td><?php echo $bal['ce']; ?></td>
                    <td><?php echo $bal['canceled_code']; ?></td>
                    <td><?php echo $bal['canceled_code']; ?></td>
                    <td><?php echo $bal['type']; ?></td>
                    <td class="text-right"><?php echo moneda($bal['sub_total'] + $bal['tax']) ?></td>
                </tr>
                <?php
                $strike = false;
            }
        } else {
            echo '<tr>';
            echo '<td colspan="7">';
            echo message("info", "No items found");
            echo '</td>';
            echo '</tr>';
        }
        ?>	
    </tbody>
    <tr>
        <td colspan="8"></td>
        <td class="text-right"> <b><?php echo moneda($total_bal_sub_total + $total_bal_tax); ?></b></td>        
    </tr>
</table>



