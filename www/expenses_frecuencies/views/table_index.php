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
# Fecha de creacion del documento: 2024-09-04 08:09:23 
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
if (_options_option("config_expenses_frecuencies_show_col_from_table")) {
    
    $config_expenses_frecuencies_show_col_from_table_json = _options_option("config_expenses_frecuencies_show_col_from_table"); 

    
    $colsToShow = (is_json($config_expenses_frecuencies_show_col_from_table_json)) ? json_decode($config_expenses_frecuencies_show_col_from_table_json, true) : [];


($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php expenses_frecuencies_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php expenses_frecuencies_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $expenses_frecuencies ){
                message("info", "No items"); 
            }

            foreach ($expenses_frecuencies as $expenses_frecuencies_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td><a href="index.php?c=expenses_frecuencies&a=details&id=' . $expenses_frecuencies_item['id'] . '">' . ($expenses_frecuencies_item['id']) . '</a></td>';
                        break;
                     case 'frecuency':
                        echo '<td>' . ($expenses_frecuencies_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($expenses_frecuencies_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($expenses_frecuencies_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=expenses_frecuencies&a=details&id=' . $expenses_frecuencies_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_frecuencies&a=details_payement&id=' . $expenses_frecuencies_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=expenses_frecuencies&a=edit&id=' . $expenses_frecuencies_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("expenses_frecuencies", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=expenses_frecuencies&a=delete&id=' . $expenses_frecuencies_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("expenses_frecuencies", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_frecuencies&a=export_pdf&id=' . $expenses_frecuencies_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_frecuencies&a=export_pdf&way=pdf&&id=' . $expenses_frecuencies_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($expenses_frecuencies[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("expenses_frecuencies", "table_index_form_add"); ?>
    
</table>

