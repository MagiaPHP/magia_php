
<?php //Creation date:  2024-06-13 03:06:10                      ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_hr_employee_money_advance_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_hr_employee_money_advance_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr>                              
            <?php hr_employee_money_advance_index_generate_column_headers($cols_to_show_keys); ?>
        </tr>
    </thead>


    <tbody>
        <tr>
            <?php
            if (!$hr_employee_money_advance) {
                message("info", "No items");
            }

            foreach ($hr_employee_money_advance as $hr_employee_money_advance_item) {

                echo "</tr>";

                foreach ($cols_to_show_keys as $key => $col) {
                    
                    
                    vardump($col); 
                    
                    

                    switch ($col) {
                        case 'id':
                            echo '<td><a href="index.php?c=hr_employee_money_advance&a=details&id=' . $hr_employee_money_advance_item[$col] . '">' . $hr_employee_money_advance_item[$col] . '</a></td>';
                            break;
                        case 'id':
                            echo '<td>' . ($hr_employee_money_advance_item[$col]) . '</td>';
                            break;
                        case 'employee_id':
                            echo '<td><a href="index.php?c=contacts&a=hr_employee_money_advance&id=' . $hr_employee_money_advance_item[$col] . '">' . contacts_formated($hr_employee_money_advance_item[$col]) . '</a></td>';
                            break;
                        case 'date':
                            echo '<td>' . ($hr_employee_money_advance_item[$col]) . '</td>';
                            break;

                        case 'value':

                            echo '<td>';
                            echo ($hr_employee_money_advance_item[$col]);

                            //include "modal_value_update.php"; 

                            echo '</td>';

                            break;

                        case 'way':
                            echo '<td  >' . ucfirst($hr_employee_money_advance_item[$col]) . '</td>';
                            break;

                        case 'order_by':
                            echo '<td>' . ($hr_employee_money_advance_item[$col]) . '</td>';
                            break;

                        case 'status':
                            echo '<td>' . ($hr_employee_money_advance_item[$col]) . '</td>';
                            break;
                        case 'button_details':
                            echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_money_advance&a=details&id=' . $hr_employee_money_advance_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                            break;

                        case 'button_pay':

                            if ($hr_employee_money_advance_item["way"] == 'bank') {
                                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_money_advance&a=details_payment&id=' . $hr_employee_money_advance_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                            } else {
                                echo "<td></td>";
                            }

                            break;

                        case 'button_edit':
                            echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_money_advance&a=edit&id=' . $hr_employee_money_advance_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                            break;

                        case 'button_print':
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_money_advance&a=export_pdf&id=' . $hr_employee_money_advance_item['id'] . '">' . icon("print") . '</a></td>';
                            break;

                        case 'button_save':
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_money_advance&a=export_pdf&way=pdf&&id=' . $hr_employee_money_advance_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                            break;

                        case 'modal_delete':
                            echo '<td>';

                            $params = "index.php?c=hr_employee_money_advance&a=ok_delete&id=$hr_employee_money_advance_item[id]&redi[redi]=5&redi[c]=hr_employee_money_advance&redi[a]=search&redi[params]=" . urlencode("w=by_year_month&month=$month&year=$year");

                            include "modal_delete.php";
                            echo '</td>';
                            //echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_money_advance&a=export_pdf&way=pdf&&id=' . $hr_employee_money_advance_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                            break;

                        default:
                            echo '<td>' . ($hr_employee_money_advance[$col]) . '</td>';
                            break;
                    }
                }
            }
            ?>	
        </tr>
    </tbody>

    <?php // include view("hr_employee_money_advance", "table_index_form_add"); ?>



</table>
<?php
//$pagination->createHtml();
?>
