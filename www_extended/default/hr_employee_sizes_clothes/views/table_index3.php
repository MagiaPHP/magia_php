
<?php //Creation date:  2024-05-30 08:05:29                           ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_hr_employee_sizes_clothes_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_hr_employee_sizes_clothes_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr>   
            <th><?php _t("Employee"); ?></th>
            <?php
            foreach (hr_clothes_list() as $key => $hrcl) {
                echo '<th>' . $hrcl['name'] . '</th>';
            }
            ?>

        </tr>
    </thead>
    
    <tfoot>
        <tr>   
            <th><?php _t("Employee"); ?></th>
            <?php
            foreach (hr_clothes_list() as $key => $hrcl) {
                echo '<th>' . $hrcl['name'] . '</th>';
            }
            ?>

        </tr>
    </tfoot>
    
    
    
    

    <tbody>

        <?php
        foreach (employees_list_by_company($u_owner_id) as $employee) {
            echo '<tr>';
            echo '<td><a href="index.php?c=contacts&a=hr_employee_sizes_clothes&id=' . $employee['contact_id'] . '">' . contacts_formated($employee['contact_id']) . '</a></td>';

            foreach (hr_clothes_list() as $key => $hrcl) {
                echo '<td>  ';

                echo (hr_employee_sizes_clothes_search_by_employee_code($employee['contact_id'], $hrcl['code'])['size']) ?? null;

                echo '</td>';
            }
            echo '</tr>';
        }
        ?>	

    </tbody>

    <?php // include view("hr_employee_sizes_clothes", "table_index_form_add"); ?>



</table>
<?php
//$pagination->createHtml();
?>
