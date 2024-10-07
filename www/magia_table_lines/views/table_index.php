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


<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_magia_table_lines_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_magia_table_lines_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php magia_table_lines_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php magia_table_lines_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $magia_table_lines ){
                message("info", "No items"); 
            }

            foreach ($magia_table_lines as $magia_table_lines_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td><a href="index.php?c=magia_table_lines&a=details&id=' . $magia_table_lines_item['id'] . '">' . ($magia_table_lines_item['id']) . '</a></td>';
                        break;
                     case 'table_id':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'header_icon':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'header_pre_label':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'header_label':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'header_url':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'header_post_label':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'body_icon':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'body_pre_label':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'body_label':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'body_post_label':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'footer_icon':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'footer_pre_label':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'footer_label':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'footer_post_label':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'description':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'permission':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'align':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'show':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'translate':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($magia_table_lines_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=magia_table_lines&a=details&id=' . $magia_table_lines_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_table_lines&a=details_payement&id=' . $magia_table_lines_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=magia_table_lines&a=edit&id=' . $magia_table_lines_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("magia_table_lines", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=magia_table_lines&a=delete&id=' . $magia_table_lines_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("magia_table_lines", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_table_lines&a=export_pdf&id=' . $magia_table_lines_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_table_lines&a=export_pdf&way=pdf&&id=' . $magia_table_lines_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("magia_table_lines", "table_index_form_add"); ?>
    
</table>

