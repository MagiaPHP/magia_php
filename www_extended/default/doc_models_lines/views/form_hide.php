<form method="post" action="index.php">
    <input type="hidden" name="c" value="doc_models_lines">
    <input type="hidden" name="a" value="ok_params_hide">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="doc_models_lines">
    <input type="hidden" name="redi[a]" value="details_by_modele_doc">
    <input type="hidden" name="redi[params]" value="<?php echo "doc=$doc"; ?>">



    <?php
    foreach (doc_models_lines_search_modele_doc_section($modele, $doc, $doc_sections["section"]) as $key => $dmlsbds) {


        $icon_hidden = (doc_models_lines_get_value_by_key($dmlsbds, 'hidden'));
        $icon_fill = (doc_models_lines_get_value_by_key($dmlsbds, 'fill'));

        echo '<div class="checkbox">
        <label>
            <input type="checkbox" name="ids[]" value="' . $dmlsbds['id'] . '"> ' . $icon_hidden . ' ' . $icon_fill . ' ' . $dmlsbds['order_by'] . ' : ' . $dmlsbds['name'] . '
        </label>
    </div>';
    }
    ?>

    <br>
    <br>
    <br>
    <br>
    <br>
    <button type="submit" class="btn btn-default">
        <?php echo icon("ban-circle"); ?>
        <?php _t("Hide"); ?>
    </button>


</form>