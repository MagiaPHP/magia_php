<form method="post" action="index.php">
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_contacts_index_cols_to_show">
    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $contacts_db_col_list_from_table = contacts_db_col_list_from_table($c);

    // Agrego a las columnas las de l directroy
    foreach (directory_names_list() as $key => $directory_item) {

        array_push($contacts_db_col_list_from_table, $directory_item['name']);
    }

    // Agrego botones

//    $btns = array(
//        array("name" => "btn_details", "label" => "Details"),
//        array("name" => "btn_edit", "label" => "Edit"),
//    );
//
//    foreach ($btns as $key => $bn) {
//
//        array_push($contacts_db_col_list_from_table, $btn);
//    }



    $i = 0;
    foreach ($contacts_db_col_list_from_table as $key => $cdbcts) {

        $json_contacts = _options_option('contacts_index_cols_to_show') ?? null;

        $contacts_index_cols_to_show_array = ($json_contacts) ? json_decode($json_contacts, true) : false;

        if ($contacts_index_cols_to_show_array) {
            $checked = ( in_array($cdbcts, $contacts_index_cols_to_show_array) ) ? " checked " : "";
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