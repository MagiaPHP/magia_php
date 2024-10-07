
<?php //Creation date:  2024-05-30 12:05:39         ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_hr_employee_worked_days_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_hr_employee_worked_days_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">
            <td><?php _t("Data"); ?></td>            
            <td><?php _t("Info"); ?></td>            
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><?php _t('People who work this period of time'); ?></td>
            <td>15</td>
        </tr>

        <tr>
            <td><?php _t('Total days'); ?></td>
            <td>30</td>
        </tr>

        <tr>
            <td><?php _t('Category 1'); ?></td>
            <td>15</td>
        </tr>


        <tr>
            <td><?php _t('Category 1'); ?></td>
            <td>15</td>
        </tr>


        <tr>
            <td><?php _t('Category 1'); ?></td>
            <td>15</td>
        </tr>


        <tr>
            <td><?php _t('Category 1'); ?></td>
            <td>15</td>
        </tr>


        <tr>
            <td><?php _t('Category 1'); ?></td>
            <td>15</td>
        </tr>


    </tbody>
</table>

