<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Civil status"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            foreach ($hr_employee_civil_status as $hr_employee_civil_status_item) {

                echo "</tr>";

                echo '<td>' . _tr(hr_civil_status_field_code('description', $hr_employee_civil_status_item['civil_status'])) . '</td>';
                echo '<td>' . (magia_dates_formated($hr_employee_civil_status_item['date_start'])) . '</td>';

                echo '<td>';

                include 'modal_hr_employee_civil_status_delete.php';

                echo '</td>';
            }
            ?>	
        </tr>
    </tbody>
</table>

