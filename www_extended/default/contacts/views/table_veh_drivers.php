
<?php
//Creation date:  2024-06-27 05:06:20          
?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_veh_drivers_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_veh_drivers_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr>            

            <th><?php _t("Country"); ?></th>
            <th><?php _t("License"); ?></th>
            <th><?php _t("type"); ?></th>
            <th><?php _t("Number"); ?></th>
            <th><?php _t("Date start"); ?></th>
            <th><?php _t("Date end"); ?></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        //vardump($veh_drivers); 

        foreach ($veh_drivers as $veh_drivers_item) {

            $is_expired = ($veh_drivers_item['expired'])?' <span class="label label-danger">'._tr('Expired document').'</span> ':'';

            echo '<tr>';

            echo '<td>' . countries_field_country_code('countryName', $veh_drivers_item['country']) . '</td>';
            echo '<td>' . ($veh_drivers_item['license']) . '</td>';
            echo '<td>' . ($veh_drivers_item['type']) . '</td>';
            echo '<td>' . ($veh_drivers_item['number']) . '</td>';
            echo '<td>' . magia_dates_formated($veh_drivers_item['date_start']) . '</td>';
            echo '<td>' . magia_dates_formated($veh_drivers_item['date_end']) . '</td>';
            echo '<td>' . ($is_expired) . '</td>';

            echo '<td>';
//            include view("veh_drivers", "modal_edit");
            echo '</td>';

            echo '<td>';

            $arg['redi'] = '5';
            $arg['c'] = 'contacts';
            $arg['a'] = 'veh_vehicles_drivers';
            $arg['params'] = "id=$id";
            $arg['contact_id'] = $id;

            include view("veh_drivers", "modal_delete");
            echo '</td>';

//            
//            
//            
//            //            foreach ($cols_to_show_keys as $key => $col) {
//
//                //vardump($veh_drivers_item[$col]); 
//
//
//                switch ($col) {
//                    case 'id':
//                        echo '<td>' . ($veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'contact_id':
//                        //echo '<td>' . contacts_formated($veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'country':
//                        echo '<td>' . countries_field_country_code('countryName', $veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'license':
//                        echo '<td>' . ($veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'type':
//                        echo '<td>' . ($veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'number':
//                        echo '<td>' . ($veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'date_start':
//                        echo '<td>' . ($veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'date_end':
//                        echo '<td>' . ($veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'order_by':
//                        echo '<td>' . ($veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'status':
//                        echo '<td>' . ($veh_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'button_details':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=veh_drivers&a=details&id=' . $veh_drivers_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                        break;
//
//                    case 'button_pay':
//                        //    echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_drivers&a=details_payement&id=' . $veh_drivers_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                        break;
//
//                    case 'button_edit':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=veh_drivers&a=edit&id=' . $veh_drivers_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                        break;
//
//                    case 'button_delete':
//                        echo '<td>';
//                        include view("veh_drivers", "modal_delete");
//                        echo '</td>';
//                        break;
//
//                    case 'modal_delete':
//                        echo '<td>';
//                        //include view("veh_drivers", "modal_delete");
//                        echo '</td>';
//                        break;
//
//                    case 'modal_edit':
//                        echo '<td>';
//                        //include view("veh_drivers", "modal_delete");
//                        echo '</td>';
//                        break;
//
//                    case 'button_print':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_drivers&a=export_pdf&id=' . $veh_drivers_item['id'] . '">' . icon("print") . '</a></td>';
//                        break;
//                        
//
//                    case 'button_save':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_drivers&a=export_pdf&way=pdf&&id=' . $veh_drivers_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                        break;
//
//                    default:
//                        echo '<td>' . ($veh_drivers[$col]) . '</td>';
//                        break;
//                }
//            }

            echo '</tr>';
        }
        ?>	
        </tr>
    </tbody>

    <?php // include view("veh_drivers", "table_index_form_add");    ?>

</table>

