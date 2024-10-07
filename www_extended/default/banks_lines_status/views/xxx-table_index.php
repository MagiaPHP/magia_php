
<?php //Creation date:  2024-05-21 02:05:24      ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
//vardump(_options_option('banks_lines_status_index_cols_to_show')); 


$colsToShow = json_decode(_options_option("banks_lines_status_index_cols_to_show"), true);
?>

<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
//            $order_icon_show = false;
//            $checked_array = json_decode(_options_option("config_banks_lines_status_show_col_from_table"), true);
//            foreach (banks_lines_status_db_col_list_from_table($c) as $th) {
//                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
//                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
//                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;
//                if (isset($checked_array[$th]) || !isset($checked_array)) {
//                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
//                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";
//                    echo '<th><a href="index.php?c=banks_lines_status&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
//                }
//                $order_icon_show = false;
//            }
            ?>                                
            <?php banks_lines_status_index_generate_column_headers($colsToShow); ?>

        </tr>
    </thead>
    <tfoot>
        <tr class="info">
            <?php
//            //$checked_array = json_decode(_options_option("config_banks_lines_status_show_col_from_table"), true);
//            foreach (banks_lines_status_db_col_list_from_table($c) as $th) {
//                if (isset($checked_array[$th]) || !isset($checked_array)) {
//                    echo "<th>" . _tr(ucfirst($th)) . "</th>";
//                }
//            }
            ?>            
            <?php banks_lines_status_index_generate_column_headers($colsToShow); ?>                                                                
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$banks_lines_status) {
                message("info", "No items");
            }

            foreach ($banks_lines_status as $key => $banks_lines_status_item) {

//                vardump($banks_lines_status_item); 


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropTableIndex" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Action") . '
                              <span class="caret"></span>
                            </button>
                            
                            <ul class="dropdown-menu" aria-labelledby="dropTableIndex">
                            
                            <?php if (permissions_has_permission($u_rol, "banks_lines_status", "read")) { ?>
                              <li><a href="index.php?c=banks_lines_status&a=details&id=' . $banks_lines_status_item["id"] . '">' . _tr("Details") . '</a></li>
                            <?php } ?>
                            
                            <?php if (permissions_has_permission($u_rol, "banks_lines_status", "update")) { ?>
                                <li><a href="index.php?c=banks_lines_status&a=edit&id=' . $banks_lines_status_item["id"] . '">' . _tr("Edit") . '</a></li>
                            <?php } ?>    

                             <?php if (permissions_has_permission($u_rol, "banks_lines_status", "delete")) { ?>
                              <li role="separator" class="divider"></li>                              
                              <li><a href="index.php?c=banks_lines_status&a=delete&id=' . $banks_lines_status_item["id"] . '">' . _tr("Delete") . '</a></li>
                            <?php } ?>    
                            

                            </ul>
                          </div>';

                //     echo "<tr id=\"$banks_lines_status_item[id]\">";
                // $checked_array = json_decode(_options_option("config_banks_lines_status_show_col_from_table"), true);
//                foreach (banks_lines_status_db_col_list_from_table($c) as $col_name) {
//                    if (isset($checked_array[$col_name]) || !isset($checked_array)) {
//                        //echo "<td>$banks_lines_status_item[$col_name]</td>";
//                            
//                        // si una columna se llama xx
//                        if ($col_name == "xxxxxxxxxxxxxx") { // se pone un filtro en este caso la primera mayuscula
//                            echo "<td>" . banks_lines_status_add_filter($col_name, $banks_lines_status_item[$col_name], ucfirst($col_name)) . "</td>";
//                        } else {
//                            echo "<td>" . banks_lines_status_add_filter($col_name, $banks_lines_status_item[$col_name]) . "</td>";
//                        }                                                
//                    }
//                }                echo "<td>$menu</td>";
                echo "</tr>";

                banks_lines_status_index_generate_column_body_td($banks_lines_status_item, $colsToShow);
            }
            ?>	
        </tr>
    </tbody>

    <?php include view("banks_lines_status", "table_index_form_add"); ?>



</table>
<?php
//$pagination->createHtml();
?>
