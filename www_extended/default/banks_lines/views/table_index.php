<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>


<form class="form-inline" method="post" action='index.php'>
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="ok_edit_field">
    <input type="hidden" name="field" value="status">
    <input type="hidden" name="redi" value="1">


    <table class="table table-striped">
        <thead>
            <tr class="info">
                <td></td>
                <?php
                $order_icon_show = false;
                $checked_array = json_decode(_options_option("config_banks_lines_show_col_from_table"), true);
                foreach (banks_lines_db_col_list_from_table($c) as $th) {
                    $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
                    $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
                    $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;
                    if (isset($checked_array[$th]) || !isset($checked_array)) {
                        $order_icon_show = ($th == $order_col ) ? $order_icon : "";
                        $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";

                        switch ($th) {
                            case 'total':
                                echo '<th class="text-right"><a href="index.php?c=banks_lines&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
                                break;

                            default:
                                echo '<th><a href="index.php?c=banks_lines&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
                                break;
                        }
                    }
                    $order_icon_show = false;
                }
                ?>
                <th><?php _t("Action"); ?></th>                                                      
                <th><?php _t("Details"); ?></th>                                                      
            </tr>
        </thead>
        <tfoot>
            <tr class="info">
                <td></td>
                <?php
//$checked_array = json_decode(_options_option("config_banks_lines_show_col_from_table"), true);
                foreach (banks_lines_db_col_list_from_table($c) as $th) {
                    if (isset($checked_array[$th]) || !isset($checked_array)) {
                        echo "<th>" . _tr(ucfirst($th)) . "</th>";
                    }
                }
                ?>
                <th><?php _t("Action"); ?></th>     
                <th><?php _t("Details"); ?></th>                                                      
            </tr>
        </tfoot>
        <tbody>

            <?php
            if (!$banks_lines) {
                message("info", "No items");
            }

            $sum_control = 0;
            foreach ($banks_lines as $banks_lines_item) {

                $sum_control = $sum_control + $banks_lines_item['total'];

                $disabled = ($banks_lines_item['status'] === 100 ) ? " disabled " : "";

                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=banks_lines&a=details&id=' . $banks_lines_item["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=banks_lines&a=edit&id=' . $banks_lines_item["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=banks_lines&a=delete&id=' . $banks_lines_item["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';

                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="' . banks_lines_status_field_code('icon', $banks_lines_item['status']) . '"></span>  ' . _tr(banks_lines_status_field_code('name', $banks_lines_item['status'])) . '
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">';

                foreach (banks_lines_status_list() as $key => $blsl_items) {

                    $icon = ($blsl_items['icon']) ? '<span class="' . $blsl_items['icon'] . '"></span>' : '';

                    if ($blsl_items['status'] !== 100 && $banks_lines_item['status'] !== $blsl_items['code']) {

                        $menu .= '<li><a href="index.php?c=banks_lines&a=ok_edit_field&id[]=' . $banks_lines_item['id'] . '&field=status&new_data=' . $blsl_items['code'] . '&redi=1">' . $icon . ' ' . _tr($blsl_items['name']) . '</a></li>';
                    }
                }



                $menu .= '<li role="separator" class="divider"></li>';
//                $menu .= '<li><a href="index.php?c=banks_lines&a=details&id=' . $bl->getId() . '">' . _tr("Details") . '</a></li>';
                $menu .= '
                        <li><a href="index.php?c=banks_lines&a=ok_delete&id=' . $banks_lines_item["id"] . '&redi[redi]=1">' . icon("trash") . ' ' . _tr("Delete") . '</a></li>
                    </ul>
                          </div>';

                echo "<tr id=\"$banks_lines_item[id]\">";

                if ((int) $banks_lines_item['status'] !== 100) {
                    echo '
                    <td>                        
                            <label>
                                <input 
                                    name="id[]" 
                                    type="checkbox" 
                                    id="" 
                                    value="' . $banks_lines_item["id"] . '"                                 
                                ' . $disabled . '    
                                >
                            </label>
                        
                    </td>
                    ';
                } else {
                    echo '<td></td>';
                }






                $checked_array = json_decode(_options_option("config_banks_lines_show_col_from_table"), true);

                foreach (banks_lines_db_col_list_from_table($c) as $col_name) {

                    if (isset($checked_array[$col_name]) || !isset($checked_array)) {
                        //echo "<td>$banks_lines_item[$col_name]</td>";
                        // si una columna se llama xx

                        switch ($col_name) {
                            case "total":
                                $total_text_color = ($banks_lines_item[$col_name] < 0 ) ? "red" : "blue";
                                echo '<td class="text-right" width="120"><p style="color:' . $total_text_color . ';">' . moneda($banks_lines_item[$col_name]) . '</p></td>';
                                break;
                            case "status":
                                echo "<td bgcolor=\"" . banks_lines_status_field_code('color', $banks_lines_item[$col_name]) . "\">" . banks_lines_add_filter($col_name, $banks_lines_item[$col_name], banks_lines_status_field_code("name", $banks_lines_item[$col_name])) . "</td>";
                                break;

                            default:
                                echo "<td>" . banks_lines_add_filter($col_name, $banks_lines_item[$col_name]) . "</td>";
                                break;
                        }
                    }
                } echo "<td>";

                if ((int) $banks_lines_item['status'] !== 100) {
                    echo $menu;
                }

                echo "</td>";
                echo '<td><a class="btn btn-primary" href="index.php?c=banks_lines&a=details&id=' . $banks_lines_item['id'] . '">' . _tr("Details") . '</a></td>';
                echo "</tr>";
            }
            ?>	

        </tbody>
    </table>


    <p>
        <b><?php _t("Sum of total column"); ?></b>: <?php echo $sum_control; ?>
    </p>

    <p>
        <b><?php _t("Total bank lines"); ?></b>: <?php echo count(banks_lines_list()); ?> &
        <b><?php _t("Max value from operation column"); ?></b>: <?php echo (banks_lines_max_value_from_col('operation')); ?>
    </p>



    <hr>


    <div class="form-group">
        <label class="" for="all"><?php _t("Select all"); ?></label>
        <input type="checkbox" name="all" id="all" onclick="sellectAll(this);" />
    </div>

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("Status"); ?></label>
        <select class="form-control" name="new_data">
            <?php
            foreach (banks_lines_status_list() as $key => $blsl_items) {
                $blsl = new Banks_lines_status();
                $blsl->setBanks_lines_status($blsl_items["id"]);
                $icon = ($blsl->getIcon()) ? icon($blsl->getIcon()) : '';
                if ((int) $blsl->getCode() !== 100) {
                    echo '<option value="' . $blsl->getCode() . '">' . _tr($blsl->getName()) . '</option>';
                }
            }
            ?>

            <option value="delete"><?php _t("Delete"); ?></option>
        </select>
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon('refresh'); ?>
        <?php _t("Ok"); ?>
    </button>

</form>







<?php
//$pagination->createHtml();
?>
