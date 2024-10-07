<?php
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-30 16:08:28 
#################################################################################
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
if (_options_option("config_veh_vehicles_drivers_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_veh_vehicles_drivers_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr>            
            <th>#</th>
            <th><?php _t("Vehicle"); ?></th>
            <th><?php _t("Date start"); ?></th>
            <th><?php _t("Date end"); ?></th>
            <th><?php _t("Notes"); ?></th>
            <th></th>                        
            <th></th>                        
            <th></th>

        </tr>
    </thead>


    <tbody>

        <?php
        $i = 1;
        foreach ($veh_vehicles_drivers as $veh_vehicles_drivers_item) {


            // para form_edit sin esto no funcion 
            $veh_vehicles_drivers = new Veh_vehicles_drivers();
            $veh_vehicles_drivers->setVeh_vehicles_drivers($veh_vehicles_drivers_item['id']);
            
            
            
///
            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td><a href="index.php?c=veh_vehicles&a=details&id=' . ($veh_vehicles_drivers_item['vehicle_id']) . '">' . veh_vehicles_field_id('name', $veh_vehicles_drivers_item['vehicle_id']) . '</a></td>';
            echo '<td>' . magia_dates_formated($veh_vehicles_drivers_item['date_start'] ?? '') . '</td>';
            echo '<td>' . magia_dates_formated($veh_vehicles_drivers_item['date_end'] ?? '') . '</td>';
            echo '<td>' . ($veh_vehicles_drivers_item['notes'] ?? '') . '</td>';

            echo '<td>';

            $arg['redi'] = '5';
            $arg['c'] = 'contacts';
            $arg['a'] = 'veh_vehicles_drivers';
            $arg['params'] = "id=$id";
            $arg['driver_id'] = $id;
            
                        

            include view("veh_vehicles_drivers", "modal_edit");
            //
            echo'</td>';

            echo '<td>';

            $arg['redi'] = '5';
            $arg['c'] = 'contacts';
            $arg['a'] = 'veh_vehicles_drivers';
            $arg['params'] = "id=$id";
            $arg['driver_id'] = $id;
            


            include view("veh_vehicles_drivers", "modal_delete");
            echo'</td>';

            echo '<td></td>';

//            foreach ($cols_to_show_keys as $key => $col) {
//
//                switch ($col) {
//                    case 'id':
//                        echo '<td><a href="index.php?c=veh_vehicles_drivers&a=details&id=' . $veh_vehicles_drivers_item['id'] . '">' . ($veh_vehicles_drivers_item['id']) . '</a></td>';
//                        break;
//                    case 'vehicle_id':
//                        echo '<td>' . ($veh_vehicles_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'driver_id':
//                        echo '<td><a href="index.php?c=contacts&a=details&id=' . $veh_vehicles_drivers_item['driver_id'] . '">' . contacts_formated($veh_vehicles_drivers_item['driver_id']) . '</a></td>';
//                        break;
//                    case 'date_start':
//                        echo '<td>' . ($veh_vehicles_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'notes':
//                        echo '<td>' . ($veh_vehicles_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'date_registre':
//                        echo '<td>' . ($veh_vehicles_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'order_by':
//                        echo '<td>' . ($veh_vehicles_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'status':
//                        echo '<td>' . ($veh_vehicles_drivers_item[$col]) . '</td>';
//                        break;
//                    case 'button_details':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=veh_vehicles_drivers&a=details&id=' . $veh_vehicles_drivers_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
//                        break;
//
//                    case 'button_pay':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles_drivers&a=details_payement&id=' . $veh_vehicles_drivers_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
//                        break;
//
//                    case 'button_edit':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=veh_vehicles_drivers&a=edit&id=' . $veh_vehicles_drivers_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
//                        break;
//
//                    case 'modal_edit':
////                echo '<td>';
////                include view("veh_vehicles_drivers", "modal_edit");
////                echo '</td>';
//                        break;
//
//                    case 'button_delete':
//                        echo '<td><a class="btn btn-sm btn-default" href="index.php?c=veh_vehicles_drivers&a=delete&id=' . $veh_vehicles_drivers_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
//                        break;
//
//                    case 'modal_delete':
//                        echo '<td>';
//                        include view("veh_vehicles_drivers", "modal_delete");
//                        echo '</td>';
//                        break;
//
//                    case 'button_print':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles_drivers&a=export_pdf&id=' . $veh_vehicles_drivers_item['id'] . '">' . icon("print") . '</a></td>';
//                        break;
//
//                    case 'button_save':
//                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles_drivers&a=export_pdf&way=pdf&&id=' . $veh_vehicles_drivers_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
//                        break;
//
//                    default:
//                        echo '<td>' . ($veh_vehicles_drivers[$col]) . '</td>';
//                        break;
//                }
//            }

            echo '</tr>';
        }
        ?>	
        </tr>
    </tbody>

    <?php // include view("veh_vehicles_drivers", "table_index_form_add");         ?>

</table>

