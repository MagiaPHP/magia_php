<table class="table table-striped">
    <thead>
        <tr>                              
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Birthdate"); ?></th>
            <th><?php _t("Relation"); ?></th>
            <th><?php _t("In charge"); ?></th>
            <th><?php _t("Handicap"); ?></th>
            <th><?php _t("Notes"); ?></th>
            <th></th>            
        </tr>
    </thead>
    <tbody>
        <?php
        
          
         
         
        foreach ($hr_employee_family_dependents as $hr_employee_family_dependents_item) {

            echo "<tr>";
            echo '<td>' . $hr_employee_family_dependents_item['name'] . '</td>';
            echo '<td>' . $hr_employee_family_dependents_item['lastname'] . '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_family_dependents_item['birthday']) . ' (' . magia_dates_cal_age($hr_employee_family_dependents_item['birthday']) . ')</td>';
            echo '<td>' . $hr_employee_family_dependents_item['relation'] . '</td>';
            echo '<td>' . (($hr_employee_family_dependents_item['in_charge']) ? _tr("Yes") : _tr('No')) . '</td>';
            echo '<td>' . (($hr_employee_family_dependents_item['handicap']) ? _tr("Yes") : _tr('No')) . '</td>';
            echo '<td>' . (($hr_employee_family_dependents_item['notes'])) . '</td>';

            echo "<td>";
            include "modal_hr_employee_family_dependents_edit.php";
            include "modal_hr_employee_family_dependents_delete.php";
            echo "</td>";
            echo "</tr>";

//                foreach ($cols_to_show_keys as $key => $col) {
//
//                    switch ($col) {
//                        case 'id':
//                            //     echo '<td><a href="index.php?c=hr_employee_family_dependents&a=details&id=' . $hr_employee_family_dependents_item[$col] . '">' . $hr_employee_family_dependents_item[$col] . '</a></td>';
//                            break;
//                        case 'id':
//                            //    echo '<td>' . ($hr_employee_family_dependents_item[$col]) . '</td>';
//                            break;
//
//                        case 'employee_id':
//                            //    echo '<td><a href="index.php?c=contacts&a=hr_employee_family_dependents&id=' . $hr_employee_family_dependents_item[$col] . '">' . contacts_formated($hr_employee_family_dependents_item[$col]) . '</a></td>';
//                            break;
//
//                        case 'name':
//                            echo '<td>' . ($hr_employee_family_dependents_item[$col]) . '</td>';
//                            break;
//
//                        case 'lastname':
//                            echo '<td>' . ($hr_employee_family_dependents_item[$col]) . '</td>';
//                            break;
//
//                        case 'birthday':
//                            echo '<td>' . ($hr_employee_family_dependents_item[$col]) . ' (' . magia_dates_cal_age($hr_employee_family_dependents_item[$col]) . ')</td>';
//                            break;
//
//                        case 'relation':
//                            echo '<td>' . ($hr_employee_family_dependents_item[$col]) . '</td>';
//                            break;
//                        case 'in_charge':
//                            echo '<td>' . (($hr_employee_family_dependents_item[$col]) ? _tr("Yes") : _tr('No')) . '</td>';
//                            break;
//                        case 'handicap':
//                            echo '<td>' . (($hr_employee_family_dependents_item[$col]) ? _tr('Yes') : _tr('No')) . '</td>';
//                            break;
//                        case 'notes':
//                            echo '<td>' . ($hr_employee_family_dependents_item[$col]) . '</td>';
//                            break;
//                        case 'order_by':
//                            echo '<td>' . ($hr_employee_family_dependents_item[$col]) . '</td>';
//                            break;
//                        case 'status':
//                            echo '<td>' . ($hr_employee_family_dependents_item[$col]) . '</td>';
//                            break;
//                        case 'button_details':
//                            //echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_sizes_clothes&a=edit&id=' . $hr_employee_sizes_clothes_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                            echo "<td>";
//                            include "modal_hr_employee_family_dependents_edit.php";
//                            include "modal_hr_employee_family_dependents_delete.php";
//                            echo "</td>";
//                            break;
//
//                            //echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_family_dependents&a=details&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                            break;
//
//                        case 'button_pay':
//                            //    echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_family_dependents&a=details_payement&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                            break;
//
//                        case 'button_edit':
//                            //    echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_family_dependents&a=edit&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                            break;
//
//                        case 'button_print':
//                            //    echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=export_pdf&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("print") . '</a></td>';
//                            break;
//
//                        case 'button_save':
//                            //    echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=export_pdf&way=pdf&&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                            break;
//
//                        default:
//                            echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
//                            break;
//                    }
//                }
        }
        ?>	
    </tbody>
</table>
