
<?php //Creation date:  2024-08-12 09:08:01 ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_api_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_api_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php api_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php api_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $api ){
                message("info", "No items"); 
            }

            foreach ($api as $api_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'contact_id':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'api_key':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'crud':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'date_start':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'date_end':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'requests_limit':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'limit_period':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'requests_made':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'last_request':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($api_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=api&a=details&id=' . $api_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=api&a=details_payement&id=' . $api_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=api&a=edit&id=' . $api_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("api", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=api&a=delete&id=' . $api_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("api", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=api&a=export_pdf&id=' . $api_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=api&a=export_pdf&way=pdf&&id=' . $api_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($api[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("api", "table_index_form_add"); ?>
    
</table>

