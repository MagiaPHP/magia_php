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
# Fecha de creacion del documento: 2024-09-04 10:09:08 
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
if (_options_option("config_banks_lines_show_col_from_table")) {
    
    $config_banks_lines_show_col_from_table_json = _options_option("config_banks_lines_show_col_from_table"); 

    
    $colsToShow = (is_json($config_banks_lines_show_col_from_table_json)) ? json_decode($config_banks_lines_show_col_from_table_json, true) : [];


($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php banks_lines_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php banks_lines_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $banks_lines ){
                message("info", "No items"); 
            }

            foreach ($banks_lines as $banks_lines_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td><a href="index.php?c=banks_lines&a=details&id=' . $banks_lines_item['id'] . '">' . ($banks_lines_item['id']) . '</a></td>';
                        break;
                     case 'my_account':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'operation':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'date_operation':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'description':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'type':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'total':
                        echo '<td  class="text-right">' . monedaf($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'currency':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'date_value':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'account_sender':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'sender':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'comunication':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ce':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'details':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'message':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'id_office':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'office_name':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'value_bankCheck_transaction':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'countable_balance':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'suffix_account':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'sequential':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'available_balance':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'debit':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'credit':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref2':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref3':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref4':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref5':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref6':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref7':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref8':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref9':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'ref10':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'date_registre':
                        echo '<td>' . magia_dates_formated($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'code':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($banks_lines_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=banks_lines&a=details&id=' . $banks_lines_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_lines&a=details_payement&id=' . $banks_lines_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=banks_lines&a=edit&id=' . $banks_lines_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("banks_lines", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=banks_lines&a=delete&id=' . $banks_lines_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("banks_lines", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_lines&a=export_pdf&id=' . $banks_lines_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_lines&a=export_pdf&way=pdf&&id=' . $banks_lines_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("banks_lines", "table_index_form_add"); ?>
    
</table>

