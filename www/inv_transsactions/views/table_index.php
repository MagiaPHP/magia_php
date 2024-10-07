<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
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
if (_options_option("config_inv_transsactions_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_inv_transsactions_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php inv_transsactions_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php inv_transsactions_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $inv_transsactions ){
                message("info", "No items"); 
            }

            foreach ($inv_transsactions as $inv_transsactions_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td><a href="index.php?c=inv_transsactions&a=details&id=' . $inv_transsactions_item['id'] . '">' . ($inv_transsactions_item['id']) . '</a></td>';
                        break;
                     case 'company_id':
                        echo '<td><a href="index.php?c=contacts&a=details&id=' . $inv_transsactions_item['company_id'] . '">' . contacts_formated($inv_transsactions_item['company_id']) . '</a></td>';
                        break;
                     case 'product':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'transaction_number':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'period':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'start_date':
                        echo '<td>' . magia_dates_formated($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'operation_number':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'currency':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'amount':
                        echo '<td  class="text-right">' . monedaf($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'percentage':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'term':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'interest':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'total':
                        echo '<td  class="text-right">' . monedaf($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'retencion':
                        echo '<td  class="text-right">' . monedaf($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'company_comission':
                        echo '<td  class="text-right">' . monedaf($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'comision_bolsa':
                        echo '<td  class="text-right">' . monedaf($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'total_receivable':
                        echo '<td  class="text-right">' . monedaf($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'expiration_date':
                        echo '<td>' . magia_dates_formated($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($inv_transsactions_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=inv_transsactions&a=details&id=' . $inv_transsactions_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_transsactions&a=details_payement&id=' . $inv_transsactions_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=inv_transsactions&a=edit&id=' . $inv_transsactions_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("inv_transsactions", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=inv_transsactions&a=delete&id=' . $inv_transsactions_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("inv_transsactions", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_transsactions&a=export_pdf&id=' . $inv_transsactions_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_transsactions&a=export_pdf&way=pdf&&id=' . $inv_transsactions_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("inv_transsactions", "table_index_form_add"); ?>
    
</table>

