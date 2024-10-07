<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
?>
<form method="post" action="index.php">
    <input type="hidden" name="c" value="inv_transsactions">
    <input type="hidden" name="a" value="ok_index_cols_to_show">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $inv_transsactions_db_col_list_from_table = inv_transsactions_db_col_list_from_table($c);

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
        array_push($inv_transsactions_db_col_list_from_table, $button);
    }

    $i = 0;

    foreach ($inv_transsactions_db_col_list_from_table as $key => $cdbcts) {

        $inv_transsactions_index_cols_to_show_array = json_decode(_options_option("inv_transsactions_index_cols_to_show"), true);

        if ($inv_transsactions_index_cols_to_show_array) {
            $checked = ( in_array($cdbcts, $inv_transsactions_index_cols_to_show_array) ) ? " checked " : "";
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