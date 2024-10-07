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
# Fecha de creacion del documento: 2024-09-04 08:09:51 
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
if (_options_option("config_country_provinces_show_col_from_table")) {
    
    $config_country_provinces_show_col_from_table_json = _options_option("config_country_provinces_show_col_from_table"); 

    
    $colsToShow = (is_json($config_country_provinces_show_col_from_table_json)) ? json_decode($config_country_provinces_show_col_from_table_json, true) : [];


($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php country_provinces_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php country_provinces_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $country_provinces ){
                message("info", "No items"); 
            }

            foreach ($country_provinces as $country_provinces_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td><a href="index.php?c=country_provinces&a=details&id=' . $country_provinces_item['id'] . '">' . ($country_provinces_item['id']) . '</a></td>';
                        break;
                     case 'country':
                        echo '<td>' . countries_field_country_code("countryName", $country_provinces_item[$col]) . '</td>';
                        break;
                     case 'code':
                        echo '<td>' . ($country_provinces_item[$col]) . '</td>';
                        break;
                     case 'province':
                        echo '<td>' . ($country_provinces_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($country_provinces_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($country_provinces_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=country_provinces&a=details&id=' . $country_provinces_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=country_provinces&a=details_payement&id=' . $country_provinces_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=country_provinces&a=edit&id=' . $country_provinces_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("country_provinces", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=country_provinces&a=delete&id=' . $country_provinces_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("country_provinces", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=country_provinces&a=export_pdf&id=' . $country_provinces_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=country_provinces&a=export_pdf&way=pdf&&id=' . $country_provinces_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($country_provinces[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("country_provinces", "table_index_form_add"); ?>
    
</table>

