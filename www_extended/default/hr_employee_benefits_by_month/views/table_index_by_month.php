<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>
<br>
<p>
    <a href="#" data-toggle="modal" data-target="#calcule_worked_days"> <?php _t("To make sure you have this table up to date, click here"); ?></a>
</p>

<table class="table table-striped">
    <thead>
        <tr class="info">            
            <th><?php _t("Workers"); ?></th>
            <th><?php _t("Year"); ?></th>
            <th><?php _t("Month"); ?></th>
            <th><?php _t("Benefit"); ?></th>
            <th><?php _t("Worked days"); ?></th>
            <th><?php _t("Quantity"); ?>

                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#calcule_worked_days">
                    <?php echo icon("refresh"); ?>
                </button>


            </th>
            <th><?php _t("Price"); ?></th>
            <th><?php _t("Company part"); ?></th>
            <th><?php _t("Employee part"); ?></th>
            <th><?php _t("Company part value"); ?></th>
            <th><?php _t("Employee part value"); ?></th>
        </tr>
    </thead>
    <tbody>

        <?php
        
        $quantity_total = 0;
        
        foreach ($hr_employee_benefits_by_month as $key => $hr_employee_benefits_by_month_item) {

            $quantity_total = $quantity_total + $hr_employee_benefits_by_month_item['quantity'];

            $days_worked = hr_employee_worked_days_total_days_worked_by_year_month_employee($year, $month, $hr_employee_benefits_by_month_item['employee_id']);

            $tr_class = ($hr_employee_benefits_by_month_item['employee_id'] == $id ) ? ' class="success" ' : '';

            echo '<tr ' . $tr_class . '>';

            echo '<td><a href="index.php?c=contacts&a=hr_employee_benefits&id=' . $hr_employee_benefits_by_month_item['employee_id'] . '&&month=' . $month . '&year=' . $year . '">' . contacts_formated($hr_employee_benefits_by_month_item['employee_id']) . '</a></td>';

            echo '<td>' . $hr_employee_benefits_by_month_item['year'] . '</td>';

            echo '<td>' . magia_dates_month($hr_employee_benefits_by_month_item['month']) . '</td>';

            echo '<td>' . _tr(hr_benefits_field_code('title', $hr_employee_benefits_by_month_item['benefit_code'])) . '</td>';

            echo '<td><a href="index.php?c=contacts&a=hr_employee_worked_days&id=' . $hr_employee_benefits_by_month_item['employee_id'] . '&&month=' . $month . '&year=' . $year . '">' . $days_worked . '</a></td>';

            echo '<td>';

            echo $hr_employee_benefits_by_month_item['quantity'];

            include 'modal_quantity_update.php';

            echo '</td>';
            echo '<td>' . moneda($hr_employee_benefits_by_month_item['price']) . '</td>';

            echo '<td>' . $hr_employee_benefits_by_month_item['company_part'] . '%</td>';

            echo '<td>' . $hr_employee_benefits_by_month_item['employee_part'] . '%</td>';

            echo '<td>' . moneda($hr_employee_benefits_by_month_item['company_part_value']) . '</td>';

            echo '<td class=" text-right success">' . moneda($hr_employee_benefits_by_month_item['employee_part_value']) . '</td>';

            echo '</tr>';
        }
        echo '<tr>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td>' . _tr('Total') . ' ' . $quantity_total . '</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '</tr>';

//        foreach ($hr_employee_benefits_by_month as $hr_employee_benefits_by_month_item) {
//            echo '<tr>';
//            foreach ($cols_to_show_keys as $key => $col) {
//
//                switch ($col) {
//                    case 'id':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'employee_id':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'year':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'month':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'benefit_code':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'quantity':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'price':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'company_part':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'employee_part':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'company_part_value':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'employee_part_value':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'order_by':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'status':
//                        echo '<td>' . ($hr_employee_benefits_by_month_item[$col]) . '</td>';
//                        break;
//                    case 'button_details':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_benefits_by_month&a=details&id=' . $hr_employee_benefits_by_month_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                        break;
//
//                    case 'button_pay':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_benefits_by_month&a=details_payement&id=' . $hr_employee_benefits_by_month_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                        break;
//
//                    case 'button_edit':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_benefits_by_month&a=edit&id=' . $hr_employee_benefits_by_month_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                        break;
//
//                    case 'modal_edit':
////                echo '<td>';
////                include view("hr_employee_benefits_by_month", "modal_edit");
////                echo '</td>';
//                        break;
//
//                    case 'button_delete':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_employee_benefits_by_month&a=delete&id=' . $hr_employee_benefits_by_month_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
//                        break;
//
//                    case 'modal_delete':
//                        echo '<td>';
//                        include view("hr_employee_benefits_by_month", "modal_delete");
//                        echo '</td>';
//                        break;
//
//                    case 'button_print':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_benefits_by_month&a=export_pdf&id=' . $hr_employee_benefits_by_month_item['id'] . '">' . icon("print") . '</a></td>';
//                        break;
//
//                    case 'button_save':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_benefits_by_month&a=export_pdf&way=pdf&&id=' . $hr_employee_benefits_by_month_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                        break;
//
//                    default:
//                        echo '<td>' . ($hr_employee_benefits_by_month[$col]) . '</td>';
//                        break;
//                }
//            }
//
//            echo '</tr>';
//        }
        ?>	
        </tr>
    </tbody>

    <?php // include view("hr_employee_benefits_by_month", "table_index_form_add");           ?>

</table>

