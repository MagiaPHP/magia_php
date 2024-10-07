
<table class="table table-striped">
    <thead>
        <tr>                               
            <th><?php _t('Date'); ?></th>
            <th><?php _t('Category'); ?></th>
            <th><?php _t('Description'); ?></th>
            <th class="text-right"><?php _t('Value'); ?></th>            
            <th class="text-right"><?php _t('Way'); ?></th>            
           <th></th>                                                                                                                 
            
        </tr>
    </thead>

    <tbody>

        <?php
        $total_value = 0;
        $total_cash = 0;
        $total_bank = 0;

        foreach ($hr_employee_fines as $hr_employee_fines_item) {


            if ($hr_employee_fines_item['way'] == 'cash') {
                $total_cash = $total_cash + $hr_employee_fines_item['value'];
            }


            if ($hr_employee_fines_item['way'] == 'bank') {
                $total_bank = $total_bank + $hr_employee_fines_item['value'];
            }


            $class = ($hr_employee_fines_item['way'] == 'bank') ? ' class="text-right" ' : '';

            echo "<tr>";

            echo '<td>' . magia_dates_formated($hr_employee_fines_item['date']) . '</td>';
            echo '<td>' . hr_fines_categories_field_category_code('category', $hr_employee_fines_item['category_code']) . '</td>';
            echo '<td>' . ($hr_employee_fines_item['description']) . '</td>';
            echo '<td ' . $class . '>' . ($hr_employee_fines_item['value']) . '</td>';
            echo '<td>' . ($hr_employee_fines_item['way']) . '</td>';

            echo "<td>";
            $params = "index.php?c=hr_employee_fines&a=ok_delete&id=$hr_employee_fines_item[id]&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_fines&redi[params]=" . urlencode("id=$id&from=$from&to=$to");
            include view('hr_employee_fines', 'modal_delete', $params);
            echo "</td>";


            echo '</tr>';

//            if ($hr_employee_fines_item['way'] == 'bank') {
//                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_fines&a=details_payment&id=' . $hr_employee_fines_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//            } else {
//                echo '<td></td>';
//            }
//            foreach ($cols_to_show_keys as $key => $col) {
//
//                switch ($col) {
//                    case 'id':
//                        //        echo '<td><a href="index.php?c=hr_employee_fines&a=details&id=' . $hr_employee_fines_item[$col] . '">' . $hr_employee_fines_item[$col] . '</a></td>';
//                        break;
//
//                    case 'id':
//                        //        echo '<td>' . ($hr_employee_fines_item[$col]) . '</td>';
//                        break;
//
//                    case 'employee_id':
//                        //       echo '<td>' . contacts_formated($hr_employee_fines_item[$col]) . '</td>';
//                        break;
//                    case 'date':
//                        echo '<td>' . ($hr_employee_fines_item[$col]) . '</td>';
//                        break;
//                    case 'description':
//                        echo '<td>' . ($hr_employee_fines_item[$col]) . '</td>';
//                        break;
//                    case 'value':
//                        echo '<td class="text-right">' . ($hr_employee_fines_item[$col]) . '</td>';
//                        break;
//                    case 'way':
//                        echo '<td>' . ucfirst($hr_employee_fines_item[$col]) . '</td>';
//                        break;
//                    case 'order_by':
//                        //echo '<td>' . ($hr_employee_fines_item[$col]) . '</td>';
//                        break;
//                    case 'status':
//                        //echo '<td>' . ($hr_employee_fines_item[$col]) . '</td>';
//                        break;
//                    case 'button_details':
////                        echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_fines&a=details&id=' . $hr_employee_fines_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                        break;
//
//                    case 'button_pay':
//
//                        if ($hr_employee_fines_item['way'] == 'bank') {
//                            echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_fines&a=details_payment&id=' . $hr_employee_fines_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                        } else {
//                            echo '<td></td>';
//                        }
//
//                        break;
//
//                    case 'button_edit':
//                        //        echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_fines&a=edit&id=' . $hr_employee_fines_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                        break;
//
//                    case 'button_print':
//                        //        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_fines&a=export_pdf&id=' . $hr_employee_fines_item['id'] . '">' . icon("print") . '</a></td>';
//                        break;
//
//                    case 'button_save':
//                        //        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_fines&a=export_pdf&way=pdf&&id=' . $hr_employee_fines_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                        break;
//
//                    case 'modal_delete':
//                    case 'button_delete':
//
//                        echo "<td>";
//                        $params = "index.php?c=hr_employee_fines&a=ok_delete&id=$hr_employee_fines_item[id]&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_fines&redi[params]=" . urlencode("id=$id&month=$month&year=$year");
//                        include view('hr_employee_fines', 'modal_delete', $params);
//                        echo "</td>";
//                        break;
//
//                    default:
//                        echo '<td>' . ($hr_employee_fines[$col]) . '</td>';
//                        break;
//                }
//            }
        }
        ?>	
        </tr>
    </tbody>


    <tr>   
        <td></td>

        <td></td>

        <td class="text-right"><?php _t('Total cash'); ?></td>
        <td class=""><?php echo moneda($total_cash) ?></td>
        <td></td>
        <td></td>
        
    </tr>

    <tr>
        <td></td>

        <td></td>

        <td class="text-right"><?php _t('Total bank'); ?></td>
        <td class="text-right"><?php echo moneda($total_bank) ?></td>
        <td></td>
        <td></td>
    </tr>

    <tr>     
        <td></td>

        <td></td>
        <td class="text-right"><?php _t('Total general'); ?></td>
        <td class="text-right"><b><?php echo moneda($total_cash + $total_bank) ?></b></td>
        <td></td>
        <td></td>
    </tr>

</table>
