<table class="table table-striped">
    <thead>     
        <tr>            
            <th><?php _t("Nationality"); ?></th>
            <th><?php _t("Principal"); ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($hr_employee_nationality as $hr_employee_nationality_item) {

            echo "</tr>";
            echo '<td>' . _tr(countries_field_country_code('countryName', $hr_employee_nationality_item['nationality'])) . '</td>';
            echo '<td>';
            echo ($hr_employee_nationality_item['principal']) ? _tr('Yes') : _tr('No');
            echo '</td>';
            echo "<td>";
            //include "modal_hr_employee_nationality_edit.php";
            include "modal_hr_employee_nationality_delete.php";
            echo "</td>";
            echo "</tr>";

//                foreach ($cols_to_show_keys as $key => $col) {
//
//                    switch ($col) {
//                        case 'id':
//                            echo '<td><a href="index.php?c=hr_employee_nationality&a=details&id=' . $hr_employee_nationality_item[$col] . '">' . $hr_employee_nationality_item[$col] . '</a></td>';
//                            break;
//                        case 'id':
//                            echo '<td>' . ($hr_employee_nationality_item[$col]) . '</td>';
//                            break;
//
//                        case 'employee_id':
//                            echo '<td><a href="index.php?c=contacts&a=hr_employee_nationality&id=' . $hr_employee_nationality_item[$col] . '">' . contacts_formated($hr_employee_nationality_item[$col]) . '</a></td>';
//                            break;
//
//                        case 'nationality':
//                            echo '<td>' . _tr(countries_field_country_code('countryName', $hr_employee_nationality_item[$col])) . '</td>';
//                            break;
//
//                        case 'principal':
//                            echo '<td>';
//                            echo ($hr_employee_nationality_item[$col]) ? _tr('Yes') : _tr('No');
//                            echo '</td>';
//                            break;
//
//                        case 'order_by':
//                            echo '<td>' . ($hr_employee_nationality_item[$col]) . '</td>';
//                            break;
//                        case 'status':
//                            echo '<td>' . ($hr_employee_nationality_item[$col]) . '</td>';
//                            break;
//                        case 'button_details':
//                            echo "<td>";
//
//                            //include "modal_hr_employee_nationality_edit.php";
//                            include "modal_hr_employee_nationality_delete.php";
//
//                            echo "</td>";
//
//                            //    echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_nationality&a=details&id=' . $hr_employee_nationality_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                            break;
//
//                        case 'button_pay':
////                            echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_nationality&a=details_payement&id=' . $hr_employee_nationality_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                            break;
//
//                        case 'button_edit':
//                            //                          echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_nationality&a=edit&id=' . $hr_employee_nationality_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                            break;
//
//                        case 'button_print':
//                            //                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_nationality&a=export_pdf&id=' . $hr_employee_nationality_item['id'] . '">' . icon("print") . '</a></td>';
//                            break;
//
//                        case 'button_save':
//                            //                      echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_nationality&a=export_pdf&way=pdf&&id=' . $hr_employee_nationality_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                            break;
//
//                        default:
//                            echo '<td>' . ($hr_employee_nationality[$col]) . '</td>';
//                            break;
//                    }
//                }
        }
        ?>	

    </tbody>

    <?php // include view("hr_employee_nationality", "table_index_form_add");   ?>



</table>

