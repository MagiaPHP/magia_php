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
# Fecha de creacion del documento: 2024-09-16 17:09:42 
#################################################################################
?>
<form method="post" action="index.php">
    <input type="hidden" name="c" value="veh_vehicles_fuel">
    <input type="hidden" name="a" value="ok_index_cols_to_show">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $veh_vehicles_fuel_db_col_list_from_table = veh_vehicles_fuel_db_col_list_from_table($c);

    //Agrego a las columnas las de l directroy
    $array_btn = array(
        "button_details",
        //"button_pay",
        "button_edit",
        "modal_edit",
        "button_delete",
        "modal_delete",
        "button_print",
        "button_save",
    );
    foreach ($array_btn as $key => $button) {
        array_push($veh_vehicles_fuel_db_col_list_from_table, $button);
    }

    $i = 0;

    foreach ($veh_vehicles_fuel_db_col_list_from_table as $key => $cdbcts) {




     // $veh_vehicles_fuel_index_cols_to_show_array = json_decode(_options_option("veh_vehicles_fuel_index_cols_to_show"), true);
            
        
        $config_veh_vehicles_fuel_show_col_json = _options_option("config_veh_vehicles_fuel_show_col_from_table");

        
        $checked_array = is_json($config_veh_vehicles_fuel_show_col_json) ? json_decode($config_veh_vehicles_fuel_show_col_json, true) : [];

        //




        if ($veh_vehicles_fuel_index_cols_to_show_array) {
            
            $checked = ( in_array($cdbcts, $veh_vehicles_fuel_index_cols_to_show_array) ) ? " checked " : "";
        } else {
            $checked = "";
        }
        echo '
                        <div class="row">                            
                            <div class="col-xs-6 col-md-6 col-lg-6">
                                 <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="data[]" value="' . $cdbcts . '" ' . $checked . ' > ' . _tr(ucfirst($cdbcts)) . '
                                    </label>
                                  </div>                              
                            </div>
                        </div>
                        
';
    }
    ?>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Submit"); ?>
    </button>

</form>