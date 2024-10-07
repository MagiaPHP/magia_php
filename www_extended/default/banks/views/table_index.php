
<?php //Creation date:  2024-05-27 03:05:57           ?>

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
//$colsToShow = json_decode(_options_option("config_banks_show_col_from_table"), true);
?>

<table class="table table-striped">
    <thead>
        <tr class="info">
            <?php
            $order_icon_show = false;

            foreach (json_decode(_options_option("config_banks_show_col_from_table"), true)['cols'] as $th => $onoff) {

                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;

                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";

                    switch ($th) {

                        default:
                            echo '<th ><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
                            break;
                    }
                }


                $order_icon_show = false;
            }
            ?>

        </tr>
    </thead>
    <tfoot>
        <tr class="info">
            <?php
            $order_icon_show = false;

            foreach (json_decode(_options_option("config_banks_show_col_from_table"), true)['cols'] as $th => $onoff) {

                $order_icon_up = '<span class="glyphicon glyphicon-sort-by-attributes"></span>';
                $order_icon_down = '<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>';
                $order_icon = ($order_way == "desc") ? $order_icon_down : $order_icon_up;

                if (isset($checked_array[$th]) || !isset($checked_array)) {
                    $order_icon_show = ($th == $order_col ) ? $order_icon : "";
                    $link_order_way = ($order_way == "desc") ? "&order_way=asc" : "&order_way=desc";

                    switch ($th) {

                        default:
                            echo '<th ><a href="index.php?c=expenses&order_col=' . $th . '' . $link_order_way . ' ">' . _tr(ucfirst($th)) . ' ' . $order_icon_show . '</a></th>';
                            break;
                    }
                }


                $order_icon_show = false;
            }
            ?>                                                          
        </tr>
    </tfoot>
    <tbody>

        <?php
        if (!$banks) {
            message("info", "No items");
        }

        foreach ($banks as $banks_item) {

            echo '<tr>';

            foreach ((json_decode(_options_option("config_banks_show_col_from_table"), true)['cols']) as $col => $key) {

                switch ($col) {
                    case 'id':
                        echo '<td><a href="index.php?c=banks&a=details&id=' . $banks_item[$col] . '">' . $banks_item[$col] . '</a></td>';
                        break;

                    case 'contact_id':
                        //echo '<td>' . contacts_formated($banks_item[$col]) . '</td>';
                        echo '<td><a href="index.php?c=contacts&a=details&id=' . $banks_item[$col] . '">' . contacts_formated($banks_item[$col]) . '</a></td>';
                        
                        break;
                    case 'bank':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'account_number':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'bic':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'iban':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'code':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'codification':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'delimiter':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'date_format':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'thousands_separator':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'decimal_separator':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'invoices':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'order_by':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'status':
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                    case 'button_details':
                        echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=banks&a=details&id=' . $banks_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case 'button_pay':
                        echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=banks&a=details_payement&id=' . $banks_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case 'button_edit':
                        echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks&a=edit&id=' . $banks_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case 'button_print':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks&a=export_pdf&id=' . $banks_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case 'button_save':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks&a=export_pdf&way=pdf&&id=' . $banks_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    default:
                        echo '<td>' . ($banks_item[$col]) . '</td>';
                        break;
                }
            }

            echo '</tr>';
        }
        ?>	

    </tbody>

    <?php include view("banks", "table_index_form_add"); ?>



</table>
<?php
//$pagination->createHtml();
?>
