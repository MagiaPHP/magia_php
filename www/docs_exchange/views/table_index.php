
<?php //Creation date:  2024-07-31 05:07:17 ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_docs_exchange_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_docs_exchange_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php docs_exchange_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php docs_exchange_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $docs_exchange ){
                message("info", "No items"); 
            }

            foreach ($docs_exchange as $docs_exchange_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'reciver_tva':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'sender_name':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'label':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'sender_tva':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'doc_type':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'doc_id':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'json':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'pdf_base64':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'date_send':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($docs_exchange_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=docs_exchange&a=details&id=' . $docs_exchange_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docs_exchange&a=details_payement&id=' . $docs_exchange_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=docs_exchange&a=edit&id=' . $docs_exchange_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("docs_exchange", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=docs_exchange&a=delete&id=' . $docs_exchange_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("docs_exchange", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docs_exchange&a=export_pdf&id=' . $docs_exchange_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docs_exchange&a=export_pdf&way=pdf&&id=' . $docs_exchange_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("docs_exchange", "table_index_form_add"); ?>
    
</table>

