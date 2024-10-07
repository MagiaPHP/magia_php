<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
//if (_options_option("config_hr_payroll_show_col_from_table")) {
//    $colsToShow = json_decode(_options_option("config_hr_payroll_show_col_from_table"), true);
//    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
//} else {
//    $cols_to_show_keys = array("id");
//}
?>



<table class="table table-striped">
    <thead>
        <tr>
            <td>#</td>
            <td><?php _t("Worker"); ?></td>            
            <td><?php _t('Total worked hours'); ?></td>
            <td><?php _t('Total worked days'); ?></td>
            <td><?php _t('Total to pay'); ?></td>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 1;
        foreach ($hr_employee_worked_days as $key => $worker) {
            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . contacts_formated($worker['id']) . '</td>';
            echo '<td>8:30</td>';
            echo '<td>5 days</td>';
            echo '<td>1250</td>';
            echo '</tr>';
        }
        ?>

    </tbody>

</table>

