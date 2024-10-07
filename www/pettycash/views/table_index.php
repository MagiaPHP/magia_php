
<?php //Creation date:  2024-05-30 09:05:09    ?>

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
$colsToShow = json_decode(_options_option("config_pettycash_show_col_from_table"), true);
?>

<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
//            $order_icon_show = false;
//            $checked_array = json_decode(_options_option("config_pettycash_show_col_from_table"), true);
//            foreach (pettycash_db_col_list_from_table($c) as $th) {
//                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
//                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
//                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;
//                if (isset($checked_array[$th]) || !isset($checked_array)) {
//                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
//                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";
//                    echo '<th><a href="index.php?c=pettycash&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
//                }
//                $order_icon_show = false;
//            }
            ?>                                
            <?php pettycash_index_generate_column_headers($colsToShow); ?>

        </tr>
    </thead>
    <tfoot>
        <tr class="info">
            <?php
//            //$checked_array = json_decode(_options_option("config_pettycash_show_col_from_table"), true);
//            foreach (pettycash_db_col_list_from_table($c) as $th) {
//                if (isset($checked_array[$th]) || !isset($checked_array)) {
//                    echo "<th>" . _tr(ucfirst($th)) . "</th>";
//                }
//            }
            ?>            
            <?php pettycash_index_generate_column_headers($colsToShow); ?>                                                                
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$pettycash) {
                message("info", "No items");
            }

            foreach ($pettycash as $pettycash_item) {
                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropTableIndex" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Action") . '
                              <span class="caret"></span>
                            </button>
                            
                            <ul class="dropdown-menu" aria-labelledby="dropTableIndex">
                            
                            <?php if (permissions_has_permission($u_rol, "pettycash", "read")) { ?>
                              <li><a href="index.php?c=pettycash&a=details&id=' . $pettycash_item["id"] . '">' . _tr("Details") . '</a></li>
                            <?php } ?>
                            
                            <?php if (permissions_has_permission($u_rol, "pettycash", "update")) { ?>
                                <li><a href="index.php?c=pettycash&a=edit&id=' . $pettycash_item["id"] . '">' . _tr("Edit") . '</a></li>
                            <?php } ?>    

                             <?php if (permissions_has_permission($u_rol, "pettycash", "delete")) { ?>
                              <li role="separator" class="divider"></li>                              
                              <li><a href="index.php?c=pettycash&a=delete&id=' . $pettycash_item["id"] . '">' . _tr("Delete") . '</a></li>
                            <?php } ?>    
                            

                            </ul>
                          </div>';
                //     echo "<tr id=\"$pettycash_item[id]\">";
                // $checked_array = json_decode(_options_option("config_pettycash_show_col_from_table"), true);
//                foreach (pettycash_db_col_list_from_table($c) as $col_name) {
//                    if (isset($checked_array[$col_name]) || !isset($checked_array)) {
//                        //echo "<td>$pettycash_item[$col_name]</td>";
//                            
//                        // si una columna se llama xx
//                        if ($col_name == "xxxxxxxxxxxxxx") { // se pone un filtro en este caso la primera mayuscula
//                            echo "<td>" . pettycash_add_filter($col_name, $pettycash_item[$col_name], ucfirst($col_name)) . "</td>";
//                        } else {
//                            echo "<td>" . pettycash_add_filter($col_name, $pettycash_item[$col_name]) . "</td>";
//                        }                                                
//                    }
//                }                echo "<td>$menu</td>";
                echo "</tr>";

                //pettycash_index_generate_column_body_td($pettycash_item, $colsToShow);

                foreach ($colsToShow as $key => $col) {

                    switch ($col) {
                        case 'id':
                            echo '<td><a href="index.php?c=pettycash&a=details&id=' . $pettycash[$col] . '">' . $pettycash[$col] . '</a></td>';
                            break;
                        case 'id':
                            echo '<td>' . ($pettycash[$col]) . '</td>';
                            break;
                        case 'date':
                            echo '<td>' . ($pettycash[$col]) . '</td>';
                            break;
                        case 'description':
                            echo '<td>' . ($pettycash[$col]) . '</td>';
                            break;
                        case 'total':
                            echo '<td>' . ($pettycash[$col]) . '</td>';
                            break;
                        case 'date_registre':
                            echo '<td>' . ($pettycash[$col]) . '</td>';
                            break;
                        case 'order_by':
                            echo '<td>' . ($pettycash[$col]) . '</td>';
                            break;
                        case 'status':
                            echo '<td>' . ($pettycash[$col]) . '</td>';
                            break;
                        case 'button_details':
                            echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=pettycash&a=details&id=' . $pettycash['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                            break;

                        case 'button_pay':
                            echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=pettycash&a=details_payement&id=' . $pettycash['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                            break;

                        case 'button_edit':
                            echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=pettycash&a=edit&id=' . $pettycash['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                            break;

                        case 'button_print':
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=pettycash&a=export_pdf&id=' . $pettycash['id'] . '">' . icon("print") . '</a></td>';
                            break;

                        case 'button_save':
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=pettycash&a=export_pdf&way=pdf&&id=' . $pettycash['id'] . '">' . icon("floppy-save") . '</a></td > ';
                            break;

                        default:
                            echo '<td>' . ($pettycash[$col]) . '</td>';
                            break;
                    }
                }
            }
            ?>	
        </tr>
    </tbody>

    <?php include view("pettycash", "table_index_form_add"); ?>



</table>
<?php
//$pagination->createHtml();
?>
