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
# Fecha de creacion del documento: 2024-08-31 17:08:51 
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
            <th><?php _t("Driver"); ?></th>
            <th><?php _t("Start date"); ?></th>
            <th><?php _t("End date"); ?></th>
            <th><?php _t("Vehicle"); ?></th>
        </tr>
    </thead>

    <tbody>

        <?php
        $i = 1;
        foreach (veh_vehicles_drivers_get_drivers_by_date("$year-$month-01") as $drivers) {
            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td><a href="index.php?c=contacts&a=veh_vehicles_drivers&id=' . $drivers['driver_id'] . '">' . contacts_formated($drivers['driver_id']) . '</a></td>';
            echo '<td>' . magia_dates_formated($drivers['date_start']) . '</td>';
            echo '<td>' . magia_dates_formated($drivers['date_end']) . '</td>';
            echo '<td>' . ($drivers['name']) . '</td>';
            echo '</tr>';
        }
        ?>	
        </tr>
    </tbody>
</table>

