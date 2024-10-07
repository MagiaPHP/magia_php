
<?php //Creation date:  2024-05-27 10:05:46    ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
//config_banks_show_col_from_table
$colsToShow = json_decode(_options_option("config_banks_show_col_from_table"), true);
?>

<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
//            $order_icon_show = false;
//            $checked_array = json_decode(_options_option("config_banks_show_col_from_table"), true);
//            foreach (banks_db_col_list_from_table($c) as $th) {
//                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
//                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
//                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;
//                if (isset($checked_array[$th]) || !isset($checked_array)) {
//                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
//                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";
//                    echo '<th><a href="index.php?c=banks&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
//                }
//                $order_icon_show = false;
//            }
            ?>                                
            <?php banks_index_generate_column_headers($colsToShow); ?>

        </tr>
    </thead>
    <tfoot>
        <tr class="info">
            <?php
//            //$checked_array = json_decode(_options_option("config_banks_show_col_from_table"), true);
//            foreach (banks_db_col_list_from_table($c) as $th) {
//                if (isset($checked_array[$th]) || !isset($checked_array)) {
//                    echo "<th>" . _tr(ucfirst($th)) . "</th>";
//                }
//            }
            ?>            
            <?php banks_index_generate_column_headers($colsToShow); ?>                                                                
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$banks) {
                message("info", "No items");
            }

            foreach ($banks as $banks_item) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropTableIndex" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Action") . '
                              <span class="caret"></span>
                            </button>
                            
                            <ul class="dropdown-menu" aria-labelledby="dropTableIndex">
                            
                            <?php if (permissions_has_permission($u_rol, "banks", "read")) { ?>
                              <li><a href="index.php?c=banks&a=details&id=' . $banks_item["id"] . '">' . _tr("Details") . '</a></li>
                            <?php } ?>
                            
                            <?php if (permissions_has_permission($u_rol, "banks", "update")) { ?>
                                <li><a href="index.php?c=banks&a=edit&id=' . $banks_item["id"] . '">' . _tr("Edit") . '</a></li>
                            <?php } ?>    

                             <?php if (permissions_has_permission($u_rol, "banks", "delete")) { ?>
                              <li role="separator" class="divider"></li>                              
                              <li><a href="index.php?c=banks&a=delete&id=' . $banks_item["id"] . '">' . _tr("Delete") . '</a></li>
                            <?php } ?>    
                            

                            </ul>
                          </div>';
                //     echo "<tr id=\"$banks_item[id]\">";
                // $checked_array = json_decode(_options_option("config_banks_show_col_from_table"), true);
//                foreach (banks_db_col_list_from_table($c) as $col_name) {
//                    if (isset($checked_array[$col_name]) || !isset($checked_array)) {
//                        //echo "<td>$banks_item[$col_name]</td>";
//                            
//                        // si una columna se llama xx
//                        if ($col_name == "xxxxxxxxxxxxxx") { // se pone un filtro en este caso la primera mayuscula
//                            echo "<td>" . banks_add_filter($col_name, $banks_item[$col_name], ucfirst($col_name)) . "</td>";
//                        } else {
//                            echo "<td>" . banks_add_filter($col_name, $banks_item[$col_name]) . "</td>";
//                        }                                                
//                    }
//                }                echo "<td>$menu</td>";
                echo "</tr>";

                //banks_index_generate_column_body_td($banks_item, $colsToShow);

                foreach ($colsToShow as $key => $col) {

                    switch ($col) {
                        case 'id':
                            echo '<td><a href="index.php?c=banks&a=details&id=' . $banks[$col] . '">' . $banks[$col] . '</a></td>';
                            break;
                        case 'id':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'contact_id':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'bank':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'account_number':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'bic':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'iban':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'code':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'codification':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'delimiter':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'date_format':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'thousands_separator':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'decimal_separator':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'invoices':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'order_by':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'status':
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                        case 'button_details':
                            echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=banks&a=details&id=' . $banks['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                            break;

                        case 'button_pay':
                            echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=banks&a=details_payement&id=' . $banks['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                            break;

                        case 'button_edit':
                            echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks&a=edit&id=' . $banks['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                            break;

                        case 'button_print':
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks&a=export_pdf&id=' . $banks['id'] . '">' . icon("print") . '</a></td>';
                            break;

                        case 'button_save':
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks&a=export_pdf&way=pdf&&id=' . $banks['id'] . '">' . icon("floppy-save") . '</a></td > ';
                            break;

                        default:
                            echo '<td>' . ($banks[$col]) . '</td>';
                            break;
                    }
                }
            }
            ?>	
        </tr>
    </tbody>

    <?php include view("banks", "table_index_form_add"); ?>



</table>
<?php
//$pagination->createHtml();
?>
