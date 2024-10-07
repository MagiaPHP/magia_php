
<?php //Creation date:  2024-06-20 03:06:29        ?>

<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php
if (_options_option("config_doc_docs_show_col_from_table")) {
    $colsToShow = json_decode(_options_option("config_doc_docs_show_col_from_table"), true);
    ($cols_to_show_keys = array_keys($colsToShow["cols"]) );
} else {
    $cols_to_show_keys = array("id");
}
?>



<table class="table table-striped">
    <thead>
        <tr class="info">            
            <?php doc_docs_index_generate_column_headers($cols_to_show_keys); ?>                                                                              
        </tr>
    </thead>
    <tfoot>
        <tr class="info">

            <?php doc_docs_index_generate_column_headers($cols_to_show_keys); ?>                                                                
        </tr>
    </tfoot>
    <tbody>

        <?php
        if (!$doc_docs) {
            message("info", "No items");
        }

        foreach ($doc_docs as $doc_docs_item) {
            echo '<tr>';
            foreach ($cols_to_show_keys as $key => $col) {

                switch ($col) {
                    case 'id':
                        echo '<td>' . ($doc_docs_item[$col]) . '</td>';
                        break;
                    case 'doc':
                        echo '<td>' . ($doc_docs_item[$col]) . '</td>';
                        break;
                    case 'order_by':
                        echo '<td>' . ($doc_docs_item[$col]) . '</td>';
                        break;
                    case 'status':
                        echo '<td>' . ($doc_docs_item[$col]) . '</td>';
                        break;
                    case 'button_details':
                        echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=doc_docs&a=details&id=' . $doc_docs_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case 'button_pay':
                        echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=doc_docs&a=details_payement&id=' . $doc_docs_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case 'button_edit':
                        echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=doc_docs&a=edit&id=' . $doc_docs_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case 'button_delete':
                        echo '<td>';
                        include view("doc_docs", "modal_delete");
                        echo '</td>';
                        break;

                    case 'button_print':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=doc_docs&a=export_pdf&id=' . $doc_docs_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case 'button_save':
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=doc_docs&a=export_pdf&way=pdf&&id=' . $doc_docs_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    default:
                        echo '<td>' . ($doc_docs[$col]) . '</td>';
                        break;
                }
            }

            echo '</tr>';
        }
        ?>	
        </tr>
    </tbody>

    <?php //include view("doc_docs", "table_index_form_add"); ?>

</table>

