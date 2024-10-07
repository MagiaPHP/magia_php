<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:12 
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
if (_options_option("config_inv_periods_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_inv_periods_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php inv_periods_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php inv_periods_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $inv_periods ){
                message("info", "No items"); 
            }

            foreach ($inv_periods as $inv_periods_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td><a href="index.php?c=inv_periods&a=details&id=' . $inv_periods_item['id'] . '">' . ($inv_periods_item['id']) . '</a></td>';
                        break;
                     case 'period':
                        echo '<td>' . ($inv_periods_item[$col]) . '</td>';
                        break;
                     case 'description':
                        echo '<td>' . ($inv_periods_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($inv_periods_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($inv_periods_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=inv_periods&a=details&id=' . $inv_periods_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_periods&a=details_payement&id=' . $inv_periods_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=inv_periods&a=edit&id=' . $inv_periods_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("inv_periods", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=inv_periods&a=delete&id=' . $inv_periods_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("inv_periods", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_periods&a=export_pdf&id=' . $inv_periods_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_periods&a=export_pdf&way=pdf&&id=' . $inv_periods_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($inv_periods[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("inv_periods", "table_index_form_add"); ?>
    
</table>

