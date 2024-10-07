<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <?php
            $order_icon_show = false;

            foreach (json_decode(_options_option("config_expenses_show_col_from_table"), true)['cols'] as $th => $onoff) {



                vardump($th);

                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;

                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";

                    switch ($th) {
                        case 'my_ref':
                            echo '<th><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('My ref')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'category_code':
                            echo '<th><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('Category')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'provider_id':
                            echo '<th><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('Provider')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'total':
                            echo '<th class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('total')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'tax':
                            echo '<th class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('tva')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'tvac':
                            echo '<th  class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('tvac')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'advance':
                            echo '<th  class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('Paid')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'balance':
                            echo '<th  class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('To be pay')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        default:
                            echo '<th ><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
                            break;
                    }
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
            <?php
            $order_icon_show = false;

            foreach (json_decode(_options_option("config_expenses_show_col_from_table"), true)['cols'] as $th => $onoff) {


                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;

                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";

                    switch ($th) {
                        case 'my_ref':
                            echo '<th><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('My ref')) . ' ' . $order_icon_show . '</a></th>';
                            break;
                        case 'category_code':
                            echo '<th><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('Category code')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'total':
                            echo '<th class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('total')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'tax':
                            echo '<th class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('tva')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'tvac':
                            echo '<th  class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('tvac')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'advance':
                            echo '<th  class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('Paid')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        case 'balance':
                            echo '<th  class="text-right"><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst('To be pay')) . ' ' . $order_icon_show . '</a></th>';
                            break;

                        default:
                            echo '<th ><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
                            break;
                    }
                }


                $order_icon_show = false;
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

            $month = null;
            $month_actual = null;

            foreach ($expenses as $expense) {

                echo '<tr>';
                echo '<td>' . $expense['id'] . '</td>';
                echo '<tr>';

                vardump(($expenses_item));

                $expense = new Expense();
                $expense->setExpenses($expenses_item['id']);

                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropTableIndex" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Action") . '
                              <span class="caret"></span>
                            </button>
                            
                            <ul class="dropdown-menu" aria-labelledby="dropTableIndex">
                            
                            <?php if (permissions_has_permission($u_rol, "expenses", "read")) { ?>
                              <li><a href="index.php?c=expenses&a=details&id=' . $expense->getId() . '">' . _tr("Details") . '</a></li>
                            <?php } ?>
                            
                            <?php if (permissions_has_permission($u_rol, "expenses", "update")) { ?>
                                <li><a href="index.php?c=expenses&a=edit&id=' . $expense->getId() . '">' . _tr("Edit") . '</a></li>
                            <?php } ?>    

                             <?php if (permissions_has_permission($u_rol, "expenses", "delete")) { ?>
                              <li role="separator" class="divider"></li>                              
                              <li><a href="index.php?c=expenses&a=delete&id=' . $expense->getId() . '">' . _tr("Delete") . '</a></li>
                            <?php } ?>    
                            

                            </ul>
                          </div>';

                $btn_details = (permissions_has_permission($u_rol, $c, 'read')) ? '<a class="btn  btn-sm  btn-primary" href="index.php?c=expenses&a=details&id=' . $expense->getId() . '">' . icon("eye-open") . ' ' . _tr("Details") . '</a>' : '';

                $btn_pay = (permissions_has_permission($u_rol, $c, 'update')) ? '<a class="btn  btn-sm  btn-primary" href="index.php?c=expenses&a=details_payement&id=' . $expense->getId() . '">' . icon("shopping-cart") . '</a>' : '';

                $btn_edit = (permissions_has_permission($u_rol, $c, 'update')) ? '<a class="btn btn-sm   btn-danger" href="index.php?c=expenses&a=edit&id=' . $expense->getId() . '">' . icon("pencil") . '  ' . _tr("Edit") . '</a>' : '';

                // si no hay fecha, cojemos la fecha de registro 
                $date = ($expense->getDate()) ? $expense->getDate() : $expense->getDate_registre();
                $month_actual = magia_dates_get_month_from_date($date);

                if ($month_actual != $month) {
                    $month = $month_actual;
                    ?> 
                <tr  class='success'>
                    <td colspan="<?php echo count($expenses_db_col_list_from_table) + 3; ?>">
                        <b>
                            <?php echo _tr(magia_dates_month($month_actual)); ?>
                        </b>
                    </td>
                </tr>
                <?php
            }


            echo '<tr id="' . $expense->getId() . '">';

//            $checked_array = json_decode(_options_option("config_expenses_show_col_from_table"), true);

            foreach (json_decode(_options_option("config_expenses_show_col_from_table"), true)['cols'] as $col_name => $onoff) {

                vardump($col_name);

                //if (isset($checked_array[$col_name]) || !isset($checked_array)) {
                //echo "<td>$expenses_item[$col_name]</td>";
                // si una columna se llama xx
                //                        if ($col_name == "xxxxxxxxxxxxxx") { // se pone un filtro en este caso la primera mayuscula
                //                            echo "<td>" . expenses_add_filter($col_name, $expenses_item[$col_name], ucfirst($col_name)) . "</td>";
                //                        } else {
                //                            echo "<td>" . expenses_add_filter($col_name, $expenses_item[$col_name]) . "</td>";
                //                        }
                //                        vardump($expense->getValue($col_name));
                //vardump($col_name); 
                //                        vardump($expenses_item[$col_name]); 

                switch ($col_name) {
                    case 'category_code':
                        echo "<td>" . expenses_add_filter($col_name, $expenses_item[$col_name], expenses_categories_search_by_unique('category', 'code', $expenses_item[$col_name])) . "</td>";
                        break;

                    case 'provider_id':
                        echo "<td>" . expenses_add_filter($col_name, $expenses_item[$col_name], contacts_formated($expenses_item[$col_name])) . "</td>";
                        break;

                    case 'total':
                    case 'tax':
                    case 'tva':
                        echo "<td class='text-right'>" . expenses_add_filter($col_name, $expenses_item[$col_name], monedaf($expenses_item[$col_name])) . "</td>";
                        break;

                    case 'tvac':
                        echo "<td class='text-right'>" . monedaf($expenses_item[$col_name]) . "</td>";
                        break;

                    case 'advance':
                        echo "<td class='text-right'>" . monedaf($expenses_item[$col_name]) . "</td>";
                        break;

                    case 'balance':
                        echo "<td class='text-right'>" . monedaf($expenses_item[$col_name]) . "</td>";
                        break;

                    case 'status':
                        echo "<td>" . expenses_add_filter($col_name, $expenses_item[$col_name], _tr(expenses_status_field_code("name", $expenses_item[$col_name]))) . "</td>";
                        break;

                    default:
                        echo "<td>" . expenses_add_filter($col_name, $expenses_item[$col_name]) . "</td>";
                        break;
                }
                //
                //
                //
                //}
            }
            //echo "<td>$menu</td>";

            echo '<td>' . $btn_details . '</td>';
            echo '<td>' . $btn_pay . '</td>';
            echo '<td>' . $btn_edit . '</td>';

            echo "</tr>";
        }
        ?>	
        </tr>
    </tbody>
</table>
<?php
//$pagination->createHtml();
?>


