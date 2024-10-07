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
# Fecha de creacion del documento: 2024-08-31 17:08:05 
#################################################################################
?>

<form method="post" action="index.php">
    <input type="hidden" name="c" value="magia_table_lines">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">
    
    <table class="table table-bordered">
        
        <?php
//            $checked_array = json_decode(_options_option("config_magia_table_lines_show_col_from_table"), true);
//            foreach (magia_table_lines_db_col_list_from_table($c) as $th) {
//                // si hay como parte del array $checked_array
//                // o si el array tiene cero elementos (au no registrado)
//                $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";
//                echo '<tr><td><input ' . $checked . ' type="checkbox" name="' . $th . '" id="' . $th . '"> ' . $th . ' </td></tr>';
//            }


        $cols_to_show = array( 'id', 
 'table_id', 
 'header_icon', 
 'header_pre_label', 
 'header_label', 
 'header_url', 
 'header_post_label', 
 'body_icon', 
 'body_pre_label', 
 'body_label', 
 'body_post_label', 
 'footer_icon', 
 'footer_pre_label', 
 'footer_label', 
 'footer_post_label', 
 'description', 
 'permission', 
 'align', 
 'show', 
 'translate', 
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
        
        $checked_array = json_decode(_options_option("config_magia_table_lines_show_col_from_table"), true)['cols'];
            
        foreach ($cols_to_show as $th) {
            // si hay como parte del array $checked_array
            // o si el array tiene cero elementos (au no registrado)
            $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";

            switch ($th) {
                case "id":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('Id')) . ' </td><tr>';
                    break;
                    
                 case "table_id": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "header_icon": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "header_pre_label": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "header_label": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "header_url": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "header_post_label": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "body_icon": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "body_pre_label": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "body_label": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "body_post_label": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "footer_icon": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "footer_pre_label": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "footer_label": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "footer_post_label": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "description": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "permission": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "align": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "show": 
                     echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>'; 
                     break;

                 case "translate": 
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
