
<?php //Creation date:  2024-07-31 05:07:21 ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_schedule_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_schedule_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php schedule_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
                        
            <?php schedule_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
<tbody>
        
            <?php            
            if( ! $schedule ){
                message("info", "No items"); 
            }

            foreach ($schedule as $schedule_item) { echo '<tr>';                                                                              
                foreach ($cols_to_show_keys as $key => $col) {

                    switch ($col) {
                                         case 'id':
                        echo '<td>' . ($schedule_item[$col]) . '</td>';
                        break;
                     case 'contact_id':
                        echo '<td>' . ($schedule_item[$col]) . '</td>';
                        break;
                     case 'day':
                        echo '<td>' . ($schedule_item[$col]) . '</td>';
                        break;
                     case 'am_start':
                        echo '<td>' . ($schedule_item[$col]) . '</td>';
                        break;
                     case 'am_end':
                        echo '<td>' . ($schedule_item[$col]) . '</td>';
                        break;
                     case 'pm_start':
                        echo '<td>' . ($schedule_item[$col]) . '</td>';
                        break;
                     case 'pm_end':
                        echo '<td>' . ($schedule_item[$col]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($schedule_item[$col]) . '</td>';
                        break;
                     case 'status':
                        echo '<td>' . ($schedule_item[$col]) . '</td>';
                        break;
case 'button_details':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=schedule&a=details&id=' . $schedule_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=schedule&a=details_payement&id=' . $schedule_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=schedule&a=edit&id=' . $schedule_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                
            case 'modal_edit':
//                echo '<td>';
//                include view("schedule", "modal_edit");
//                echo '</td>';
                break;
                
            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=schedule&a=delete&id=' . $schedule_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                break;
                
            case 'modal_delete':
                echo '<td>';
                include view("schedule", "modal_delete");
                echo '</td>';
                break;
                                
            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=schedule&a=export_pdf&id=' . $schedule_item['id'] . '">' . icon("print") . '</a></td>';
                break;


            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=schedule&a=export_pdf&way=pdf&&id=' . $schedule_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;
    
    default:
    echo '<td>' . ($schedule[$col]) . '</td>';
                break;
        }
    }
    
echo '</tr>'; 
}
            ?>	
        </tr>
    </tbody>
    
    <?php // include view("schedule", "table_index_form_add"); ?>
    
</table>

