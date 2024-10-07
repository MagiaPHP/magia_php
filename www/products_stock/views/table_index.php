
<?php //Creation date:  2024-07-31 04:07:47 ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_products_stock_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_products_stock_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php products_stock_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php products_stock_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $products_stock ){
                message("info", "No items"); 
            }

            foreach ($products_stock as $products_stock_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td>' . ($products_stock_item[$col]) . '</td>';
                        break;
                     case 'product_code':
                        echo '<td>' . ($products_stock_item[$col]) . '</td>';
                        break;
                     case 'office_id':
                        echo '<td>' . ($products_stock_item[$col]) . '</td>';
                        break;
                     case 'stock':
                        echo '<td>' . ($products_stock_item[$col]) . '</td>';
                        break;
                     case 'stock_min':
                        echo '<td>' . ($products_stock_item[$col]) . '</td>';
                        break;
                     case 'stock_max':
                        echo '<td>' . ($products_stock_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($products_stock_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($products_stock_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=products_stock&a=details&id=' . $products_stock_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_stock&a=details_payement&id=' . $products_stock_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=products_stock&a=edit&id=' . $products_stock_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("products_stock", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=products_stock&a=delete&id=' . $products_stock_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("products_stock", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_stock&a=export_pdf&id=' . $products_stock_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_stock&a=export_pdf&way=pdf&&id=' . $products_stock_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("products_stock", "table_index_form_add"); ?>
    
</table>

