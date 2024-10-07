<form method="post" action="index.php">
    <input type="hidden" name="c" value="hr_employee_family_dependents">
    <input type="hidden" name="a" value="ok_index_cols_to_show">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $hr_employee_family_dependents_db_col_list_from_table = hr_employee_family_dependents_db_col_list_from_table($c);

    //Agrego a las columnas las de l directroy
    $array_btn = array(
        "button_details",
        //"button_pay",
        "button_edit",
        "button_print",
        "button_save",
    );
    foreach ($array_btn as $key => $button) {
        array_push($hr_employee_family_dependents_db_col_list_from_table, $button);
    }

    $i = 0;

    foreach ($hr_employee_family_dependents_db_col_list_from_table as $key => $cdbcts) {

        $hr_employee_family_dependents_index_cols_to_show_array = json_decode(_options_option("hr_employee_family_dependents_index_cols_to_show"), true);

        if ($hr_employee_family_dependents_index_cols_to_show_array) {
            $checked = ( in_array($cdbcts, $hr_employee_family_dependents_index_cols_to_show_array) ) ? " checked " : "";
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