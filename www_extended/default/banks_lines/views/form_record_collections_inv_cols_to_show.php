<form method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_contacts_index_cols_to_show">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $inv_cols_to_show = invoices_db_col_list_from_table($c);

//    // Agrego a las columnas las de l directroy
//    foreach (directory_names_list() as $key => $directory_item) {
//        array_push($inv_cols_to_show, $directory_item['name']);
//    }


    $i = 0;
    foreach ($inv_cols_to_show as $key => $ictos) {

        $banks_lines_record_collections_col_to_show = json_decode(_options_option('banks_lines_record_collections_col_to_show'), true);

        if ($banks_lines_record_collections_col_to_show) {
            $checked = ( in_array($ictos, $banks_lines_record_collections_col_to_show) ) ? " checked " : "";
        } else {
            $checked = '';
        }
        echo '
                        <div class="row">                            
                            <div class="col-xs-6 col-md-6 col-lg-6">
                                 <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="data[]" value="' . $ictos . '" ' . $checked . ' > ' . _tr(ucfirst($ictos)) . '
                                    </label>
                                  </div>                              
                            </div>
                        </div>
                        
';
    }
    ?>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Submit"); ?>
    </button>

</form>