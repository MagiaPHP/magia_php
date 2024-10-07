<?php
$array_field_money = array('total', 'tax', 'advance', 'balance');
?>

<table class="table table-striped">
    <thead>
        <tr class="info">
            <th>#</th>
            <?php
            $order_icon_show = false;

            $checked_array = json_decode(_options_option("config_expenses_show_col_from_table"), true);

            foreach (expenses_db_col_list_from_table($c) as $th) {

                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';

                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';

                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;

                if (isset($checked_array[$th]) || !isset($checked_array)) {

                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";

                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";

                    $class = (in_array($th, $array_field_money)) ? ' class="text-right" ' : null;

                    echo '<th ' . $class . ' ><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
                }
                $order_icon_show = false;
            }
            ?>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="info">

            <td>#</td>
            <?php
            //$checked_array = json_decode(_options_option("config_expenses_show_col_from_table"), true);
            foreach (expenses_db_col_list_from_table($c) as $th) {
                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    echo "<th>" . _tr(ucfirst($th)) . "</th>";
                }
            }
            ?>
            <th></th>                                                      
            <th></th>                                                      
            <th></th>                                                      

        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$expenses) {
                message("info", "No items");
            }

            $total_total = 0;
            $total_tax = 0;
            $i = 1;
            foreach ($expenses as $expenses_item) {
                //
                $total_total = $total_total + $expenses_item['total'];
                $total_tax = $total_tax + $expenses_item['tax'];

                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=expenses&a=details&id=' . $expenses_item["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=expenses&a=edit&id=' . $expenses_item["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=expenses&a=delete&id=' . $expenses_item["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                //
                //
                echo "<tr id=\"$expenses_item[id]\">";

                echo '<td>' . $i . '</td>';
                $checked_array = json_decode(_options_option("config_expenses_show_col_from_table"), true);

                foreach (expenses_db_col_list_from_table($c) as $col_name) {
                    $class = (in_array($col_name, $array_field_money)) ? ' class="text-right" ' : null;
                    if (isset($checked_array[$col_name]) || !isset($checked_array)) {
                        //echo "<td>$expenses_item[$col_name]</td>";                                                
                        echo "<td " . $class . " >" . expenses_add_filter($col_name, $expenses_item[$col_name]) . "</td>";
                    }
                }
//                echo "<td " . $class . ">$menu</td>";
                echo '<td><a class="btn btn-primary" href="index.php?c=expenses&a=details&id=' . $expenses_item['id'] . '">' . _tr("Details") . '</a></td>';
                echo '<td><a class="btn btn-primary" href="index.php?c=expenses&a=edit&id=' . $expenses_item['id'] . '">' . _tr("Edit") . '</a></td>';
                echo '<td><a class="btn btn-primary" href="index.php?c=expenses&a=details&id=' . $expenses_item['id'] . '">' . _tr("Pay") . '</a></td>';
                //  echo '<td><a class="btn btn-primary" href="index.php?c=expenses&preview=1&&id=' . $expenses_item['id'] . '">' . _tr("Preview") . '</a></td>';
                echo "</tr>";
                $i++;
            }
            ?>	

        </tr>
    </tbody>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td class="text-right"><?php echo moneda($total_total); ?></td>
        <td class="text-right"><?php echo moneda($total_tax); ?></td>

        <td colspan="8"></td>
    </tr>
</table>
<?php
$pagination->createHtml();
?>



