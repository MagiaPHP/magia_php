<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_hr_payroll_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_hr_payroll_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr>
            <td>#</td>
            <td><?php _t("Worker"); ?></td>            
            <td>123710</td>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach (contacts_list() as $key => $value) {
            echo '<tr>';
            echo '<td></td>';
            echo '</tr>';
        }
        ?>

    </tbody>

</table>

