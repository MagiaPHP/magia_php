<form method="post" action="index.php">
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_index_cols_to_show">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $invoices_db_col_list_from_table = invoices_db_col_list_from_table($c);

    // Agrego a las columnas las de la directoria
    $array_btn = array(
        'button_details',
        'button_pay',
        'button_edit',
        'button_print',
        'button_save',
    );
    foreach ($array_btn as $key => $button) {
        array_push($invoices_db_col_list_from_table, $button);
    }

    $i = 0;

    // Asegúrate de que el valor devuelto por _options_option() no sea null antes de decodificarlo
    $json_option = _options_option('invoices_index_cols_to_show');
    $invoices_index_cols_to_show_array = ($json_option !== null) ? json_decode($json_option, true) : array();

    foreach ($invoices_db_col_list_from_table as $key => $cdbcts) {
        if ($invoices_index_cols_to_show_array) {
            $checked = (in_array($cdbcts, $invoices_index_cols_to_show_array)) ? " checked " : "";
        } else {
            $checked = '';
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
