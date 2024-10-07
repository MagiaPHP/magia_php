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
# Fecha de creacion del documento: 2024-09-04 14:09:29 
#################################################################################
?>

<form method="post" action="index.php">
    <input type="hidden" name="c" value="panels">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    
    <input type="hidden" name="redi[redi]" value="1">
    
    <table class="table table-bordered">
        
        <?php
//            $checked_array = json_decode(_options_option("config_panels_show_col_from_table"), true);
//            foreach (panels_db_col_list_from_table($c) as $th) {
//                // si hay como parte del array $checked_array
//                // o si el array tiene cero elementos (au no registrado)
//                $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";
//                echo '<tr><td><input ' . $checked . ' type="checkbox" name="' . $th . '" id="' . $th . '"> ' . $th . ' </td></tr>';
//            }


        $cols_to_show = array( 'id', 
 'controller', 
 'action', 
 'name', 
 'panel', 
 'order_by', 
 'status', 

            "button_details",
            "button_pay",
            "button_edit",
            "modal_edit",
            "button_delete",
            "modal_delete",
//            "button_print",
//            "button_save",
        );
        


        // Obtén la opción de configuración como una cadena
        $config_panels_show_col_json = _options_option("config_panels_show_col_from_table");

        // Verifica si la cadena es un JSON válido y decodifica. Si no es válido, asigna un array vacío
        $checked_array = is_json($config_panels_show_col_json) ? json_decode($config_panels_show_col_json, true)['cols'] : [];


        //$checked_array = json_decode(_options_option("config_panels_show_col_from_table"), true)['cols'];
            
        foreach ($cols_to_show as $th) {
            // si hay como parte del array $checked_array
            // o si el array tiene cero elementos (au no registrado)
            $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";

            switch ($th) {
                case "id":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('Id')) . ' </td><tr>';
                    break;
                    
                 case "controller": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "action": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "name": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "panel": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "order_by": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "status": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;



                default:
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>';
                    break;
            }
        }
        
       

            ?>
        <tr>
            <td>
                <button type="submit" class="btn btn-default"><?php echo icon("floppy-disk");  ?> <?php _t("Save"); ?></button>
            </td>
        </tr>
    </table>
</form>
