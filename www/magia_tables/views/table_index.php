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
# Fecha de creacion del documento: 2024-08-31 17:08:56 
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
if (_options_option("config_magia_tables_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_magia_tables_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php magia_tables_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php magia_tables_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $magia_tables ){
                message("info", "No items"); 
            }

            foreach ($magia_tables as $magia_tables_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td><a href="index.php?c=magia_tables&a=details&id=' . $magia_tables_item['id'] . '">' . ($magia_tables_item['id']) . '</a></td>';
                        break;
                     case 'label':
                        echo '<td>' . ($magia_tables_item[$col]) . '</td>';
                        break;
                     case 'controller':
                        echo '<td>' . ($magia_tables_item[$col]) . '</td>';
                        break;
                     case 'action':
                        echo '<td>' . ($magia_tables_item[$col]) . '</td>';
                        break;
                     case 'name':
                        echo '<td>' . ($magia_tables_item[$col]) . '</td>';
                        break;
                     case 'code':
                        echo '<td>' . ($magia_tables_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($magia_tables_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($magia_tables_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=magia_tables&a=details&id=' . $magia_tables_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_tables&a=details_payement&id=' . $magia_tables_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=magia_tables&a=edit&id=' . $magia_tables_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("magia_tables", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=magia_tables&a=delete&id=' . $magia_tables_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("magia_tables", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_tables&a=export_pdf&id=' . $magia_tables_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_tables&a=export_pdf&way=pdf&&id=' . $magia_tables_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("magia_tables", "table_index_form_add"); ?>
    
</table>

