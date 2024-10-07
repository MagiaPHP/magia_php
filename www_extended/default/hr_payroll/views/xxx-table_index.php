
<?php
//Creation date:  2024-06-28 05:06:33           
?>

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
            <?php hr_payroll_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>

    <tbody>

        <?php
        if (!$hr_payroll) {
            message("info", "No items");
        }

        foreach ($hr_payroll as $hr_payroll_item) {

            $payroll = new Payroll();
            $payroll->setHr_payroll($hr_payroll_item['id']);

            echo '<tr>';
            foreach ($cols_to_show_keys as $key => $col) {

                switch ($col) {
                    case 'id':
                        echo '<td><a href="index.php?c=hr_payroll&a=details&id=' . $hr_payroll_item[$col] . '">' . ($hr_payroll_item[$col]) . '</a></td>';
                        break;

                    case 'month':
                        echo '<td>' . magia_dates_month($hr_payroll_item[$col]) . '</td>';
                        break;

                    case 'employee_id':
                        echo '<td><a href="index.php?c=contacts&a=details&id=' . $hr_payroll_item[$col] . '">' . contacts_formated($hr_payroll_item[$col]) . '</a></td>';
                        break;

                    case 'date_entry':
                        echo '<td>' . magia_dates_formated($hr_payroll_item[$col]) . '</td>';
                        break;
                    // Direccion
                    case 'address':

                        $address_html = addresses_formated_html($hr_payroll_item[$col]);

//                        if (isset($hr_payroll_item[$col])) {
//                            
//                            $address = json_decode($hr_payroll_item[$col], true);
//                            
//                            $address_html = $address['number'] . ', ' . $address['address'] . '<br>';
//                            $address_html .= $address['postcode'] . ' ' . $address['barrio'] . '<br>';
//                            $address_html .= $address['city'] . ' <br>';
//                        }
                        echo '<td>' . ($address_html) . '</td>';
                        break;

                    case 'fonction':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'salary_base':
                        echo '<td>' . monedaf($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'civil_status':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'tax_system':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'date_start':
                        echo '<td>' . magia_dates_formated($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'date_end':
                        echo '<td>' . magia_dates_formated($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'value_round':
                        echo '<td>' . monedaf($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'to_pay':
                        echo '<td class="text-right">' . moneda($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'account_number':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'notes':
                        echo '<td>' . ($hr_payroll_item[$col]) . '</td>';
                        break;
                    case 'extras':

                        $extras_html = hr_payroll_item_estras_formated_html($hr_payroll_item[$col]);
//                        // Extras
//                        if (isset($hr_payroll_item[$col])) {
//                            $extras = json_decode($hr_payroll_item[$col], true);
//                            $extras_html = _tr('type') . ': ' . $extras['type'] . '<br>';
//                            $extras_html .= _tr('ref') . ': ' . $extras['ref'] . '<br>';
//                            $extras_html .= _tr('niss') . ': ' . $extras['niss'] . '<br>';
//                            $extras_html .= _tr('Children normal') . ': ' . $extras['family_dependents']['Children']['n'] . '<br>';
//                            $extras_html .= _tr('Children handicap') . ': ' . $extras['family_dependents']['Children']['h'] . '<br>';
//                            $extras_html .= _tr('Spouses normal') . ': ' . $extras['family_dependents']['Spouses']['n'] . '<br>';
//                            $extras_html .= _tr('Spouses handicap') . ': ' . $extras['family_dependents']['Spouses']['h'] . '<br>';
//                            $extras_html .= _tr('Others P 65 normal') . ': ' . $extras['family_dependents']['OthersP65']['n'] . '<br>';
//                            $extras_html .= _tr('Others P 65 handicap') . ': ' . $extras['family_dependents']['OthersP65']['h'] . '<br>';
//                            $extras_html .= _tr('Others M 65') . ': ' . $extras['family_dependents']['OthersM65']['n'] . '<br>';
//                            $extras_html .= _tr('Others M 65 handicap') . ': ' . $extras['family_dependents']['OthersP65']['h'] . '<br>';
//                            $extras_html .= '';
//                        }
                        echo '<td>' . ($extras_html) . '</td>';
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

                        echo '<td>' . _tr(hr_payroll_status_field_code('name', $hr_payroll_item[$col])) . '</td>';
                        break;
                    case 'button_details':
                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=details&id=' . $hr_payroll_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case 'button_pay':
                        if($payroll->getStatus() == $payroll::STATUS_UNPAID) {
                            echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_payroll&a=payment&id=' . $hr_payroll_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        } else {
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll&a=payment&id=' . $hr_payroll_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Payments details') . '</a></td>';
                        }
                        
                        break;

                    case 'button_edit':
                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=edit&id=' . $hr_payroll_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case 'button_delete':
                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=delete&id=' . $hr_payroll_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case 'modal_edit':
//                echo '<td>';
//                include view("hr_payroll", "modal_edit");
//                echo '</td>';
                        break;

//                    case 'button_delete':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=delete&id=' . $hr_payroll_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
//                        break;
//
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

            echo '</tr>';
        }
        ?>	
        </tr>
    </tbody>

<?php // include view("hr_payroll", "table_index_form_add");         ?>

</table>

