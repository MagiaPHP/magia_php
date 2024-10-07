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
# Fecha de creacion del documento: 2024-08-31 17:08:46 
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
if (_options_option("config_magia_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_magia_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php magia_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php magia_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $magia ){
                message("info", "No items"); 
            }

            foreach ($magia as $magia_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td><a href="index.php?c=magia&a=details&id=' . $magia_item['id'] . '">' . ($magia_item['id']) . '</a></td>';
                        break;
                     case 'form_id':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_db':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_table':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_field_name':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_action':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_label':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_type':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_class':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_table_external':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_col_external':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_name':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_id':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_placeholder':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_value':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_only_read':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_mandatory':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_selected':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'm_disabled':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($magia_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=magia&a=details&id=' . $magia_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia&a=details_payement&id=' . $magia_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=magia&a=edit&id=' . $magia_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("magia", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=magia&a=delete&id=' . $magia_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("magia", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia&a=export_pdf&id=' . $magia_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia&a=export_pdf&way=pdf&&id=' . $magia_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($magia[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("magia", "table_index_form_add"); ?>
    
</table>

