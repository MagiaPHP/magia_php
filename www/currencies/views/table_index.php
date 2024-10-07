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
# Fecha de creacion del documento: 2024-09-04 08:09:19 
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
if (_options_option("config_currencies_show_col_from_table")) {
    
    $config_currencies_show_col_from_table_json = _options_option("config_currencies_show_col_from_table"); 

    
    $colsToShow = (is_json($config_currencies_show_col_from_table_json)) ? json_decode($config_currencies_show_col_from_table_json, true) : [];


($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php currencies_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php currencies_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $currencies ){
                message("info", "No items"); 
            }

            foreach ($currencies as $currencies_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td><a href="index.php?c=currencies&a=details&id=' . $currencies_item['id'] . '">' . ($currencies_item['id']) . '</a></td>';
                        break;
                     case 'name':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'code':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'rate':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'rate_silent':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'rate_id':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'accuracy':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'rounding':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'active':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'company_id':
                        echo '<td><a href="index.php?c=contacts&a=details&id=' . $currencies_item['company_id'] . '">' . contacts_formated($currencies_item['company_id']) . '</a></td>';
                        break;
                     case 'date':
                        echo '<td>' . magia_dates_formated($currencies_item[$col]) . '</td>';
                        break;
                     case 'base':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'position':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($currencies_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=currencies&a=details&id=' . $currencies_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=currencies&a=details_payement&id=' . $currencies_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=currencies&a=edit&id=' . $currencies_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("currencies", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=currencies&a=delete&id=' . $currencies_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("currencies", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=currencies&a=export_pdf&id=' . $currencies_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=currencies&a=export_pdf&way=pdf&&id=' . $currencies_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($currencies[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("currencies", "table_index_form_add"); ?>
    
</table>

