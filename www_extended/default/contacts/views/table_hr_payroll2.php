<table class="table table-striped" border>
    <thead>
        <tr>                             
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Month"); ?></th>
            <th><?php _t("Employee"); ?></th>
            <th><?php _t("Date start"); ?></th>
            <th><?php _t("Date end"); ?></th>
            <th class="text-right"><?php _t("To pay"); ?></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>


    <tbody>

        <?php
        $total_worked_days = 0;

        foreach ($hr_payroll as $hr_payroll_item) {

            $worked_days = hr_employee_worked_days_total_days_worked_by_year_month_employee($year, $hr_payroll_item['month'], $hr_payroll_item['employee_id']);

            $total_worked_days = $total_worked_days + $worked_days;

            echo "</tr>";

            foreach ($cols_to_show_keys as $key => $col) {

                switch ($col) {
                    case 'id':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'employee_id':
                        echo '<td>' . contacts_formated($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'date_entry':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'address':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'fonction':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'salary_base':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'civil_status':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'tax_system':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'date_start':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'date_end':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'value_round':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'to_pay':
                        echo '<td  class="text-right" >' . moneda($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'account_number':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'notes':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'extras':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'code':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'date_registre':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'order_by':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'status':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'button_details':
                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=details&id=' . $hr_payroll_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case 'button_pay':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll&a=details_payment&id=' . $hr_payroll_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case 'button_edit':
                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=edit&id=' . $hr_payroll_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case 'modal_edit':
//                echo '<td>';
//                include view("hr_payroll", "modal_edit");
//                echo '</td>';
                        break;

                    case 'button_delete':
                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=delete&id=' . $hr_payroll_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case 'modal_delete':
                        echo '<td>';
                        include view("hr_payroll", "modal_delete");
                        echo '</td>';
                        break;

                    case 'button_print':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll&a=export_pdf&id=' . $hr_payroll_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case 'button_save':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll&a=export_pdf&way=pdf&&id=' . $hr_payroll_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    default:
                        echo '<td>' . ($hr_payroll[$col]) . '</td>';
                        break;
                }
            }
        }
        ?>	
        </tr>

        <?php
        /**
         * <tr>
          <td></td>
          <td colspan="2" class="text-right"><b><?php _t('Total worked days'); ?></b></td>
          <td class="text-center"><?php echo $total_worked_days; ?></td>
          <td></td>
          </tr>

         */
        ?>

    </tbody>




</table>
<?php
//$pagination->createHtml();
?>
