
<?php //Creation date:  2024-07-31 04:07:34 ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_products_presentation_names_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_products_presentation_names_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php products_presentation_names_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php products_presentation_names_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $products_presentation_names ){
                message("info", "No items"); 
            }

            foreach ($products_presentation_names as $products_presentation_names_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td>' . ($products_presentation_names_item[$col]) . '</td>';
                        break;
                     case 'presentation':
                        echo '<td>' . ($products_presentation_names_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($products_presentation_names_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($products_presentation_names_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=products_presentation_names&a=details&id=' . $products_presentation_names_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_presentation_names&a=details_payement&id=' . $products_presentation_names_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=products_presentation_names&a=edit&id=' . $products_presentation_names_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("products_presentation_names", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=products_presentation_names&a=delete&id=' . $products_presentation_names_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("products_presentation_names", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_presentation_names&a=export_pdf&id=' . $products_presentation_names_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_presentation_names&a=export_pdf&way=pdf&&id=' . $products_presentation_names_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($products_presentation_names[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("products_presentation_names", "table_index_form_add"); ?>
    
</table>

