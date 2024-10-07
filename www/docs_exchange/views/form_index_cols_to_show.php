<form method="post" action="index.php">
    <input type="hidden" name="c" value="docs_exchange">
    <input type="hidden" name="a" value="ok_index_cols_to_show">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $docs_exchange_db_col_list_from_table = docs_exchange_db_col_list_from_table($c);

    //Agrego a las columnas las de l directroy
    $array_btn = array(
        "button_details",
        //"button_pay",
        "button_edit",
        "modal_edit",
        "button_delete",
        "modal_delete",
        "button_print",
        "button_save",
    );
    foreach ($array_btn as $key => $button) {
        array_push($docs_exchange_db_col_list_from_table, $button);
    }

    $i = 0;

    foreach ($docs_exchange_db_col_list_from_table as $key => $cdbcts) {

        $docs_exchange_index_cols_to_show_array = json_decode(_options_option("docs_exchange_index_cols_to_show"), true);

        if ($docs_exchange_index_cols_to_show_array) {
            $checked = ( in_array($cdbcts, $docs_exchange_index_cols_to_show_array) ) ? " checked " : "";
        } else {
            $checked = "";
        }
        echo '
                        <div class="row">                            
                            <div class="col-xs-6 col-md-6 col-lg-6">
                                 <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="data[]" value="' . $cdbcts . '" ' . $checked . ' > ' . _tr(ucfirst($cdbcts)) . '
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