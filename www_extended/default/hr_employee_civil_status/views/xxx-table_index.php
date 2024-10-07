
<?php //Creation date:  2024-05-30 08:05:20      ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_hr_employee_civil_status_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_hr_employee_civil_status_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
//            $order_icon_show = false;
//            $checked_array = json_decode(_options_option("config_hr_employee_civil_status_show_col_from_table"), true);
//            foreach (hr_employee_civil_status_db_col_list_from_table($c) as $th) {
//                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
//                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
//                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;
//                if (isset($checked_array[$th]) || !isset($checked_array)) {
//                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
//                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";
//                    echo '<th><a href="index.php?c=hr_employee_civil_status&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
//                }
//                $order_icon_show = false;
//            }
            ?>                                
            <?php hr_employee_civil_status_index_generate_column_headers($cols_to_show_keys); ?>

        </tr>
    </thead>
    <tfoot>
        <tr class="info">
            <?php
//            //$checked_array = json_decode(_options_option("config_hr_employee_civil_status_show_col_from_table"), true);
//            foreach (hr_employee_civil_status_db_col_list_from_table($c) as $th) {
//                if (isset($checked_array[$th]) || !isset($checked_array)) {
//                    echo "<th>" . _tr(ucfirst($th)) . "</th>";
//                }
//            }
            ?>            
            <?php hr_employee_civil_status_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$hr_employee_civil_status) {
                message("info", "No items");
            }

            foreach ($hr_employee_civil_status as $hr_employee_civil_status_item) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropTableIndex" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Action") . '
                              <span class="caret"></span>
                            </button>
                            
                            <ul class="dropdown-menu" aria-labelledby="dropTableIndex">
                            
                            <?php if (permissions_has_permission($u_rol, "hr_employee_civil_status", "read")) { ?>
                              <li><a href="index.php?c=hr_employee_civil_status&a=details&id=' . $hr_employee_civil_status_item["id"] . '">' . _tr("Details") . '</a></li>
                            <?php } ?>
                            
                            <?php if (permissions_has_permission($u_rol, "hr_employee_civil_status", "update")) { ?>
                                <li><a href="index.php?c=hr_employee_civil_status&a=edit&id=' . $hr_employee_civil_status_item["id"] . '">' . _tr("Edit") . '</a></li>
                            <?php } ?>    

                             <?php if (permissions_has_permission($u_rol, "hr_employee_civil_status", "delete")) { ?>
                              <li role="separator" class="divider"></li>                              
                              <li><a href="index.php?c=hr_employee_civil_status&a=delete&id=' . $hr_employee_civil_status_item["id"] . '">' . _tr("Delete") . '</a></li>
                            <?php } ?>    
                            

                            </ul>
                          </div>';
                //     echo "<tr id=\"$hr_employee_civil_status_item[id]\">";
                // $checked_array = json_decode(_options_option("config_hr_employee_civil_status_show_col_from_table"), true);
//                foreach (hr_employee_civil_status_db_col_list_from_table($c) as $col_name) {
//                    if (isset($checked_array[$col_name]) || !isset($checked_array)) {
//                        //echo "<td>$hr_employee_civil_status_item[$col_name]</td>";
//                            
//                        // si una columna se llama xx
//                        if ($col_name == "xxxxxxxxxxxxxx") { // se pone un filtro en este caso la primera mayuscula
//                            echo "<td>" . hr_employee_civil_status_add_filter($col_name, $hr_employee_civil_status_item[$col_name], ucfirst($col_name)) . "</td>";
//                        } else {
//                            echo "<td>" . hr_employee_civil_status_add_filter($col_name, $hr_employee_civil_status_item[$col_name]) . "</td>";
//                        }                                                
//                    }
//                }                echo "<td>$menu</td>";
                echo "</tr>";

                //hr_employee_civil_status_index_generate_column_body_td($hr_employee_civil_status_item, $colsToShow);

                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                        case 'id':
                            echo '<td><a href="index.php?c=hr_employee_civil_status&a=details&id=' . $hr_employee_civil_status_item[$col] . '">' . $hr_employee_civil_status_item[$col] . '</a></td>';
                            break;
                        case 'id':
                            echo '<td>' . ($hr_employee_civil_status_item[$col]) . '</td>';
                            break;
                        case 'employee_id':
                            echo '<td><a href="index.php?c=contacts&a=hr_employee_civil_status&id=' . $hr_employee_civil_status_item[$col] . '">' . contacts_formated($hr_employee_civil_status_item[$col]) . '</a></td>';
                            break;
                        case 'civil_status':
                            echo '<td>' . ($hr_employee_civil_status_item[$col]) . '</td>';
                            break;
                        case 'date_start':
                            echo '<td>' . ($hr_employee_civil_status_item[$col]) . '</td>';
                            break;
                        case 'date_end':
                            echo '<td>' . ($hr_employee_civil_status_item[$col]) . '</td>';
                            break;
                        case 'order_by':
                            echo '<td>' . ($hr_employee_civil_status_item[$col]) . '</td>';
                            break;
                        case 'status':
                            echo '<td>' . ($hr_employee_civil_status_item[$col]) . '</td>';
                            break;
                        case 'button_details':
                            echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_civil_status&a=details&id=' . $hr_employee_civil_status_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                            break;

                        case 'button_pay':
                            echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_civil_status&a=details_payement&id=' . $hr_employee_civil_status_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                            break;

                        case 'button_edit':
                            echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_civil_status&a=edit&id=' . $hr_employee_civil_status_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                            break;

                        case 'button_print':
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_civil_status&a=export_pdf&id=' . $hr_employee_civil_status_item['id'] . '">' . icon("print") . '</a></td>';
                            break;

                        case 'button_save':
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_civil_status&a=export_pdf&way=pdf&&id=' . $hr_employee_civil_status_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                            break;

                        default:
                            echo '<td>' . ($hr_employee_civil_status[$col]) . '</td>';
                            break;
                    }
                }
            }
            ?>	
        </tr>
    </tbody>

    <?php include view("hr_employee_civil_status", "table_index_form_add"); ?>



</table>
<?php
//$pagination->createHtml();
?>
