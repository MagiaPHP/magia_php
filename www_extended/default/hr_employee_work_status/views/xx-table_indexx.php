
<?php //Creation date:  2024-06-28 12:06:32        ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_hr_employee_work_status_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_hr_employee_work_status_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php hr_employee_work_status_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">

            <?php hr_employee_work_status_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
    <tbody>

        <?php
        if (!$hr_employee_work_status) {
            message("info", "No items");
        }

        foreach ($hr_employee_work_status as $hr_employee_work_status_item) {
            echo '<tr>';
            foreach ($cols_to_show_keys as $key => $col) {

                switch ($col) {
                    case 'id':
                        echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
                        break;
                    case 'employee_id':
                        echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
                        break;
                    case 'work_status_code':
                        echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
                        break;
                    case 'date_start':
                        echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
                        break;
                    case 'date_end':
                        echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
                        break;
                    case 'order_by':
                        echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
                        break;
                    case 'status':
                        echo '<td>' . ($hr_employee_work_status_item[$col]) . '</td>';
                        break;
                    case 'button_details':
                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_work_status&a=details&id=' . $hr_employee_work_status_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case 'button_pay':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_work_status&a=details_payement&id=' . $hr_employee_work_status_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case 'button_edit':
                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_work_status&a=edit&id=' . $hr_employee_work_status_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case 'modal_edit':
                        echo '<td>';
                        //include view("hr_employee_work_status", "modal_edit");
                        echo '</td>';
                        break;

                    case 'button_delete':
                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_work_status&a=delete&id=' . $hr_employee_work_status_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case 'modal_delete':
                        echo '<td>';
                        include view("hr_employee_work_status", "modal_delete");
                        echo '</td>';
                        break;

                    case 'button_print':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_work_status&a=export_pdf&id=' . $hr_employee_work_status_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case 'button_save':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_work_status&a=export_pdf&way=pdf&&id=' . $hr_employee_work_status_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    default:
                        echo '<td>' . ($hr_employee_work_status[$col]) . '</td>';
                        break;
                }
            }

            echo '</tr>';
        }
        ?>	
        </tr>
    </tbody>

    <?php // include view("hr_employee_work_status", "table_index_form_add"); ?>

</table>

