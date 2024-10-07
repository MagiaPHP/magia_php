<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Document"); ?></th>
            <th><?php _t("Document number"); ?></th>
            <th><?php _t("Delivery date"); ?></th>
            <th><?php _t("Expiration date"); ?></th>
            <th><?php _t("Follow up"); ?></th>
            <th></th>
        </tr>
    </thead>

    <tbody>        
        <?php
        foreach ($hr_employee_documents as $hr_employee_documents_item) {

            echo "<tr>";
            echo '<td>' . _tr(hr_documents_field_code('title', $hr_employee_documents_item['document'])) . '</td>';
            echo '<td>' . ($hr_employee_documents_item['document_number']) . '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_documents_item['date_delivery']) . '</td>';
            echo '<td>' . magia_dates_formated($hr_employee_documents_item['date_expiration']) . '</td>';
            echo '<td>';
            echo ($hr_employee_documents_item['follow']) ? _tr("Yes") : _tr("No");
            echo '</td>';
            echo "<td>";
            include "modal_hr_employee_documents_edit.php";
            include "modal_hr_employee_documents_delete.php";
            echo "</td>";
            echo "</tr>";

//                
//                //                foreach ($cols_to_show_keys as $key => $col) {
//
//                    switch ($col) {
//                        case 'id':
//                            echo '<td><a href="index.php?c=hr_employee_documents&a=details&id=' . $hr_employee_documents_item[$col] . '">' . $hr_employee_documents_item[$col] . '</a></td>';
//                            break;
//                        case 'id':
//                            echo '<td>' . ($hr_employee_documents_item[$col]) . '</td>';
//                            break;
//                        case 'employee_id':
//                            //    echo '<td>' . contacts_formated($hr_employee_documents_item[$col]) . '</td>';
//                            break;
//                        case 'document':
//                            echo '<td>' . _tr(hr_documents_field_code('title', $hr_employee_documents_item[$col])) . '</td>';
//                            break;
//                        case 'document_number':
//                            echo '<td>' . ($hr_employee_documents_item[$col]) . '</td>';
//                            break;
//                        case 'date_delivery':
//                            echo '<td>' . ($hr_employee_documents_item[$col]) . '</td>';
//                            break;
//                        case 'date_expiration':
//                            echo '<td>' . ($hr_employee_documents_item[$col]) . '</td>';
//                            break;
//
//                        case 'follow':
//                            echo '<td>';
//                            echo ($hr_employee_documents_item[$col]) ? _tr("Yes") : _tr("No");
//                            echo '</td>';
//                            break;
//
//                        case 'order_by':
//                            echo '<td>' . ($hr_employee_documents_item[$col]) . '</td>';
//                            break;
//                        case 'status':
//                            echo '<td>' . ($hr_employee_documents_item[$col]) . '</td>';
//                            break;
//                        case 'button_details':
//                            //    echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_documents&a=details&id=' . $hr_employee_documents_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                            break;
//
//                        case 'button_pay':
//                            //    echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_documents&a=details_payement&id=' . $hr_employee_documents_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                            break;
//
//                        case 'button_edit':
//                            //echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_documents&a=edit&id=' . $hr_employee_documents_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                            echo "<td>";
//
//                            include "modal_hr_employee_documents_edit.php";
//                            include "modal_hr_employee_documents_delete.php";
//                            echo "</td>";
//                            break;
//
//                        case 'button_print':
//                            //    echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_documents&a=export_pdf&id=' . $hr_employee_documents_item['id'] . '">' . icon("print") . '</a></td>';
//                            break;
//
//                        case 'button_save':
//                            //    echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_documents&a=export_pdf&way=pdf&&id=' . $hr_employee_documents_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                            break;
//
//                        default:
//                            echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
//                            break;
//                    }
//                }
        }
        ?>	

    </tbody>
</table>
